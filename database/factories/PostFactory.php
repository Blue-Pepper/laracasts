<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), //if you create a new post, a new user will also be created
            'category_id' => Category::factory(), //if you create a new post, a new category will also be created
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'excerpt' => '<p>'. implode('</p><p>', $this->faker->paragraphs(2)). '</p>',
            'body' => '<p>'. implode('</p><p>', $this->faker->paragraphs(6)). '</p>',
        ];
    }
}
