<?php

namespace App\Livewire\Posts\Comments;

use App\Actions\Comments\CreateCommentAction;
use App\Actions\Comments\UpdateCommentAction;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class FormCommentComponent extends Component
{
    use Toast;

    #[Validate('required')]
    public Post $post;

    public ?Comment $comment;

    #[Validate(['required', 'string', 'max:500'])]
    public ?string $message;

    #[On('set-to-edit')]
    public function SetToEdit(Comment $comment): void
    {
        $this->comment = $comment;

        $this->message = $comment->message;
    }

    public function submit(): void
    {
        $data = $this->validate();

        try {
            empty($this->comment)
                ? CreateCommentAction::run($data)
                : UpdateCommentAction::run($this->comment, $data);

            empty($this->comment)
                ? $this->success('Comment created successful')
                : $this->success('Comment updated successful');

            $this->reset('comment', 'message');

            $this->dispatch('refresh-comments');
        }catch (\Throwable $throwable){
            $this->error('Error');
            Log::error('FormCommentComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.posts.comments.form-comment-component');
    }
}
