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

        $p = PostCommentEntityModel::props();
        $post->addComment(
            PostCommentModel::factory()
                ->for($user)
                ->sequence(
                    [$p->parent_id => null],
                    [$p->parent_id => PostCommentModel::query()->inRandomOrder()->first()->id ?? null])
                ->make(['entity_item_id' => $post->entity_item_id])
        );
        $this->commentVotes($post, $user, $workspace);
    }

    protected function commentVotes(PostModel $post, User $user, WorkspaceModel $workspace): void
    {
        $post->comments->each(function (PostCommentModel $comment) use ($user, $workspace) {
            $p = PostCommentVoteEntityModel::props();
            $fnUpVote = fn(Factory $factory) => $factory->create([$p->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$p->down_vote => 1]);

            /**@var \Closure $choice */
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $factory = PostCommentVoteModel::factory()->for($comment, 'comment')->for($user, 'user');

            /**@var PostCommentVoteModel $vote */
            $choice($factory);
        });
    }
}
