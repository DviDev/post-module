<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostUpVoteEntityModel;
use Modules\Post\Models\PostUpVoteModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostUpVoteModel model()
 * @method PostUpVoteEntityModel find($id)
 * @method PostUpVoteModel first()
 * @method PostUpVoteModel findOrNew($id)
 * @method PostUpVoteModel firstOrNew($query)
 * @method PostUpVoteEntityModel findOrFail($id)
 */
class PostUpVoteRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostUpVoteModel::class;
    }
}
