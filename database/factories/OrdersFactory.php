<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
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
            'or_pd_id'=> Products::inRandomOrder()->first()->pd_id,
            'or_amount'=> $this->faker->randomFloat(2,50,1000),
            'or_created_at'=> $createdAt,
            'or_updated_at'=> $updatedAt,
        ];
    }
}
