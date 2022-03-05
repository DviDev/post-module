<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $user_id
 * @property $category_id
 * @property $title
 * @property $content
 * @property $thumbnail_image_path
 * @property $poll_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method PostRepository repository()
 */
class PostEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('social_posts', $alias);
    }
}

