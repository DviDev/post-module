<?php

use Modules\Base\Services\Tests\BaseTest;
use Modules\App\Entities\Comment\CommentEntityModel;
use Modules\App\Models\CommentModel;

class PostCommentTableTest extends BaseTest
{

    public function getEntityClass(): string|CommentEntityModel
    {
        return CommentEntityModel::class;
    }

    public function getModelClass(): string|CommentModel
    {
        return CommentModel::class;
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

    protected function create(): CommentModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
