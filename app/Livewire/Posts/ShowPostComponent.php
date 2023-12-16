<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public Post $post;

    public function render(): View
    {
        return view('livewire.posts.show-post-component');
    }
}
