<?php

namespace App\Livewire\Posts;

use App\Actions\Posts\DeletePostAction;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class DeletePostComponent extends Component
{
    use Toast;

    public ?Post $post;

    public bool $deleteModal = false;

    #[On('set-to-delete')]
    public function setToDelete(Post $post): void
    {
        $this->post = $post;

        $this->deleteModal = true;
    }

    public function submit(): void
    {
        try {
            DeletePostAction::run($this->post);

            $this->dispatch('refresh-posts');

            $this->reset();
        }catch (\Throwable $throwable){
            $this->error('Error');
            Log::error('DeletePostComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.posts.delete-post-component');
    }
}
