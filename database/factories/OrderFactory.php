<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $subtotal = $this->faker->numberBetween(1000, 10000);
        $discount = $this->faker->numberBetween(0, 500);
        $tax = $subtotal * 0.05;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => ($subtotal - $discount) + $tax,
            'status' => $this->faker->randomElement(['pending','paid','shipped','cancelled']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
