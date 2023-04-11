<?php

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\Post\PostEntityModel;
use Modules\Post\Models\PostModel;

class PostTableTest extends BaseTest
{

    public function getEntityClass(): string|PostEntityModel
    {
        return PostEntityModel::class;
    }

    public function getModelClass(): string|PostModel
    {
        return PostModel::class;
    }

    public function testTableMustExist()
    {
        parent::testTableMustExist();
    }

    public function testTableHasExpectedColumns()
    {
        parent::testTableHasExpectedColumns();
    }

    public function testCanCreateInstanceOfEntity()
    {
        parent::testCanCreateInstanceOfEntity();
    }

    public function testCanCreateInstanceOfModel()
    {
        parent::testCanCreateInstanceOfModel();
    }

    public function testShouldSave($attributes = null)
    {
        parent::testShouldSave($attributes);
    }

    public function testShouldUpdate($attributes = null)
    {
        parent::testShouldUpdate($attributes);
    }

    public function testShouldDelete()
    {
        parent::testShouldDelete();
    }

    protected function create(): PostModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
