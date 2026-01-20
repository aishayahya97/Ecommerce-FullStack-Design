<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = \App\Models\Brand::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'slug' => $this->faker->slug(),
            'logo' => null, // ya $this->faker->image('public/storage/brands', 100, 100, null, false)
            'status' => $this->faker->boolean(90),
        ];
    }
}
