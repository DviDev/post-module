<?php

namespace Modules\Post\Entities\MessageVote;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\MessageVoteModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read MessageVoteModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class MessageVoteEntityModel extends BaseEntityModel
{
    use MessageVoteProps;
}
