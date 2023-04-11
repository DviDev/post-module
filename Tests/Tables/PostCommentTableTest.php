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

    protected function create(): PostCommentModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
