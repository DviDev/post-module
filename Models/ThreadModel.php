<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\App\Models\RecordModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\Thread\ThreadEntityModel;
use Modules\Post\Entities\Thread\ThreadProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read User $user
 * @property-read RecordModel $entity
 * @property-read ThreadModel[]|Collection $children
 * @method ThreadEntityModel toEntity()
 */
class ThreadModel extends BaseModel
{
    use HasFactory;
    use ThreadProps;
    use SoftDeletes;

    public static function table($alias = null): string
    {
        return self::dbTable('threads', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ThreadModel::class;
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->record_id = $model->record_id ?: RecordModel::create(['name' => 'empty'])->id;
        });

        static::deleting(function (ThreadModel $thread) {
            $thread->children->each(fn($child) => $child->delete());
        });
    }

    public function modelEntity(): string
    {
        return ThreadEntityModel::class;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(ThreadVoteModel::class, 'thread_id');
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(RecordModel::class, 'record_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
