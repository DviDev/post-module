<?php

namespace Modules\Post\Http\Livewire\Form;

use Livewire\Component;
use Modules\Post\Models\PostModel;

class PostForm2 extends Component
{
    public PostModel $post;

    public $rules;

    public function render()
    {
        return view('livewire.post.form.post-form2');
    }
}
