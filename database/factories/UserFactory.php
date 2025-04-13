<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // ou Hash::make('password')
            'avatar' => $this->faker->imageUrl(640, 640, 'people', true),
            'role' => 'user',
            'is_premium' => $this->faker->boolean(30), // 30% premium users
            'premium_expires_at' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
            'provider' => null,
            'provider_id' => null,
            'is_active' => true,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
