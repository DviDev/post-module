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

    public function test_table_must_exist()
    {
        parent::tableMustExist();
    }

    public function test_table_has_expected_columns()
    {
        parent::tableHasExpectedColumns();
    }

    public function test_can_create_instance_of_entity()
    {
        parent::canCreateInstanceOfEntity();
    }

    public function test_can_create_instance_of_model()
    {
        parent::canCreateInstanceOfModel();
    }

    public function test_should_save($attributes = null)
    {
        parent::shouldSave($attributes);
    }

    public function test_should_update($attributes = null)
    {
        parent::shouldUpdate($attributes);
    }

    public function test_should_delete()
    {
        parent::shouldDelete();
    }

    protected function create(): PostTagModel
    {
        return $this->getModelClass()::factory()->create();
    }
}
