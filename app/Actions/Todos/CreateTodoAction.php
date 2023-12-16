<?php

namespace App\Actions\Todos;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class CreateTodoAction
{
    public static function run(array $data): Todo
    {
        return Todo::query()->create([
            'user_id' => Auth::id(),
            'item' => $data['item'],
        ]);
    }
}
