<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostTagEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostTagEntityModel toEntity()
 */
class PostTagModel extends BaseModel
{
    function modelEntity()
    {
        return PostTagEntityModel::class;
    }
}
