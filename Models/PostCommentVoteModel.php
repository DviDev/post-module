<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostCommentVoteFactory;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCommentVoteEntityModel toEntity()
 * @method PostCommentVoteFactory factory()
 */
class PostCommentVoteModel extends BaseModel
{
    use HasFactory;
    use PostCommentVoteProps;

    public function modelEntity(): string
    {
        return PostCommentVoteEntityModel::class;
    }

    protected static function newFactory(): PostCommentVoteFactory
    {
        return new PostCommentVoteFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_comment_votes', $alias);
    }
}
