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
        $createdAt = $this->faker->dateTimeBetween('-1 month', 'now');
        $updatedAt = $this->faker->dateTimeBetween($createdAt, 'now');

        return [
            'us_name' => fake()->name(),
            'us_password' => fake()->password(8),
            'us_email' => fake()->unique()->safeEmail(),
            'us_phone_number' => fake()->phoneNumber(),
            'us_address' => fake()->address(),
            'us_created_at' => $createdAt,
            'us_updated_at' => $updatedAt,
        ];
    }

}
