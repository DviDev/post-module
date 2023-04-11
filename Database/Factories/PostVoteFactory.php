<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostVoteModel;

/**
 * @method PostVoteModel create(array $attributes = [])
 * @method PostVoteModel make(array $attributes = [])
 */
class PostVoteFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostVoteModel::class;

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
