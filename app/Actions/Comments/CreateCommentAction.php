<?php

namespace App\Actions\Comments;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CreateCommentAction
{
    public static function run(array $data): Comment
    {
        return Comment::query()->create([
            'post_id' => $data['post']['id'],
            'user_id' => Auth::id(),
            'message' => $data['message']
        ]);
    }
}
