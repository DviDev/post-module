<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseTest;
use Modules\Post\Models\ThreadFileModel;

final class ThreadFileTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ThreadFileModel::class;
    }
}
