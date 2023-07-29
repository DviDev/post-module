<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\App\Models\MessageModel;
use Modules\App\Models\EntityItemModel;
use Modules\App\Models\EntityRelationModel;
use Modules\App\Services\Message\HasMessage;
use Modules\Post\Database\Factories\PostFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Entities\Post\PostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostTagModel[] $tags
 * @property-read User $user
 * @property-read EntityItemModel $entity
 * @method PostEntityModel toEntity()
 * @method static PostFactory factory($count = null, $state = [])
 */
class PostModel extends BaseModel
{
    use HasFactory;
    use PostProps;
    use SoftDeletes;
    use HasMessage;

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
        return $this->hasMany(MessageModel::class, 'entity_item_id', 'entity_item_id');
//        return $this->hasManyThrough(CommentModel::class, EntityRelationModel::class, 'item1', 'entity_item_id', 'entity_item_id', 'item2');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(PostVoteModel::class, 'post_id');
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(EntityItemModel::class, 'entity_item_id');
    }

}
