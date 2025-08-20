<?php

namespace Modules\Post\Listeners;

use Modules\Base\Contracts\BaseTranslateViewElementPropertiesListener;

class TranslateViewElementPropertiesListener extends BaseTranslateViewElementPropertiesListener
{
    protected function moduleName(): string
    {
        return config('post.name');
    }

    protected function moduleNameLower(): string
    {
        return strtolower(config('post.name'));
    }
}
