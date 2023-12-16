<?php

namespace App\Actions\Users;

use App\Models\User;

class UpdateUserAction
{
    public static function run(User $user, array $data): User
    {
        $path = UploadUserAvatarAction::run($data['avatar'], $user);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->avatar = $path;
        $user->save();

        return $user;
    }
}
