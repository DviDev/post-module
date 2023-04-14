<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

/**
 * @method PostModel create(array $attributes = [])
 * @method PostModel make(array $attributes = [])
 */
class PostFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostModel::class;

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
