<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Models\ThreadVoteModel;
use PHPUnit\Framework\Attributes\Group;

#[Group('app.message.table')]
class MessageVoteTableTest extends BaseTest
{
    public function getModelClass(): string|ThreadVoteModel
    {
        return ThreadVoteModel::class;
    }
}
