<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostVoteModel model()
 * @method PostVoteEntityModel find($id)
 * @method PostVoteModel first()
 * @method PostVoteModel findOrNew($id)
 * @method PostVoteModel firstOrNew($query)
 * @method PostVoteEntityModel findOrFail($id)
 */
class PostVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostVoteModel::class;
    }
}
