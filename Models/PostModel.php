<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Models\BaseModel;
use Modules\Post\Database\Factories\PostFactory;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Entities\Post\PostProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method PostEntityModel toEntity()
 * @method PostFactory factory()
 */
class PostModel extends BaseModel
{
    use HasFactory;
    use PostProps;
    use SoftDeletes;

    public function modelEntity(): string
    {
        return PostEntityModel::class;
    }

    protected static function newFactory(): PostFactory
    {
        return new PostFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('posts', $alias);
    }
}
