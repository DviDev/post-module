<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Entities\BaseEntityModel;
use Modules\Base\Models\BaseModel;
use Modules\Base\Models\EntityItemModel;
use Modules\Base\Models\EntityItemRelationModel;
use Modules\Post\Database\Factories\PostFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Entities\Post\PostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostTagModel[] $tags
 * @property-read User $user
 * @method PostEntityModel toEntity()
 * @method static PostFactory factory($count = null, $state = [])
 */
class PostModel extends BaseModel
{
    use HasFactory;
    use PostProps;
    use SoftDeletes;

    public function modelEntity(): string
    {
        return PostEntityModel::class;
    }

    protected static function newFactory(): PostFactory
    {
        return new PostFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('posts', $alias);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(PostTagModel::class, 'post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostCommentModel::class, 'post_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(PostVoteModel::class, 'post_id');
    }

    public function entityItem(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(PostCommentModel::class, EntityItemRelationModel::class, 'item1', 'entity_item_id', 'entity_item_id', 'item2');
    }
}
