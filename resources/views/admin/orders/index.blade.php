@extends('admin.backend_layout.master')
@section('page_title','Orders')

@section('content')
<div class="card p-4 shadow-sm">
<h4 class="mb-3">Orders</h4>

<table class="table table-bordered align-middle">
<thead>
<tr>
    <th>#</th>
    <th>Customer</th>
    <th>Total</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($orders as $order)
<tr>
    <td>#{{ $order->id }}</td>
    <td>{{ $order->user->name ?? 'Guest' }}</td>
    <td>Rs {{ number_format($order->total,2) }}</td>
    <td>
        <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
    </td>
    <td>
        <a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-sm btn-primary">View</a>
        <a href="{{ route('admin.orders.edit',$order->id) }}" class="btn btn-sm btn-warning">Edit</a>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $orders->links() }}
</div>
@endsection
