<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(rand(5, 10));
        $slug = Str::slug($title, '-');

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => $slug,
            'body' => fake()->paragraphs(\rand(3, 6), true),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tagIds = Tag::pluck('id')->toArray();

            $post->tags()->attach($tagIds);
        });
    }
}
