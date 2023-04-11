<?php

use Modules\Base\Services\Tests\BaseTest;
use Modules\Post\Entities\PostVote\PostVoteEntityModel;
use Modules\Post\Models\PostVoteModel;

class PostVoteTableTest extends BaseTest
{

    public function getEntityClass(): string|PostVoteEntityModel
    {
        return PostVoteEntityModel::class;
    }

    public function getModelClass(): string|PostVoteModel
    {
        return PostVoteModel::class;
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

    protected function create(): PostVoteModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
