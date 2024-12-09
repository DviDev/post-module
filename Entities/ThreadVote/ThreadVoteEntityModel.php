<?php

namespace Modules\Post\Entities\ThreadVote;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\ThreadVoteModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ThreadVoteModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ThreadVoteEntityModel extends BaseEntityModel
{
    use ThreadVoteProps;
}
