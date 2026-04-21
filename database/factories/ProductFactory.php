<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->words(5, true),
            'price' => $this->faker->randomFloat(2, 0.01, 50000.00),
            'category_id' => $this->faker->randomElement($categoryIds),
            'in_stock' => $this->faker->boolean(),
            'rating' => $this->faker->randomFloat(2, 1.00, 5.00),
        ];
    }
}
