<?php

namespace Modules\Post\Tests\Tables;

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\PostTag\PostTagEntityModel;
use Modules\Post\Models\PostTagModel;

class PostTagTableTest extends BaseTest
{

    public function getEntityClass(): string|PostTagEntityModel
    {
        return PostTagEntityModel::class;
    }

    public function getModelClass(): string|PostTagModel
    {
        return PostTagModel::class;
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

    protected function create(): PostTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
