<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostCommentRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $post_id
 * @property $parent_id
 * @property $content
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method PostCommentRepository repository()
 */
class PostCommentEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostCommentRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('social_post_comments', $alias);
    }
}

