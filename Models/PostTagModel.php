<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostTagFactory;
use Modules\Post\Entities\PostTag\PostTagEntityModel;
use Modules\Post\Entities\PostTag\PostTagProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostModel $post
 * @method PostTagEntityModel toEntity()
 * @method static PostTagFactory factory()
 */
class PostTagModel extends BaseModel
{
    use HasFactory;
    use PostTagProps;

    public function modelEntity(): string
    {
        return PostTagEntityModel::class;
    }

    protected static function newFactory(): PostTagFactory
    {
        return new PostTagFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_tags', $alias);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }
}
