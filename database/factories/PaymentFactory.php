<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'payment_method' => $this->faker->randomElement(['card','cod','bank']),
            'payment_status' => $this->faker->randomElement(['pending','paid','failed']),
            'transaction_id' => $this->faker->uuid(),
            'paid_at' => $this->faker->boolean(70) ? now() : null, // 🔥 IMPORTANT
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
