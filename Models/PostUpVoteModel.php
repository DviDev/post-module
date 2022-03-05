<?php

namespace Modules\Post\Models;

use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\PostUpVoteEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostUpVoteEntityModel toEntity()
 */
class PostUpVoteModel extends BaseModel
{
    function modelEntity()
    {
        return PostUpVoteEntityModel::class;
    }
}
