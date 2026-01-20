<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupplierRequest>
 */
class SupplierRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => \App\Models\User::factory(), // ya null for guest
        'item_name' => $this->faker->words(3, true),
        'details' => $this->faker->sentence(),
        'quantity' => $this->faker->numberBetween(1, 100),
        'unit' => $this->faker->randomElement(['Pcs','Box','Kg']),
        ];
    }
}
