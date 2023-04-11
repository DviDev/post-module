<?php

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\PostComment\PostCommentEntityModel;
use Modules\Post\Models\PostCommentModel;

class PostCommentTableTest extends BaseTest
{

    public function getEntityClass(): string|PostCommentEntityModel
    {
        return PostCommentEntityModel::class;
    }

    public function getModelClass(): string|PostCommentModel
    {
        return PostCommentModel::class;
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

    protected function create(): PostCommentModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
