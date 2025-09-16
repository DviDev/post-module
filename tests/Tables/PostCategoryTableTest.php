<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\PostCategoryModel;

class PostCategoryTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return PostCategoryModel::class;
    }
}
