<?php

namespace Modules\Post\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostTag\PostTagEntityModel;
use Modules\Post\Models\PostTagModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method PostTagModel model()
 * @method PostTagEntityModel find($id)
 * @method PostTagModel first()
 * @method PostTagModel findOrNew($id)
 * @method PostTagModel firstOrNew(Builder|\Illuminate\Database\Query\Builder $query)
 * @method PostTagEntityModel findOrFail($id)
 */
class PostTagRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return PostTagModel::class;
    }
}
