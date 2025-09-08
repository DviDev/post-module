<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Models\RecordModel;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\ThreadModel;
use Modules\Post\Models\ThreadVoteModel;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspacePostModel;
use Nwidart\Modules\Facades\Module;

class PostDatabaseSeeder extends BaseSeeder
{
    public function run()
    {
        Model::unguard();

        $this->seeding();

        $modules = collect(Module::allEnabled());
        if ($modules->contains('DBMap')) {
            (new ScanTableDomain)->scan('post');
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
            $module = ProjectModuleModel::byNameOrFactory('Post');

            $module->project->posts()->attach(PostModel::where('user_id', $me->id)->get()->modelKeys());
        }

        if (config('permission.name')) {
            $this->call(class: PermissionTableSeeder::class, parameters: ['module' => $module]);
        }

        $this->done();
    }

    /**@return PostModel[]|Collection */
    protected function createPosts(User $me): array|Collection
    {
        return PostModel::factory(config('post.SEED_POSTS_COUNT'))->for($me)
            ->afterCreating(fn (PostModel $post) => $this->createPostTags($post))
            ->create([
                'thread_id' => ThreadModel::factory()->create()->id,
                'record_id' => RecordModel::factory()->create()->id,
            ]);
    }

    public function createPostTags(PostModel $post): void
    {
        PostTagModel::factory()->for($post, 'post')->count(config('post.SEED_POST_TAGS_COUNT'))->create();
    }

    public function syncWorkspaceWithPost(WorkspaceModel $workspace, PostModel $post): void
    {
        WorkspacePostModel::factory()->for($workspace, 'workspace')->for($post, 'post')->create();
    }

    public function createWorkspaceParticipantPostVotes(PostModel $post, Collection $participants): void
    {
        $participants->each(function (User $user) use ($post) {
            $postVote = ThreadVoteEntityModel::props();
            $like = fn (Factory $factory) => $factory->create([$postVote->like => 1]);
            $dislike = fn (Factory $factory) => $factory->create([$postVote->dislike => 1]);

            /** @var \Closure $choice */
            $choice = collect([$like, $dislike])->random();

            $thread = $post->thread;
            $factory = ThreadVoteModel::factory()
                ->for($thread, 'thread')
                ->for($user, 'user');
            $choice($factory);
        });
    }

    public function createWorkspaceParticipantPostComments(PostModel $post, Collection $participants): void
    {
        $entity = RecordModel::factory()->create();
        $post->record_id = $entity->id;
        $post->save();

        $participants->each(function (User $user) use ($post) {
            ThreadModel::factory(config('post.SEED_POST_COMMENTS_COUNT'))->for($user)->create(['record_id' => $post->record_id]);
        });
        foreach ($post->comments() as $comment) {
            $participants->each(function (User $user) use ($comment) {
                $vote = ThreadVoteEntityModel::props();
                $fnUpVote = fn (Factory $factory) => $factory->create([$vote->like => 1]);
                $fnDownVote = fn (Factory $factory) => $factory->create([$vote->dislike => 1]);

                /** @var \Closure $choice */
                $choice = collect([$fnUpVote, $fnDownVote])->random();

                $factory = ThreadVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
                $choice($factory);
            });
        }
    }
}
