<?php

namespace App\Livewire\Posts;

use App\Actions\Posts\CreatePostAction;
use App\Actions\Posts\UpdatePostAction;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class FormPostComponent extends Component
{
    use Toast;

    public ?Post $post;

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $title;

    #[Validate(['required', 'string', 'max:1000'])]
    public ?string $content = '';

    public function mount(): void
    {
        if (!empty($this->post)){
            $this->title = $this->post->title;

            $this->content = $this->post->content;
        }
    }

    public function submit(): void
    {
        $data = $this->validate();

        try {
            empty($this->post)
                ? CreatePostAction::run($data)
                : UpdatePostAction::run($this->post, $data);

            empty($this->post)
                ? $this->success('Post created successfully')
                : $this->success('Post updated successfully');

            $this->redirectRoute('posts.index', navigate: true);
        }catch (\Throwable $throwable){
            empty($this->post)
                ? $this->error('An error occurred while creating the post, please try again')
                : $this->error('An error occurred while updating the post, please try again');
            Log::error('FormPostComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.posts.form-post-component');
    }
}
