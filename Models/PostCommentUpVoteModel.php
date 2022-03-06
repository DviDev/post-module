<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostCommentUpVoteEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostCommentUpVoteEntityModel toEntity()
 */
class PostCommentUpVoteModel extends BaseModel
{
    function modelEntity()
    {
        return PostCommentUpVoteEntityModel::class;
    }
}
