<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostEntityModel toEntity()
 */
class PostModel extends BaseModel
{
    function modelEntity()
    {
        return PostEntityModel::class;
    }
}
