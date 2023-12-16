<?php

namespace App\Actions\Posts;

use App\Models\Post;

class DeletePostAction
{
    public static function run(Post $post): ?bool
    {
        return $post->delete();
    }
}
