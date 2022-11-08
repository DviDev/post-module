<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostCommentFactory;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Entities\PostComment\PostCommentProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostModel $post
 * @method PostCommentEntityModel toEntity()
 * @method static PostCommentFactory factory()
 */
class PostCommentModel extends BaseModel
{
    use HasFactory;
    use PostCommentProps;
    use SoftDeletes;

    public function modelEntity(): string
    {
        return PostCommentEntityModel::class;
    }

    protected static function newFactory(): PostCommentFactory
    {
        return new PostCommentFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_comments', $alias);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }
}
