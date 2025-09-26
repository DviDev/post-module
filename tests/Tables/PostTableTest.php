<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Post\Models\PostModel;

final class PostTableTest extends BaseTest
{
    public function getModelClass(): string|PostModel
    {
        return PostModel::class;
    }
}
