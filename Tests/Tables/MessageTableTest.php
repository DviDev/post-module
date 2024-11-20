<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\Thread\ThreadEntityModel;
use Modules\Post\Models\ThreadModel;

/** @group app.message.table */
class MessageTableTest extends BaseTest
{
    public function getEntityClass(): string|ThreadEntityModel
    {
        return ThreadEntityModel::class;
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

    protected function create(): ThreadModel
    {
        return $this->getModelClass()::factory()->create();
    }

    public function getModelClass(): string|ThreadModel
    {
        return ThreadModel::class;
    }
}
