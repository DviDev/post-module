<?php

declare(strict_types=1);

namespace Modules\Post\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\Base\Contracts\BaseRepository;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method PostModel model()
 * @method PostEntityModel find($id)
 * @method PostModel first()
 * @method PostModel findOrNew($id)
 * @method PostModel firstOrNew(Builder|\Illuminate\Database\Query\Builder $query)
 * @method PostEntityModel findOrFail($id)
 */
final class PostRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return PostModel::class;
    }
}
