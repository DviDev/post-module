<?php

declare(strict_types=1);

namespace Modules\Post\Listeners;

use Modules\Base\Contracts\BaseTranslateViewElementPropertiesListener;

final class TranslateViewElementPropertiesListener extends BaseTranslateViewElementPropertiesListener
{
    protected function moduleName(): string
    {
        return config('post.name');
    }

    protected function moduleNameLower(): string
    {
        return mb_strtolower(config('post.name'));
    }
}
