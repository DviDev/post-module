<?php

namespace Modules\Post\Entities\Thread;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\ThreadModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ThreadModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ThreadEntityModel extends BaseEntityModel
{
    use ThreadProps;
}
