<?php

namespace Modules\Post\Entities\ThreadFile;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\ThreadFileModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ThreadFileModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ThreadFileEntityModel extends BaseEntityModel
{
    use ThreadFileProps;
}
