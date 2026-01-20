@extends('admin.backend_layout.master')
@section('page_title','Products')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between mb-3">
        <h4>Products</h4>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Main Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Seller</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                @php $mainImage = $product->images->where('is_main', true)->first(); @endphp
                <td>
                    @if($mainImage)
                        <img src="{{ asset('storage/'.$mainImage->image) }}" width="50" class="rounded">
                    @else N/A @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>{{ $product->brand->name ?? 'N/A' }}</td>
                <td>{{ $product->seller->name ?? 'N/A' }}</td>
                <td>₹{{ number_format($product->price,2) }}</td>
                <td>₹{{ number_format($product->discount_price ?? 0,2) }}</td>
                <td>₹{{ number_format($product->price - ($product->discount_price ?? 0),2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if($product->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection
