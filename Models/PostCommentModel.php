<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostCommentEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCommentEntityModel toEntity()
 */
class PostCommentModel extends BaseModel
{
    function modelEntity()
    {
        return PostCommentEntityModel::class;
    }
}
