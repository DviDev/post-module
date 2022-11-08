<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostCommentVoteFactory;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostCommentModel $comment
 * @property-read User $user
 * @method PostCommentVoteEntityModel toEntity()
 * @method static PostCommentVoteFactory factory()
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

    public function comment(): BelongsTo
    {
        return $this->belongsTo(PostCommentModel::class, 'comment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
