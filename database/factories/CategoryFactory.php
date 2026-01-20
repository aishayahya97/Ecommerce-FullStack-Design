<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition()
    {
        return [
            'parent_id' => null, // later we can set parent categories
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->boolean(90),
        ];
    }
}
