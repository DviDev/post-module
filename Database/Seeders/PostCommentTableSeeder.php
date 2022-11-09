<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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

        PostTagModel::factory()->for($post, 'post')->count(11)->create();
        $comment = PostCommentEntityModel::props();
        PostCommentModel::factory()->count(11)
            ->for($post, 'post')
            ->sequence(
                [$comment->parent_id => null],
                [$comment->parent_id => PostCommentModel::query()->inRandomOrder()->first()->id ?? null])
            ->create([$comment->user_id => $post->user_id])
            ->each(function (PostCommentModel $comment) use ($user) {
                $p = PostCommentVoteEntityModel::props();
                $fnUpVote = fn(Factory $factory) => $factory->create([$p->up_vote => 1]);
                $fnDownVote = fn(Factory $factory) => $factory->create([$p->down_vote => 1]);
                $choice = collect([$fnUpVote, $fnDownVote])->random();
                $factory = PostCommentVoteModel::factory()->for($comment, 'comment')->for($user, 'user');
                $choice($factory);
            });

        User::query()->each(function (User $user) use ($post) {
            $postVote = PostVoteEntityModel::props();
            $factory = PostVoteModel::factory()->for($post, 'post')->for($user, 'user');
            $fnUpVote = fn(Factory $factory) => $factory->create([$postVote->up_vote => 1]);
            $fnDownVote = fn(Factory $factory) => $factory->create([$postVote->down_vote => 1]);
            $choice = collect([$fnUpVote, $fnDownVote])->random();
            $choice($factory);
        });
    }
}
