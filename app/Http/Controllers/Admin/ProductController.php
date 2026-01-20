<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /* =======================
       PRODUCTS LIST
    ========================*/
    public function index()
    {
        $products = Product::with(['category','brand','seller','images'])
            ->latest()
            ->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /* =======================
       CREATE FORM
    ========================*/
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::where('status',1)->get(),
            'brands'     => Brand::where('status',1)->get(),
            'sellers'    => Seller::where('status',1)->get(),
        ]);
    }

    /* =======================
       STORE PRODUCT
    ========================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'brand_id'        => 'required|exists:brands,id',
            'seller_id'       => 'required|exists:sellers,id',
            'price'           => 'required|numeric',
            'discount_price'  => 'nullable|numeric',
            'stock'           => 'required|integer',
            'status'          => 'required|boolean',
            'images.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::create([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'category_id'    => $request->category_id,
            'brand_id'       => $request->brand_id,
            'seller_id'      => $request->seller_id,
            'description'    => $request->description,
            'price'          => $request->price,
            'discount_price' => $request->discount_price ?? 0,
            'stock'          => $request->stock,
            'status'         => $request->status,
        ]);

        // Images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $path,
                    'is_main'    => $index === 0,
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success','Product added successfully');
    }

    /* =======================
       EDIT FORM
    ========================*/
    public function edit($id)
    {
        return view('admin.products.edit', [
            'product'    => Product::with('images')->findOrFail($id),
            'categories' => Category::where('status',1)->get(),
            'brands'     => Brand::where('status',1)->get(),
            'sellers'    => Seller::where('status',1)->get(),
        ]);
    }

    /* =======================
       UPDATE PRODUCT (FIXED)
    ========================*/
    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        $request->validate([
            'name'            => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'brand_id'        => 'required|exists:brands,id',
            'seller_id'       => 'required|exists:sellers,id',
            'price'           => 'required|numeric',
            'discount_price'  => 'nullable|numeric',
            'stock'           => 'required|integer',
            'status'          => 'required|boolean',
            'images.*'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product->update([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'category_id'    => $request->category_id,
            'brand_id'       => $request->brand_id,
            'seller_id'      => $request->seller_id,
            'description'    => $request->description,
            'price'          => $request->price,
            'discount_price' => $request->discount_price ?? 0,
            'stock'          => $request->stock,
            'status'         => $request->status,
        ]);

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products','public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $path,
                    'is_main'    => false,
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success','Product updated successfully');
    }

    /* =======================
       DELETE PRODUCT
    ========================*/
    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success','Product deleted successfully');
    }

    
}
