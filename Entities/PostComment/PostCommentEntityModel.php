<?php

namespace Modules\Post\Entities\PostComment;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\PostCommentModel;
use Modules\Post\Repositories\PostCommentRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read PostCommentModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method PostCommentRepository repository()
 */
class PostCommentEntityModel extends BaseEntityModel
{
    use PostCommentProps;

    protected function repositoryClass(): string
    {
        return PostCommentRepository::class;
    }
}
