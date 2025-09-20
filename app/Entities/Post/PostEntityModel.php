<?php

declare(strict_types=1);

namespace Modules\Post\Entities\Post;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Post\Models\PostModel;
use Modules\Post\Repositories\PostRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read PostModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method PostRepository repository()
 */
final class PostEntityModel extends BaseEntityModel
{
    use PostProps;

    protected function repositoryClass(): string
    {
        return PostRepository::class;
    }
}
