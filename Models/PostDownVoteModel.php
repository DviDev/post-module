<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostDownVoteEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostDownVoteEntityModel toEntity()
 */
class PostDownVoteModel extends BaseModel
{
    function modelEntity()
    {
        return PostDownVoteEntityModel::class;
    }
}
