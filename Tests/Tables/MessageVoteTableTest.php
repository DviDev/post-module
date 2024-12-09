<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\ThreadVote\ThreadVoteEntityModel;
use Modules\Post\Models\ThreadVoteModel;

/** @group app.message.table */
class MessageVoteTableTest extends BaseTest
{
    public function getEntityClass(): string|ThreadVoteEntityModel
    {
        return ThreadVoteEntityModel::class;
    }

    public function testTableMustExist()
    {
        parent::tableMustExist();
    }

    public function testTableHasExpectedColumns()
    {
        parent::tableHasExpectedColumns();
    }

    public function testCanCreateInstanceOfEntity()
    {
        parent::canCreateInstanceOfEntity();
    }

    public function testCanCreateInstanceOfModel()
    {
        parent::canCreateInstanceOfModel();
    }

    public function testShouldSave($attributes = null)
    {
        parent::shouldSave($attributes);
    }

    public function testShouldUpdate($attributes = null)
    {
        parent::shouldUpdate($attributes);
    }

    public function testShouldDelete()
    {
        parent::shouldDelete();
    }

    protected function create(): ThreadVoteModel
    {
        return $this->getModelClass()::factory()->create();
    }

    public function getModelClass(): string|ThreadVoteModel
    {
        return ThreadVoteModel::class;
    }
}
