<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\Message\MessageEntityModel;
use Modules\Post\Models\MessageModel;

/** @group app.message.table */
class MessageTableTest extends BaseTest
{
    public function getEntityClass(): string|MessageEntityModel
    {
        return MessageEntityModel::class;
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

    protected function create(): MessageModel
    {
        return $this->getModelClass()::factory()->create();
    }

    public function getModelClass(): string|MessageModel
    {
        return MessageModel::class;
    }
}
