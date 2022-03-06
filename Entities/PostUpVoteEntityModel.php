<?php

namespace Modules\Post\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Repositories\PostUpVoteRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $post_id
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method PostUpVoteRepository repository()
 */
class PostUpVoteEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return PostUpVoteRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('post_up_votes', $alias);
    }
}

