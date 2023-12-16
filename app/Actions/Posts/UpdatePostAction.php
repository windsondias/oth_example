<?php

namespace App\Actions\Posts;

use App\Models\Post;

class UpdatePostAction
{
    public static function run(Post $post, array $data): Post
    {
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        return  $post;
    }
}
