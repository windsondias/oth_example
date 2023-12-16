<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreatePostAction
{
    public static function run(array $data): Post
    {
        return Post::query()->create([
            'user_id' => Auth::id(),
            'slug' => Str::slug($data['title']),
            'title' => $data['title'],
            'content' => $data['content']
        ]);
    }
}
