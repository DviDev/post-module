<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Models\PostCommentModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostCommentModel model()
 * @method PostCommentEntityModel find($id)
 * @method PostCommentModel first()
 * @method PostCommentModel findOrNew($id)
 * @method PostCommentModel firstOrNew($query)
 * @method PostCommentEntityModel findOrFail($id)
 */
class PostCommentRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostCommentModel::class;
    }
}
