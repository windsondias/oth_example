<?php

namespace App\Livewire\Todos;

use App\Actions\Todos\DeleteTodoAction;
use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class DeleteTodoComponent extends Component
{
    use Toast;

    public ?Todo $todo;

    public bool $deleteModal = false;

    #[On('set-to-delete')]
    public function setToDelete(Todo $todo): void
    {
        $this->todo = $todo;

        $this->deleteModal = true;
    }

    public function submit(): void
    {
        try {
            DeleteTodoAction::run($this->todo);

            $this->dispatch('refresh-todos');

            $this->reset();
        }catch (\Throwable $throwable){
            $this->error('Error');
            Log::error('DeleteTodoComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.todos.delete-todo-component');
    }
}
