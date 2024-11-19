<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\App\Models\MessageModel;
use Modules\App\Services\Message\HasMessage;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Entities\Post\PostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostTagModel[] $tags
 * @property-read User $user
 * @property-read RecordModel $entity
 * @method PostEntityModel toEntity()
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

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = PostModel::class;
        };
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
        return $this->hasMany(MessageModel::class, 'record_id', 'record_id');
//        return $this->hasManyThrough(CommentModel::class, EntityRelationModel::class, 'item1', 'record_id', 'record_id', 'item2');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(PostVoteModel::class, 'post_id');
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(RecordModel::class, 'record_id');
    }

}
