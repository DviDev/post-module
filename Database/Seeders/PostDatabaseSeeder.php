<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\PostVoteModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspacePostModel;

class PostDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $me = User::find(1);
        $me->workspaces()->each(function (WorkspaceModel $workspace) {
            PostModel::factory()->count(config('app.POST_SEED_COUNT'))
                ->for($workspace->user, 'user')->create();

            $posts = PostModel::where('user_id', $workspace->user_id);
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
        });
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

    function syncWorkspaceWithPost(WorkspaceModel $workspace, PostModel $post): void
    {
        WorkspacePostModel::factory()->for($workspace, 'workspace')->for($post, 'post')->create();
        ds("workspace $workspace->id post $post->id");
    }

    function createPostTags(PostModel $post): void
    {
        PostTagModel::factory()->for($post, 'post')->count(config('app.MODULE_SEED_CATEGORY_COUNT'))->create();

        $tags = $post->tags();
        $total_seed = $tags->count();
        $seeded = 0;
        $tags->each(fn(PostTagModel $tag) => ds("post $tag->post_id tag $seeded / $total_seed"));
    }

    function createPostComments(PostModel $post, WorkspaceModel $workspace): void
    {
        $participants = $workspace->participants();

        $participants->each(function (User $user) use ($post, $workspace) {
            $this->call(PostCommentTableSeeder::class, false, compact('post', 'user', 'workspace'));
        });
    }
}
