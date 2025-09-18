<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\ThreadFileModel;

class ThreadFileTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ThreadFileModel::class;
    }
}
