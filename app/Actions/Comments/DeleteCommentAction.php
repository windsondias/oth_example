<?php

namespace App\Actions\Comments;

use App\Models\Comment;

class DeleteCommentAction
{
    public static function run(Comment $comment): ?bool
    {
        return $comment->delete();
    }
}
