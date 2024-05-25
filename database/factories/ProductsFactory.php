<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
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
            'pd_ct_id'=>Categories::inRandomOrder()->first()->ct_id ?? null,
            'pd_name' => $this->faker->unique()->words(3, true),
            'pd_price'=> $this->faker->randomFloat(2, 0, 999999.99),
            'pd_created_at'=>$createdAt,
            'pd_updated_at'=>$updatedAt,
        ];
    }
}
