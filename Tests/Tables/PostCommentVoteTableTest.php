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

    protected function create(): PostCommentVoteModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
