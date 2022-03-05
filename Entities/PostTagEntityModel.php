<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostTagRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $post_id
 * @property $tag
 * @method static self props($alias = null, $force = null)
 * @method PostTagRepository repository()
 */
class PostTagEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostTagRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('social_post_tags', $alias);
    }
}

