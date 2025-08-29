<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;
use Modules\Post\Entities\ThreadVote\ThreadVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ThreadModel $thread
 * @property-read User $user
 *
 * @method ThreadVoteEntityModel toEntity()
 */
class ThreadVoteModel extends BaseModel
{
    use ThreadVoteProps;

    public $timestamps = false;

    public static function table($alias = null): string
    {
        return self::dbTable('thread_votes', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ThreadVoteModel::class;
        };
    }

    public function modelEntity(): string
    {
        return ThreadVoteEntityModel::class;
    }

    public function thread(): BelongsTo
    {
        return $this->belongsTo(ThreadModel::class, 'thread_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
