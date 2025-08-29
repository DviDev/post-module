<?php

namespace Modules\Post\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\PostCategory\PostCategoryEntityModel;
use Modules\Post\Entities\PostCategory\PostCategoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read PostCategoryModel $model
 *
 * @method PostCategoryEntityModel toEntity()
 */
class PostCategoryModel extends BaseModel
{
    use PostCategoryProps;

    public static function table($alias = null): string
    {
        return self::dbTable('thread_post_categories', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = PostCategoryModel::class;
        };
    }

    public function modelEntity(): string
    {
        return PostCategoryEntityModel::class;
    }
}
