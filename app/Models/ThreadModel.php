<?php

declare(strict_types=1);

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Base\Contracts\BaseFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Models\RecordModel;
use Modules\Post\Entities\Thread\ThreadEntityModel;
use Modules\Post\Entities\Thread\ThreadProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read User $user
 * @property-read RecordModel $entity
 * @property-read ThreadModel[]|Collection $children
 *
 * @method ThreadEntityModel toEntity()
 */
final class ThreadModel extends BaseModel
{
    use SoftDeletes;
    use ThreadProps;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $with = ['children', 'user'];

    public static function table($alias = null): string
    {
        return self::dbTable('threads', $alias);
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

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ThreadModel::class;
        };
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function (self $model): void {
            $model->record_id = $model->record_id ?: RecordModel::factory()->create()->id;
        });

        self::deleting(function (ThreadModel $thread): void {
            $thread->children->each(fn ($child) => $child->delete());
        });
    }
}
