<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Models\PostCommentVoteModel;

/**
 * @method PostCommentVoteModel create(array $attributes = [])
 * @method PostCommentVoteModel make(array $attributes = [])
 */
class PostCommentVoteFactory extends BaseFactory
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
        $p = PostCommentVoteEntityModel::props();
        $values = $this->getValues();
        $values[$p->up_vote] = null;
        $values[$p->down_vote] = null;
        return $values;
    }
}
