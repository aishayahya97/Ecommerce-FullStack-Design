@extends('admin.backend_layout.master')
@section('page_title','Edit Product')

@section('content')
<div class="card p-4 shadow-sm" style="max-width:1000px;margin:auto;">
    <h4 class="mb-4">Edit Product</h4>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- MAIN FORM (ONLY ONE FORM) --}}
    <form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name',$product->name) }}" required>
        </div>

        {{-- Category & Brand --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id',$product->category_id)==$category->id?'selected':'' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Brand</label>
                <select name="brand_id" class="form-select" required>
                    <option value="">-- Select Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id',$product->brand_id)==$brand->id?'selected':'' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Seller --}}
        <div class="mb-3">
            <label class="form-label">Seller</label>
            <select name="seller_id" class="form-select" required>
                <option value="">-- Select Seller --</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}"
                        {{ old('seller_id',$product->seller_id)==$seller->id?'selected':'' }}>
                        {{ $seller->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price & Discount --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control"
                       value="{{ old('price',$product->price) }}" step="0.01" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Discount Price</label>
                <input type="number" name="discount_price" class="form-control"
                       value="{{ old('discount_price',$product->discount_price) }}" step="0.01">
            </div>
        </div>

        {{-- Stock --}}
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control"
                   value="{{ old('stock',$product->stock) }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status',$product->status)==1?'selected':'' }}>Active</option>
                <option value="0" {{ old('status',$product->status)==0?'selected':'' }}>Inactive</option>
            </select>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description',$product->description) }}</textarea>
        </div>

        {{-- Existing Images --}}
{{-- Existing Images --}}
<div class="mb-3">
    <label class="form-label">Existing Images</label>
    <div class="d-flex gap-2 flex-wrap">
        @foreach($product->images as $image)
            <img src="{{ asset('storage/'.$image->image) }}" width="80" class="rounded border">
        @endforeach
    </div>
</div>



        {{-- Add New Images --}}
        <div class="mb-3">
            <label class="form-label">Add New Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        {{-- Buttons --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-success px-4">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
