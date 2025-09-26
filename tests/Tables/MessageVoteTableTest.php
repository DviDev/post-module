<?php

declare(strict_types=1);

namespace Modules\Post\Tests\Tables;

use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Post\Models\ThreadVoteModel;
use PHPUnit\Framework\Attributes\Group;

#[Group('app.message.table')]
final class MessageVoteTableTest extends BaseTest
{
    public function getModelClass(): string|ThreadVoteModel
    {
        return ThreadVoteModel::class;
    }
}
