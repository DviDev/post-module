<?php

namespace Modules\Post\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\Message\MessageEntityModel;
use Modules\Post\Entities\MessageVote\MessageVoteEntityModel;
use Modules\Post\Models\MessageModel;
use Modules\Post\Models\MessageVoteModel;

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

        $p = MessageEntityModel::props();
        MessageModel::factory(3)
            ->for($entity, 'entity')
            ->for($user)
            ->sequence(
                [$p->parent_id => null],
                [$p->parent_id => MessageModel::query()->inRandomOrder()->first()->id ?? null])
            ->afterCreating(fn(MessageModel $m) => $this->commentVotes($m, $user))
            ->create();
    }

    protected function commentVotes($comment, User $user): void
    {
        $p = MessageVoteEntityModel::props();
        $fnUpVote = fn(Factory $factory) => $factory->create([$p->up_vote => 1]);
        $fnDownVote = fn(Factory $factory) => $factory->create([$p->down_vote => 1]);

        /**@var \Closure $choice */
        $choice = collect([$fnUpVote, $fnDownVote])->random();
        $factory = MessageVoteModel::factory()->for($comment)->for($user);

        /**@var MessageVoteModel $vote */
        $choice($factory);
    }
}
