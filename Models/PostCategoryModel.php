<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostCategoryEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCategoryEntityModel toEntity()
 */
class PostCategoryModel extends BaseModel
{
    function modelEntity()
    {
        return PostCategoryEntityModel::class;
    }
}
