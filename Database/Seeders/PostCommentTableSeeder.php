<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostCommentModel;
use Modules\Post\Models\PostCommentVoteModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\PostVoteModel;
use Modules\Workspace\Models\WorkspaceModel;

class PostCommentTableSeeder extends Seeder
{

    public function __construct()
    {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(PostModel $post, User $user, WorkspaceModel $workspace)
    {
        Model::unguard();

        $comment = PostCommentEntityModel::props();
        PostCommentModel::factory()
//            ->count(config('app.COMMENTS_SEED_COUNT'))
            ->for($post, 'post')
            ->for($user, 'user')
            ->sequence(
                [$comment->parent_id => null],
                [$comment->parent_id => PostCommentModel::query()->inRandomOrder()->first()->id ?? null])
            ->create();

        $this->commentVotes($post, $user, $workspace);
    }

    protected function commentVotes(PostModel $post, User $user, WorkspaceModel $workspace): void
    {
        $comments = $post->comments();
        $seed_total = $comments->count();
        $seeded = 0;
        $comments->each(function (PostCommentModel $comment) use ($user, $workspace, $seed_total, &$seeded) {
            $p = PostCommentVoteEntityModel::props();
            $fnUpVote = fn(Factory $factory) => $factory->create([$p->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$p->down_vote => 1]);

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $factory = PostCommentVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
            /**@var PostCommentVoteModel $vote */
            $vote = $choice($factory);

            $seeded++;
            ds("workspace $workspace->id post $comment->post_id user $user->id comment $comment->id " .
                ($vote->up_vote ? 'up-voted' : 'down-voted'). " $seeded / $seed_total");
        });
    }
}
