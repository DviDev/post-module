<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostCommentUpVoteRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $comment_id
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method PostCommentUpVoteRepository repository()
 */
class PostCommentUpVoteEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostCommentUpVoteRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('post_comment_up_votes', $alias);
    }
}

