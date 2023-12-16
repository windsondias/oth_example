<?php

namespace App\Actions\Todos;

use App\Models\Todo;

class UpdateTodoAction
{
    public static function run(Todo $todo, array $data): Todo
    {
        $todo->item = $data['item'];
        $todo->save();

        return $todo;
    }
}
