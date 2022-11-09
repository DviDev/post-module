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

        /*User::all()->each(function (User $user) {
            $post = PostEntityModel::props();
            PostModel::factory()->count(20)
                ->create([
                    $post->user_id => $user->isDirty()
                ])->each(function (PostModel $post) use ($user) {
                    $this->postComment($post, $user);


                });
        });*/
    }

    /**
     * @param PostModel $post
     * @param User $user
     * @return void
     */
    function postComment(PostModel $post, User $user): void
    {
        $this->call(PostCommentTableSeeder::class, false, compact('post', 'user'));
    }
}
