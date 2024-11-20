<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\Message\MessageEntityModel;
use Modules\Post\Entities\Message\MessageProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostModel $post
 * @property-read User $user
 * @property-read RecordModel $entity
 * @method MessageEntityModel toEntity()
 */
class MessageModel extends BaseModel
{
    use HasFactory;
    use MessageProps;
    use SoftDeletes;

    public static function table($alias = null): string
    {
        return self::dbTable('app_messages', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = MessageModel::class;
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->record_id = $model->record_id ?: RecordModel::crete()->id;
        });
    }

    public function modelEntity(): string
    {
        return MessageEntityModel::class;
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(MessageVoteModel::class, 'comment_id');
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(RecordModel::class, 'record_id');
    }

    public function save(array $options = []): bool
    {
        $this->record_id = $this->record_id ?: RecordModel::crete()->id;
        return parent::save();
    }
}
