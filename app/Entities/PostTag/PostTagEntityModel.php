<?php

declare(strict_types=1);

namespace Modules\Post\Entities\PostTag;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Post\Models\PostTagModel;
use Modules\Post\Repositories\PostTagRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read PostTagModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method PostTagRepository repository()
 */
final class PostTagEntityModel extends BaseEntityModel
{
    use PostTagProps;

    protected function repositoryClass(): string
    {
        return PostTagRepository::class;
    }
}
