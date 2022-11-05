<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostModel model()
 * @method PostEntityModel find($id)
 * @method PostModel first()
 * @method PostModel findOrNew($id)
 * @method PostModel firstOrNew($query)
 * @method PostEntityModel findOrFail($id)
 */
class PostRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostModel::class;
    }
}
