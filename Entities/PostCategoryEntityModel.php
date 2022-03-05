<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostCategoryRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $name
 * @property $description
 * @method static self props($alias = null, $force = null)
 * @method PostCategoryRepository repository()
 */
class PostCategoryEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostCategoryRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('social_post_categories', $alias);
    }
}

