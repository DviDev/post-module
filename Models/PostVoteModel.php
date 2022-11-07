<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostVoteFactory;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Entities\PostVote\PostVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostVoteEntityModel toEntity()
 * @method static PostVoteFactory factory()
 */
class PostVoteModel extends BaseModel
{
    use HasFactory;
    use PostVoteProps;

    public function modelEntity(): string
    {
        return PostVoteEntityModel::class;
    }

    protected static function newFactory(): PostVoteFactory
    {
        return new PostVoteFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_votes', $alias);
    }
}
