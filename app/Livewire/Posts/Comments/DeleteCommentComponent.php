<?php

namespace App\Livewire\Posts\Comments;

use App\Actions\Comments\DeleteCommentAction;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class DeleteCommentComponent extends Component
{
    use Toast;

    public ?Comment $comment;

    public bool $deleteModal = false;

    #[On('set-to-delete')]
    public function setToDelete(Comment $comment): void
    {
        $this->comment = $comment;

        $this->deleteModal = true;
    }

    public function submit(): void
    {
        try {
            DeleteCommentAction::run($this->comment);

            $this->dispatch('refresh-comments');

            $this->reset();

            $this->success('Comment deleted successfully');
        }catch (\Throwable $throwable){
            $this->error('An error occurred while deleting the comment, please try again');
            Log::error('DeleteCommentComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.posts.comments.delete-comment-component');
    }
}
