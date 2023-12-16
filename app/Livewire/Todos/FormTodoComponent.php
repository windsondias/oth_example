<?php

namespace App\Livewire\Todos;

use App\Actions\Todos\CreateTodoAction;
use App\Actions\Todos\UpdateTodoAction;
use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class FormTodoComponent extends Component
{
    use Toast;

    public ?Todo $todo;

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $item;

    #[On('set-to-update')]
    public function setToUpdate(Todo $todo): void
    {
        $this->todo = $todo;

        $this->item = $todo->item;
    }

    public function submit(): void
    {
        $data = $this->validate();

        try {
            empty($this->todo)
                ? CreateTodoAction::run($data)
                : UpdateTodoAction::run($this->todo, $data);

            empty($this->todo)
                ? $this->success('To do created successful')
                : $this->success('To do updated successful');

            $this->dispatch('refresh-todos');
            $this->reset();
        }catch (\Throwable $throwable){
            $this->error('Error on creating');
            Log::error('FormTodoComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.todos.form-todo-component');
    }
}
