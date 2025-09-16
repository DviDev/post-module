<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\ThreadModel;

/** @group app.message.table */
class MessageTableTest extends BaseTest
{
    public function getModelClass(): string|ThreadModel
    {
        return ThreadModel::class;
    }
}
