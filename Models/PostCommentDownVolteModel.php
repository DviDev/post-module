<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostCommentDownVoteEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCommentDownVoteEntityModel toEntity()
 */
class PostCommentDownVolteModel extends BaseModel
{
    function modelEntity()
    {
        return PostCommentDownVoteEntityModel::class;
    }
}
