<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code' => strtoupper(fake()->lexify('??????')),
            'discount_type' => fake()->randomElement(['fixed','percent']),
            'discount_value' => fake()->numberBetween(5,50),
            'min_cart_amount' => fake()->numberBetween(100,500),
            'expiry_date' => fake()->dateTimeBetween('now','+1 year'),
            'status' => fake()->boolean(),
        ];
    }
}
