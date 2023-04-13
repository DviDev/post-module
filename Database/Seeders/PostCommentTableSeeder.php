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
    public function run(PostModel $post, User $user)
    {
        Model::unguard();

        PostTagModel::factory()->for($post, 'post')->count(config('app.MODULE_SEED_CATEGORY_COUNT'))->create();
        $comment = PostCommentEntityModel::props();
        PostCommentModel::factory()->count(config('app.COMMENTS_SEED_COUNT'))
            ->for($post, 'post')
            ->for($user, 'user')
            ->sequence(
                [$comment->parent_id => null],
                [$comment->parent_id => PostCommentModel::query()->inRandomOrder()->first()->id ?? null])
            ->create()
            ->each(function (PostCommentModel $comment) use ($user) {
                ds("post $comment->post_id comment $comment->id");

                $p = PostCommentVoteEntityModel::props();
                $fnUpVote = fn(Factory $factory) => $factory->create([$p->up_vote => 1]);
                $fnDownVote = fn(Factory $factory) => $factory->create([$p->down_vote => 1]);

                /**@var \Closure $choice*/
                $choice = collect([$fnUpVote, $fnDownVote])->random();
                $factory = PostCommentVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
                /**@var PostCommentVoteModel $vote*/
                $vote = $choice($factory);
                ds("post $comment->post_id comment $comment->id ". ($vote->up_vote ? 'up-voted' : 'down-voted'));
            });

        User::query()->each(function (User $user) use ($post) {
            $postVote = PostVoteEntityModel::props();
            $fnUpVote = fn(Factory $factory) => $factory->create([$postVote->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$postVote->down_vote => 1]);

            /**@var \Closure $choice*/
            $choice = collect([$fnUpVote, $fnDownVote])->random();

            $factory = PostVoteModel::factory()->for($post, 'post')->for($user, 'user');
            /**@var PostVoteModel $vote */
            $vote = $choice($factory);

            ds("post $post->id user $user->id ". ($vote->up_vote ? 'up-voted ' : 'down-voted'));
        });
    }
}
