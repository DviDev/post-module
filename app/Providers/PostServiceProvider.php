<?php

namespace Modules\Post\Providers;

use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Modules\Base\Contracts\BaseServiceProviderContract;
use Modules\DBMap\Events\ScanTableEvent;
use Modules\Post\Http\Livewire\Pages\PostsPage;
use Modules\Post\Listeners\CreateMenuItemsListener;
use Modules\Post\Listeners\DefineSearchableAttributes;
use Modules\Post\Listeners\ScanTablePostListener;
use Modules\Post\Listeners\TranslateViewElementPropertiesListener;
use Modules\Project\Events\CreateMenuItemsEvent;
use Modules\View\Events\DefineSearchableAttributesEvent;
use Modules\View\Events\ElementPropertyCreatingEvent;

class PostServiceProvider extends BaseServiceProviderContract
{
    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            RouteServiceProvider::class,
        ];
    }

    public function getModuleName(): string
    {
        return 'Post';
    }

    public function getModuleNameLower(): string
    {
        return 'post';
    }

    protected function registerComponents(): void
    {
        Livewire::component('post::page.posts', PostsPage::class);
    }

    protected function registerEvents(): void
    {
        Event::listen(ElementPropertyCreatingEvent::class, TranslateViewElementPropertiesListener::class);
        Event::listen(CreateMenuItemsEvent::class, CreateMenuItemsListener::class);
        Event::listen(DefineSearchableAttributesEvent::class, DefineSearchableAttributes::class);
        Event::listen(ScanTableEvent::class, ScanTablePostListener::class);
    }
}
