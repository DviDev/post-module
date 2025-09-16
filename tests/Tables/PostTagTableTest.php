<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\PostTagModel;

class PostTagTableTest extends BaseTest
{
    public function getModelClass(): string|PostTagModel
    {
        return PostTagModel::class;
    }
}
