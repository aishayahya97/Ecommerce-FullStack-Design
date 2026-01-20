@extends('admin.backend_layout.master')
@section('page_title','Order Details')

@section('content')
<div class="card p-4 shadow-sm">
<h4>Order #{{ $order->id }}</h4>

<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
<p><strong>Total:</strong> Rs {{ number_format($order->total,2) }}</p>

<hr>

<h5>Products</h5>
<table class="table table-bordered">
<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
</tr>

@foreach($order->items as $item)
<tr>
<td>{{ $item->product->name }}</td>
<td>{{ $item->quantity }}</td>
<td>{{ $item->price }}</td>
</tr>
@endforeach
</table>

<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
