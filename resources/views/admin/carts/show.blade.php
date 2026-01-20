@extends('admin.backend_layout.master')
@section('page_title','View Cart')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">Cart #{{ $cart->id }} - {{ $cart->user->name ?? 'Guest' }}</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.carts.update', $cart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Deleted' }}</td>
                    <td>₹{{ number_format($item->price,2) }}</td>
                    <td>
                        <input type="number" name="items[{{ $item->id }}][quantity]" value="{{ $item->quantity }}" min="1" class="form-control" style="width:80px;">
                    </td>
                    <td>₹{{ number_format($item->price*$item->quantity,2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" style="width:200px;">
                <option value="1" {{ $cart->status?'selected':'' }}>Active</option>
                <option value="0" {{ !$cart->status?'selected':'' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Cart</button>
        <a href="{{ route('admin.carts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
