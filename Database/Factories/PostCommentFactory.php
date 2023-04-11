<?php

namespace Modules\Post\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Post\Models\PostCommentModel;

/**
 * @method PostCommentModel create(array $attributes = [])
 * @method PostCommentModel make(array $attributes = [])
 */
class PostCommentFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostCommentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return $this->getValues();
    }
}
