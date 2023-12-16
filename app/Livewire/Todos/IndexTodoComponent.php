<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class IndexTodoComponent extends Component
{
    protected $listeners = [
        'refresh-todos' => '$refresh',
    ];

    public function toggleDone(Todo $todo): void
    {
        $todo->done = !$todo->done;
        $todo->save();
    }

    #[Computed]
    public function todos()
    {
        return Auth::user()->todos()->orderByDesc('id')->get();
    }

    public function render(): View
    {
        return view('livewire.todos.index-todo-component');
    }
}
