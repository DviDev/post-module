<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\App\Models\EntityItemModel;
use Modules\Base\Database\Seeders\CommentTableSeeder;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Link\Models\LinkModel;
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
        foreach ($me->workspaces as $workspace) {
            $post = PostModel::factory()->for($workspace->user)->create([
                'entity_item_id' => EntityItemModel::factory()->create()->id
            ]);
            $this->command->warn('saving post ' . $post->id . ' ' . $post->entity_item_id);

            $posts = PostModel::where('user_id', $workspace->user_id)->with('comments');

            $seed_total = $posts->count();
            $seeded = 0;
            $posts->each(function (PostModel $post) use ($workspace, $seed_total, &$seeded) {
                $seeded++;
                ds("workspace post $seeded / $seed_total");

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
        ds("workspace $workspace->id post $post->id");
    }

    function createPostTags(PostModel $post): void
    {
        PostTagModel::factory()->for($post, 'post')->count(config('app.SEED_MODULE_CATEGORY_COUNT'))->create();

        $tags = $post->tags();
        $total_seed = $tags->count();
        $seeded = 0;
        $tags->each(fn(PostTagModel $tag) => ds("post $tag->post_id tag $seeded / $total_seed"));
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
            ds("post $post->id user $user->id " . ($vote->up_vote ? 'up-voted ' : 'down-voted') . " $seeded / $seed_total");
        });
    }

    function createPostComments(PostModel $post, WorkspaceModel $workspace): void
    {
        $participants = $workspace->participants();

        $participants->each(function (User $user) use ($post, $workspace) {
            $this->call(CommentTableSeeder::class, false, compact('post', 'user', 'workspace'));
        });
    }
}
