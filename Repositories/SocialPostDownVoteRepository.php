<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostDownVoteEntityModel;
use Modules\Post\Models\PostDownVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostDownVoteModel model()
 * @method PostDownVoteEntityModel find($id)
 * @method PostDownVoteModel first()
 * @method PostDownVoteModel findOrNew($id)
 * @method PostDownVoteModel firstOrNew($query)
 * @method PostDownVoteEntityModel findOrFail($id)
 */
class SocialPostDownVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostDownVoteModel::class;
    }
}
