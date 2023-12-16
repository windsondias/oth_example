<?php

namespace App\Actions\Users;

use App\Models\User;

class DeleteUserAction
{
    public static function run(User $user): ?bool
    {
        return $user->delete();
    }
}
