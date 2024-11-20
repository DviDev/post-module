<?php

namespace Modules\Post\Entities\Message;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\MessageModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read MessageModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class MessageEntityModel extends BaseEntityModel
{
    use MessageProps;
}
