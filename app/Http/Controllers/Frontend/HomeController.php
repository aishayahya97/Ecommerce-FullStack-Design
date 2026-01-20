<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Parent Categories
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->take(12)
            ->get();

        // Home banner slider products
        $bannerProducts = Product::where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        // Deals & Offers (discounted products)
        $deals = Product::whereNotNull('discount_price')
            ->where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        // Top banner product
        $topBanner = Product::with('images')
            ->where('status', 1)
            ->latest()
            ->first();

        // Right side products (top row)
        $topProducts = Product::with('images')
            ->where('status', 1)
            ->latest()
            ->take(8)
            ->get();

        // Lower banner (2nd latest product)
        $lowerBanner = Product::with('images')
            ->where('status', 1)
            ->skip(1)
            ->first();

        // Lower row products
        $lowerProducts = Product::with('images')
            ->where('status', 1)
            ->skip(1)
            ->take(8)
            ->get();

        // General products section
        $products = Product::with('category')
            ->where('status', 1)
            ->latest()
            ->take(20)
            ->get();

        return view('frontend.index', compact(
            'categories',
            'bannerProducts',
            'deals',
            'topBanner',
            'topProducts',
            'lowerBanner',
            'lowerProducts',
            'products'
        ));
    }
}
