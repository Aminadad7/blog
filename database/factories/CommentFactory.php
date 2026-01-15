<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => \App\Models\User::all()->random()->name,
        'post_id' => \App\Models\Post::all()->random()->id,
        'content' => $this->faker->sentence(),
        ];
    }
}
