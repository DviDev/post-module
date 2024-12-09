<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Post\Entities\ThreadFile\ThreadFileEntityModel;
use Modules\Post\Entities\ThreadFile\ThreadFileProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ThreadFileModel $model
 * @method ThreadFileEntityModel toEntity()
 */
class ThreadFileModel extends BaseModel
{
    use HasFactory;
    use ThreadFileProps;

    public static function table($alias = null): string
    {
        return self::dbTable('thread_files', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ThreadFileModel::class;
        };
    }

    public function modelEntity(): string
    {
        return ThreadFileEntityModel::class;
    }
}
