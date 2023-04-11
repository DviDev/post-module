<?php

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

    protected function create(): PostTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
