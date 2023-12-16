<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CreateUserAction
{
    public static function run(array $data): User
    {
        $path = UploadUserAvatarAction::run($data['avatar']);

        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Str::password(),
            'avatar' => $path
        ]);

        self::notify($user);

        return $user;
    }

    public static function notify(User $user): void
    {
        $token = Password::createToken($user);

        $user->notify(new NewUserNotification($user, $token));
    }
}
