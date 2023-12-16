<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->text(40);

        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(3, true)
        ];
    }
}
