@extends('admin.backend_layout.master')

@section('page_title', 'Add Product')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">Add Product</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>

        <div class="mb-3"><label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3"><label class="form-label">Brand</label>
            <select name="brand_id" class="form-select" required>
                <option value="">-- Select Brand --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id')==$brand->id?'selected':'' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3"><label class="form-label">Seller</label>
            <select name="seller_id" class="form-select" required>
                <option value="">-- Select Seller --</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}" {{ old('seller_id')==$seller->id?'selected':'' }}>
                        {{ $seller->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="col"><label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required></div>
            <div class="col"><label class="form-label">Discount Price</label>
                <input type="number" name="discount_price" class="form-control" value="{{ old('discount_price') }}" step="0.01"></div>
        </div>

        <div class="mb-3"><label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required></div>

        <div class="mb-3"><label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
                <option value="0" {{ old('status')==0?'selected':'' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3"><label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea></div>

        <div class="mb-3"><label class="form-label">Product Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <small class="text-muted">Upload multiple images. First image will be main by default.</small></div>

        <button type="submit" class="btn btn-success">Add Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
