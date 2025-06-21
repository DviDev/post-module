<?php

namespace Modules\Post\Entities\PostCategory;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\PostCategoryModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read PostCategoryModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class PostCategoryEntityModel extends BaseEntityModel
{
    use PostCategoryProps;
}
