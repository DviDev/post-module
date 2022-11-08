<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Models\PostCommentModel;

/**
 * @method PostCommentModel create(array $attributes = [])
 * @method PostCommentModel make(array $attributes = [])
 */
class PostCommentFactory extends Factory
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
        $p = PostCommentEntityModel::props(null, true);
        return [
            $p->post_id => null,
            $p->parent_id => null,
            $p->content => $this->faker->sentence(),
            $p->user_id => null,
        ];
    }
}
