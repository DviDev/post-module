<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\ThreadModel;
use PHPUnit\Framework\Attributes\Group;

#[Group("app.message.table")]
class MessageTableTest extends BaseTest
{
    public function getModelClass(): string|ThreadModel
    {
        return ThreadModel::class;
    }
}
