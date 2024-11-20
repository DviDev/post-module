<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\MessageVote\MessageVoteEntityModel;
use Modules\Post\Entities\MessageVote\MessageVoteProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read MessageModel $message
 * @property-read User $user
 * @method MessageVoteEntityModel toEntity()
 */
class MessageVoteModel extends BaseModel
{
    use HasFactory;
    use MessageVoteProps;

    public static function table($alias = null): string
    {
        return self::dbTable('app_message_votes', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = MessageVoteModel::class;
        };
    }

    public function modelEntity(): string
    {
        return MessageVoteEntityModel::class;
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(MessageModel::class, 'comment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
