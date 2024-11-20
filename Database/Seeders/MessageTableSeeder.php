<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\Thread\ThreadEntityModel;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;
use Modules\Post\Models\ThreadModel;
use Modules\Post\Models\ThreadVoteModel;

class MessageTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(RecordModel $entity, User $user)
    {
        Model::unguard();

        $p = ThreadEntityModel::props();
        ThreadModel::factory(3)
            ->for($entity, 'entity')
            ->for($user)
            ->sequence(
                [$p->parent_id => null],
                [$p->parent_id => ThreadModel::query()->inRandomOrder()->first()->id ?? null])
            ->afterCreating(fn(ThreadModel $m) => $this->commentVotes($m, $user))
            ->create();
    }

    protected function commentVotes($comment, User $user): void
    {
        $p = ThreadVoteEntityModel::props();
        $fnUpVote = fn(Factory $factory) => $factory->create([$p->like => 1]);
        $fnDownVote = fn(Factory $factory) => $factory->create([$p->dislike => 1]);

        /**@var \Closure $choice */
        $choice = collect([$fnUpVote, $fnDownVote])->random();
        $factory = ThreadVoteModel::factory()->for($comment)->for($user);

        /**@var ThreadVoteModel $vote */
        $choice($factory);
    }
}
