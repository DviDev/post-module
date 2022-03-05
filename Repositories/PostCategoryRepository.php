<?php

namespace Modules\Post\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Post\Entities\PostCategoryEntityModel;
use Modules\Post\Models\PostCategoryModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method PostCategoryModel model()
 * @method PostCategoryEntityModel find($id)
 * @method PostCategoryModel first()
 * @method PostCategoryModel findOrNew($id)
 * @method PostCategoryModel firstOrNew($query)
 * @method PostCategoryEntityModel findOrFail($id)
 */
class PostCategoryRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return PostCategoryModel::class;
    }
}
