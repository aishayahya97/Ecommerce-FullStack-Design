<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductImageFactory extends Factory
{
    protected $model = \App\Models\ProductImage::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()?->id ?? 1,
            'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
            'is_main' => $this->faker->boolean(20),
        ];
    }
}
