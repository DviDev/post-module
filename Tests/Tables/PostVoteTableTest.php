<?php

namespace Modules\Post\Tests\Tables;

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

    protected function create(): PostVoteModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
