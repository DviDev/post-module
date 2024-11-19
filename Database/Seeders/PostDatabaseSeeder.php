<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\App\Entities\MessageVote\MessageVoteEntityModel;
use Modules\App\Models\MessageModel;
use Modules\App\Models\MessageVoteModel;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Models\RecordModel;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\PostVoteModel;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspacePostModel;
use Nwidart\Modules\Facades\Module;

class PostDatabaseSeeder extends BaseSeeder
{
    public function run()
    {
        Model::unguard();

        $this->commandWarn(__CLASS__, "🌱 seeding");

        $modules = collect(Module::allEnabled());
        if ($modules->contains('DBMap')) {
            (new ScanTableDomain())->scan('post');
        }

        $me = User::find(1);

        $this->createPosts($me);

        if ($modules->contains('Workspace')) {
            /*if (WorkspaceModel::byUserId($me->id)->count() == 0) {
                WorkspaceModel::factory()->for($me)->create();
            }*/
            $workspaces = WorkspaceModel::query()->where('user_id', $me->id)->get();
            foreach ($workspaces as $workspace) {
                $posts = $this->createPosts($me);

                $posts->each(function (PostModel $post) use ($workspace) {
                    $this->syncWorkspaceWithPost($workspace, $post);

                    $participants = $workspace->participants;
                    $this->createWorkspaceParticipantPostVotes($post, $participants);

                    $this->createWorkspaceParticipantPostComments($post, $participants);
                });
            }
        }
        if ($modules->contains('Project')) {
            $module = ProjectModuleModel::byName('Post');

            $module->project->posts()->attach(PostModel::where('user_id', $me->id)->get()->modelKeys());
        }

        if (config('permission.name')) {
            $this->call(class: PermissionTableSeeder::class, parameters: ['module' => $module]);
        }

        $this->commandInfo(__CLASS__, '🟢 done');
    }

    /**@return PostModel[]|Collection */
    protected function createPosts(User $me): array|Collection
    {
        return PostModel::factory(config('post.SEED_POSTS_COUNT'))->for($me)
            ->afterCreating(fn(PostModel $post) => $this->createPostTags($post))
            ->create([
                'record_id' => RecordModel::factory()->create()->id
            ]);
    }

    function createPostTags(PostModel $post): void
    {
        PostTagModel::factory()->for($post, 'post')->count(config('app.SEED_MODULE_CATEGORY_COUNT'))->create();
    }

    function syncWorkspaceWithPost(WorkspaceModel $workspace, PostModel $post): void
    {
        WorkspacePostModel::factory()->for($workspace, 'workspace')->for($post, 'post')->create();
    }

    function createWorkspaceParticipantPostVotes(PostModel $post, Collection $participants): void
    {
        $participants->each(function (User $user) use ($post) {
            $postVote = PostVoteEntityModel::props();
            $fnUpVote = fn(Factory $factory) => $factory->create([$postVote->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$postVote->down_vote => 1]);

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();

            $factory = PostVoteModel::factory()->for($post, 'post')->for($user, 'user');
            /**@var PostVoteModel $vote */
            $choice($factory);
        });
    }

    function createWorkspaceParticipantPostComments(PostModel $post, Collection $participants): void
    {
        $entity = RecordModel::factory()->create();
        $post->record_id = $entity->id;
        $post->save();

        $participants->each(function (User $user) use ($post) {
            MessageModel::factory(config('post.SEED_POST_COMMENTS_COUNT'))->for($user)->create(['record_id' => $post->record_id]);
        });
        foreach ($post->comments() as $comment) {
            $participants->each(function (User $user) use ($post, $comment) {
                $vote = MessageVoteEntityModel::props();
                $fnUpVote = fn(Factory $factory) => $factory->create([$vote->up_vote => 1]);
                $fnDownVote = fn(Factory $factory) => $factory->create([$vote->down_vote => 1]);

                /**@var \Closure $choice */
                $choice = collect([$fnUpVote, $fnDownVote])->random();

                $factory = MessageVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
                $choice($factory);
            });
        }
    }
}
