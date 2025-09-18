<?php

namespace Modules\Post\Listeners;

use Modules\Project\Contracts\DefineSearchableAttributesContract;

class DefineSearchableAttributes extends DefineSearchableAttributesContract
{
    protected function moduleName(): string
    {
        return config('post.name');
    }

    protected function searchableFields(): array
    {
        return [];
    }
}
