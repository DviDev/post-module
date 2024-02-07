<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\App\Models\RecordModel;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\PostVoteModel;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspacePostModel;

class PostDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        (new ScanTableDomain())->scan('post');

        $module = ProjectModuleModel::query()->where('name', 'Post')->first();
        $project = $module->project;

        $me = User::find(1);
        if (WorkspaceModel::byUserId($me->id)->count() == 0) {
            WorkspaceModel::factory()->for($me)->create();
        }
        $workspaces = WorkspaceModel::query()->where('user_id', $me->id)->get();
        foreach ($workspaces as $workspace) {
            $post = PostModel::factory()->for($me)->create([
                'record_id' => RecordModel::factory()->create()->id
            ]);
            $this->command->warn(PHP_EOL . 'creating post ' . $post->id . ' ' . $post->record_id);

            $posts = PostModel::where('user_id', $me->id)
//                ->with('comments')
            ;

            $seeded = 0;
            $posts->each(function (PostModel $post) use ($workspace, &$seeded) {
                $seeded++;

                $this->syncWorkspaceWithPost($workspace, $post);

                $this->createPostTags($post);

                $this->postVotes($post, $workspace);

                $this->createPostComments($post, $workspace);
            });
        }

        $project->posts()->attach(PostModel::query()->get()->modelKeys());

        $this->call(class: PermissionTableSeeder::class, parameters: ['module' => $module]);

        $this->call(ProjectTableSeeder::class, parameters: ['project' => $project, 'module' => $module]);

    }

    function syncWorkspaceWithPost(WorkspaceModel $workspace, PostModel $post): void
    {
        WorkspacePostModel::factory()->for($workspace, 'workspace')->for($post, 'post')->create();
    }

    function createPostTags(PostModel $post): void
    {
        PostTagModel::factory()->for($post, 'post')->count(config('app.SEED_MODULE_CATEGORY_COUNT'))->create();
    }

    function postVotes(PostModel $post, WorkspaceModel $workspace): void
    {
        $participants = $workspace->participants();
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $user) use ($post, $seed_total, &$seeded) {
            $postVote = PostVoteEntityModel::props();
            $fnUpVote = fn(Factory $factory) => $factory->create([$postVote->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$postVote->down_vote => 1]);

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();

            $factory = PostVoteModel::factory()->for($post, 'post')->for($user, 'user');
            /**@var PostVoteModel $vote */
            $vote = $choice($factory);

            $seeded++;
        });
    }

    function createPostComments(PostModel $post, WorkspaceModel $workspace): void
    {
        $participants = $workspace->participants();

        $entity = RecordModel::factory()->create();
        $post->record_id = $entity->id;
        $post->save();

        $participants->each(function (User $user) use ($post, $workspace, $entity) {
            //
        });
    }
}
