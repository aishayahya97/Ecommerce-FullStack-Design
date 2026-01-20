@extends('admin.backend_layout.master')
@section('page_title','View Payment')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">Payment #{{ $payment->id }}</h4>

    <div class="mb-3"><strong>Order ID:</strong> {{ $payment->order->id ?? 'N/A' }}</div>
    <div class="mb-3"><strong>User:</strong> {{ $payment->order->user->name ?? 'Guest' }}</div>
    <div class="mb-3"><strong>Method:</strong> {{ ucfirst($payment->payment_method) }}</div>
    <div class="mb-3"><strong>Status:</strong>
        @if($payment->payment_status == 'paid')
            <span class="badge bg-success">Paid</span>
        @else
            <span class="badge bg-danger">{{ ucfirst($payment->payment_status) }}</span>
        @endif
    </div>
    <div class="mb-3"><strong>Transaction ID:</strong> {{ $payment->transaction_id ?? '-' }}</div>
    <div class="mb-3"><strong>Paid At:</strong> {{ $payment->paid_at?->format('d-m-Y H:i') ?? '-' }}</div>

    <h5 class="mt-4">Order Items</h5>
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
            @foreach($payment->order->items as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Deleted' }}</td>
                <td>₹{{ number_format($item->price,2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->price*$item->quantity,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.payments') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
