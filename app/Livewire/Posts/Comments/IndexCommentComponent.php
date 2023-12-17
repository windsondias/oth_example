<?php

namespace App\Livewire\Posts\Comments;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCommentComponent extends Component
{
    use WithPagination;

    public Post $post;

    protected $listeners = [
        'refresh-comments' => '$refresh'
    ];

    #[Computed]
    public function comments(): LengthAwarePaginator
    {
        return $this->post->comments()->orderByDesc('id')->paginate(2);
    }

    public function render(): View
    {
        return view('livewire.posts.comments.index-comment-component');
    }
}
