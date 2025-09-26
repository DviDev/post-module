<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Post\Models\ThreadModel;
use PHPUnit\Framework\Attributes\Group;

#[Group('app.message.table')]
final class MessageTableTest extends BaseTest
{
    public function getModelClass(): string|ThreadModel
    {
        return ThreadModel::class;
    }
}
