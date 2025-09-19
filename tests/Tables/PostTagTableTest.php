<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\PostTagModel;

final class PostTagTableTest extends BaseTest
{
    public function getModelClass(): string|PostTagModel
    {
        return PostTagModel::class;
    }
}
