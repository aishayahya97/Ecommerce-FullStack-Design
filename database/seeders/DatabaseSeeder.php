<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
use App\Models\SavedForLater;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Categories
        Category::factory(5)->create();

        // Brands
        \App\Models\Brand::factory(5)->create();

        // Sellers
        \App\Models\Seller::factory(5)->create();

        // Products
        Product::factory(20)->create();

        // Product Images (1-3 per product)
        Product::all()->each(function ($product) {
            ProductImage::factory(rand(1,3))->create(['product_id' => $product->id]);
        });

        \App\Models\User::factory(10)->create();

        // Carts (har user ke liye)
       \App\Models\Cart::factory(10)->create(); // ya user_id assign karein

        \App\Models\Coupon::factory(10)->create();
        \App\Models\Order::factory(20)->create();
        \App\Models\Payment::factory(20)->create();
        \App\Models\SupplierRequest::factory(20)->create();
        SavedForLater::factory()->count(10)->create();





// \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
