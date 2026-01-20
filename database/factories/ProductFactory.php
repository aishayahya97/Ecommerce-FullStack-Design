<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'brand_id' => \App\Models\Brand::factory(),
            'seller_id' => \App\Models\Seller::factory(),
            'name' => $this->faker->words(3, true), // valid
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'discount_price' => $this->faker->optional()->randomFloat(2, 5, 300),
            'stock' => $this->faker->numberBetween(0, 100),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'status' => $this->faker->boolean(90),
        ];
    }
}
