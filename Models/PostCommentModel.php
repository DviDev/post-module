<?php

namespace Modules\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\Base\Models\EntityItemModel;
use Modules\Post\Database\Factories\PostCommentFactory;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Entities\PostComment\PostCommentProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostModel $post
 * @property-read User $user
 * @property-read EntityItemModel $entity
 * @method PostCommentEntityModel toEntity()
 * @method static PostCommentFactory factory()
 */
class PostCommentModel extends BaseModel
{
    use HasFactory;
    use PostCommentProps;
    use SoftDeletes;

    public function modelEntity(): string
    {
        return PostCommentEntityModel::class;
    }

    protected static function newFactory(): PostCommentFactory
    {
        return new PostCommentFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('post_comments', $alias);
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
        return $this->hasMany(PostCommentVoteModel::class, 'comment_id');
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(EntityItemModel::class, 'entity_item_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->entity_item_id = $model->entity_item_id ?: EntityItemModel::crete()->id;
        });
    }

    public function save(array $options = []): bool
    {
        $this->entity_item_id = $this->entity_item_id ?: EntityItemModel::crete()->id;
        return parent::save();
    }
}
