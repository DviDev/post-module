<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Entities\PostVote\PostVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostModel $post
 * @property-read User $user
 * @method PostVoteEntityModel toEntity()
 */
class PostVoteModel extends BaseModel
{
    use HasFactory;
    use PostVoteProps;

    public function modelEntity(): string
    {
        return PostVoteEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = PostVoteModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_votes', $alias);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class, 'post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
