<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UploadUserAvatarAction
{
    public static function run($avatar = null, User $user = null)
    {
        if (!empty($avatar) && !empty($user->avatar)) {
            self::deleteAvatar($user->avatar);
        }

        return !empty($avatar)
            ? $avatar->store('users/avatar', 'public')
            : $user->avatar ?? null;
    }

    public static function deleteAvatar(string $avatar): void
    {
        if (!empty($avatar)) {
            Storage::disk('public')->delete($avatar);
        }
    }
}
