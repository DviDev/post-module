<?php

declare(strict_types=1);

namespace Modules\Post\Http\Livewire\Pages;

use Livewire\Component;

final class PostsPage extends Component
{
    public function render()
    {
        return view('livewire.pages.posts-page');
    }
}
