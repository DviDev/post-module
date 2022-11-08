<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Models\PostCommentVoteModel;

/**
 * @method PostCommentVoteModel create(array $attributes = [])
 * @method PostCommentVoteModel make(array $attributes = [])
 */
class PostCommentVoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostCommentVoteModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = PostCommentVoteEntityModel::props(null, true);
        return [
            $p->user_id => null,
            $p->comment_id => null,
            $p->up_vote => null,
            $p->down_vote => null,
        ];
    }
}
