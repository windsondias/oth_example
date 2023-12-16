<?php

namespace App\Actions\Todos;

use App\Models\Todo;

class DeleteTodoAction
{
    public static function run(Todo $todo): ?bool
    {
        return $todo->delete();
    }
}
