<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Post\Models\PostModel;
use Modules\Workspace\Models\WorkspaceModel;
use Modules\Workspace\Models\WorkspacePostModel;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return PostModel[]|Collection
     */
    public function run(): Collection|array
    {
        Model::unguard();

        $posts = [];
        WorkspaceModel::query()->limit(16)->get()->each(function (WorkspaceModel $workspace) use ($posts) {
            PostModel::factory()->count(config('app.POST_SEED_COUNT'))
                ->for($workspace->user, 'user')->create()
                ->each(function (PostModel $post) use ($workspace, &$posts) {
                    $posts[] = $post;
                    $workspace->participants()->each(function (User $user) use ($post, $workspace) {
                        $this->postComment($workspace, $post, $user);
                    });

                    WorkspacePostModel::factory()
                        ->for($workspace, 'workspace')->for($post, 'post')
                        ->create();
                });
        });
        return $posts;
    }

    /**
     * @param PostModel $post
     * @param User $user
     * @return void
     */
    function postComment($workspace, PostModel $post, User $user): void
    {
        ds("workspace post comments. workspace $workspace->id post $post->id user $user->id ");

        $this->call(PostCommentTableSeeder::class, false, compact('post', 'user'));
    }
}
