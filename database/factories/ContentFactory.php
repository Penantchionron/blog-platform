<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['videos', 'audios', 'pdf','articles']),
            'path' => $this->faker->url,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'is_free' => $this->faker->boolean(30),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'user_id' => \App\Models\User::factory(), // lien avec l’auteur
        ];
    }
}
