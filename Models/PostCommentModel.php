<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostCommentFactory;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Entities\PostComment\PostCommentProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCommentEntityModel toEntity()
 * @method PostCommentFactory factory()
 */
class PostCommentModel extends BaseModel
{
    use HasFactory;
    use PostCommentProps;

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
}
