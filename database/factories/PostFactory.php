<?php

namespace Database\Factories;

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
            'user_id' => \App\Models\User::all()->random()->id,
        'category_id' => \App\Models\Category::all()->random()->id,
        'title' => $this->faker->sentence(),
       
        'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
