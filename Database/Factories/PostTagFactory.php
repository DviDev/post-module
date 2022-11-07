<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Post\Entities\PostTag\PostTagEntityModel;
use Modules\Post\Models\PostTagModel;

/**
 * @method PostTagModel create(array $attributes = [])
 * @method PostTagModel make(array $attributes = [])
 */
class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = PostTagEntityModel::props(null, true);
        return [
            $p->post_id => null,
            $p->tag => $this->faker->word(),
        ];
    }
}
