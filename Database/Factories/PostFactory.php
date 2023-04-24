<?php
namespace Modules\Post\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

/**
 * @method PostModel create(array $attributes = [])
 * @method PostModel make(array $attributes = [])
 */
class PostFactory extends BaseFactory
{
    protected $model = PostModel::class;

    public function definition(): array
    {
        $p = PostEntityModel::props();
        return $this->getValues();
    }
}
