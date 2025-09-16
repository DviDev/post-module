<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\PostModel;

class PostTableTest extends BaseTest
{
    public function getModelClass(): string|PostModel
    {
        return PostModel::class;
    }
}
