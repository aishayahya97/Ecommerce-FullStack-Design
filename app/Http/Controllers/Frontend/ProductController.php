<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Homepage
     */
    public function home()
    {
        $categories = Category::where('status', 1)->get();

        $products = Product::with(['images', 'category'])
            ->where('status', 1)
            ->latest()
            ->take(20)
            ->get();

        return view('frontend.home', compact('categories', 'products'));
    }

    /**
     * Product Listing Page
     */
    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $brands     = Brand::where('status', 1)->get();

        $features   = ['Metallic','Plastic Cover','8GB RAM','Super Power','Large Memory'];
        $conditions = ['Any','Refurbished','Brand New','Old Items'];
        $ratings    = [5,4,3,2,1];

        $productsQuery = Product::with(['category','images'])
            ->where('status', 1);

        /* 🔍 SEARCH (product name) */
        if ($request->filled('q')) {
            $productsQuery->where('name', 'like', '%' . $request->q . '%');
        }

        /* 📂 CATEGORY from sidebar checkbox (array) */
        if ($request->category) {
            $productsQuery->whereIn('category_id', (array) $request->category);
        }

        /* 📂 CATEGORY from search dropdown (single) */
        if ($request->filled('category_id')) {
            $productsQuery->where('category_id', $request->category_id);
        }

        /* 🏷 BRAND filter */
        if ($request->brand) {
            $productsQuery->whereIn('brand_id', (array) $request->brand);
        }

        $products = $productsQuery
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view(
            'frontend.product-listing-page',
            compact(
                'products',
                'categories',
                'brands',
                'features',
                'conditions',
                'ratings'
            )
        );
    }

    /**
     * Product Detail Page
     */
    public function show($slug)
    {
        $product = Product::with(['images', 'category', 'supplier'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Related Products (same category)
        $relatedProducts = Product::with('images')
            ->where('status', 1)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->get();

        // Fallback
        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::with('images')
                ->where('status', 1)
                ->where('id', '!=', $product->id)
                ->latest()
                ->take(6)
                ->get();
        }

        // You May Like
        $youMayLike = Product::with('images')
            ->where('status', 1)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        // Breadcrumb parent category
        $category  = $product->category;
        $parentCat = $category && $category->parent ? $category->parent : null;

        return view('frontend.product-detail', compact(
            'product',
            'relatedProducts',
            'youMayLike',
            'category',
            'parentCat'
        ));
    }
}
