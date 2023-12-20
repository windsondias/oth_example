<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Sleep;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPostComponent extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public ?string $search;

    protected $listeners = [
        'refresh-posts' => '$refresh'
    ];

    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->when(!empty($this->search), function (Builder $query){
                $query->where('title','like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);
    }

    public function render(): View
    {
        return view('livewire.posts.index-post-component');
    }
}
