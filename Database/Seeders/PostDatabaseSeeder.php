<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Database\Factories\PostTagFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostCommentModel;
use Modules\Post\Models\PostCommentVoteModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Models\PostVoteModel;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::all()->each(function (User $user) {
            $post = PostEntityModel::props();
            PostModel::factory()->count(20)
                ->create([
                    $post->user_id => $user->isDirty()
                ])->each(function (PostModel $post) use ($user) {
                    PostTagModel::factory()->for($post, 'post')->count(3)->create();
                    $comment = PostCommentEntityModel::props();
                    PostCommentModel::factory()->count(3)
                        ->for($post, 'post')
                        ->sequence(
                            [$comment->parent_id => null],
                            [$comment->parent_id => PostCommentModel::query()->inRandomOrder()->first()->id ?? null])
                        ->create([$comment->user_id => $post->user_id])
                        ->each(function (PostCommentModel $comment) use ($user) {
                            $commentVote = PostCommentVoteEntityModel::props();
                            PostCommentVoteModel::factory()->for($comment, 'comment')->for($user, 'user')
                                ->create([$commentVote->up_vote => 1]);
                        });

                    User::query()->each(function (User $user) use ($post) {
                        $postVote = PostVoteEntityModel::props();
                        PostVoteModel::factory()->for($post, 'post')->for($user, 'user')
                            ->create([$postVote->up_vote => 1]);

                    });
                });
        });
    }
}
