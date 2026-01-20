<?php

namespace Database\Factories;

use App\Models\SavedForLater;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavedForLaterFactory extends Factory
{
    protected $model = SavedForLater::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}
