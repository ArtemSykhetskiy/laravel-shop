<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => fake()->numberBetween(1,10),
            'title' => fake()->text(35),
            'description' => fake()->text(500),
            'short_description' => fake()->text(100),
            'SKU' => fake()->ean8(),
            'price' => fake()->numberBetween(10, 100000),
            'discount' => fake()->numberBetween(1,50),
            'in_stock' => fake()->numberBetween(1, 100),
            'thumbnail' => fake()->imageUrl()
        ];
    }
}
