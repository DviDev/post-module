<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostCommentUpVoteEntityModel;
use Modules\Post\Models\PostCommentUpVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostCommentUpVoteModel model()
 * @method PostCommentUpVoteEntityModel find($id)
 * @method PostCommentUpVoteModel first()
 * @method PostCommentUpVoteModel findOrNew($id)
 * @method PostCommentUpVoteModel firstOrNew($query)
 * @method PostCommentUpVoteEntityModel findOrFail($id)
 */
class PostCommentUpVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostCommentUpVoteModel::class;
    }
}
