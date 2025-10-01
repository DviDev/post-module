<?php

declare(strict_types=1);

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Post\Entities\PostTag\PostTagEntityModel;
use Modules\Post\Entities\PostTag\PostTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read PostModel $post
 *
 * @method PostTagEntityModel toEntity()
 */
final class PostTagModel extends BaseModel
{
    use PostTagProps;

    public static function table($alias = null): string
    {
        return self::dbTable('thread_post_tags', $alias);
    }

    public function modelEntity(): string
    {
        return PostTagEntityModel::class;
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = PostTagModel::class;
        };
    }
}
