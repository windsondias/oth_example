<?php

namespace App\Actions\Comments;

use App\Models\Comment;

class UpdateCommentAction
{
    public static function run(Comment $comment, array $data): Comment
    {
        $comment->message = $data['message'];
        $comment->save();

        return $comment;
    }
}
