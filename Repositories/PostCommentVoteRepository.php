<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Models\PostCommentVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostCommentVoteModel model()
 * @method PostCommentVoteEntityModel find($id)
 * @method PostCommentVoteModel first()
 * @method PostCommentVoteModel findOrNew($id)
 * @method PostCommentVoteModel firstOrNew($query)
 * @method PostCommentVoteEntityModel findOrFail($id)
 */
class PostCommentVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostCommentVoteModel::class;
    }
}
