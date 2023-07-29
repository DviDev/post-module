<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\App\Entities\Comment\CommentEntityModel;
use Modules\App\Models\CommentModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method CommentModel model()
 * @method CommentEntityModel find($id)
 * @method CommentModel first()
 * @method CommentModel findOrNew($id)
 * @method CommentModel firstOrNew($query)
 * @method CommentEntityModel findOrFail($id)
 */
class PostCommentRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return CommentModel::class;
    }
}
