<?php

declare(strict_types=1);

namespace Modules\Post\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseFactory;
use Modules\Post\Entities\ThreadFile\ThreadFileEntityModel;
use Modules\Post\Entities\ThreadFile\ThreadFileProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ThreadFileModel $model
 *
 * @method ThreadFileEntityModel toEntity()
 */
final class ThreadFileModel extends BaseModel
{
    use ThreadFileProps;

    public static function table($alias = null): string
    {
        return self::dbTable('thread_files', $alias);
    }

    public function modelEntity(): string
    {
        return ThreadFileEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ThreadFileModel::class;
        };
    }
}
