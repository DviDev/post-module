<?php

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\PostCommentVote\PostCommentVoteEntityModel;
use Modules\Post\Models\PostCommentVoteModel;

class PostCommentVoteTableTest extends BaseTest
{

    public function getEntityClass(): string|PostCommentVoteEntityModel
    {
        return PostCommentVoteEntityModel::class;
    }

    public function getModelClass(): string|PostCommentVoteModel
    {
        return PostCommentVoteModel::class;
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

    protected function create(): PostCommentVoteModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
