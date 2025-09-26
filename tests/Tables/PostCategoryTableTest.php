<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Post\Models\PostCategoryModel;

final class PostCategoryTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return PostCategoryModel::class;
    }
}
