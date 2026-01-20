<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        // Ensure a valid user exists
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        // Ensure a valid product exists
        $product = Product::inRandomOrder()->first() ?? Product::factory()->create();

        return [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => rand(1,5),
            'status' => $this->faker->randomElement(['active', 'pending', 'completed']),
        ];
    }
}
