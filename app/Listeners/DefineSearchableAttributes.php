<?php

declare(strict_types=1);

namespace Modules\Post\Listeners;

use Modules\Project\Contracts\DefineSearchableAttributesContract;

final class DefineSearchableAttributes extends DefineSearchableAttributesContract
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
