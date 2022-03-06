<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostCommentDownVoteEntityModel;
use Modules\Post\Models\PostCommentDownVolteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostCommentDownVolteModel model()
 * @method PostCommentDownVoteEntityModel find($id)
 * @method PostCommentDownVolteModel first()
 * @method PostCommentDownVolteModel findOrNew($id)
 * @method PostCommentDownVolteModel firstOrNew($query)
 * @method PostCommentDownVoteEntityModel findOrFail($id)
 */
class SocialPostCommentDownVolteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostCommentDownVolteModel::class;
    }
}
