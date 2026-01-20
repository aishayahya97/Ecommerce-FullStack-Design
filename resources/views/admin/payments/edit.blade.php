@extends('admin.backend_layout.master')
@section('page_title','Edit Payment')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">Edit Payment</h4>

    @if($errors->any())
    <div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Order</label>
            <select name="order_id" class="form-select" required>
                <option value="">-- Select Order --</option>
                @foreach($orders as $order)
                <option value="{{ $order->id }}" {{ $payment->order_id==$order->id?'selected':'' }}>Order #{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Status</label>
            <input type="text" name="payment_status" class="form-control" value="{{ $payment->payment_status }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Transaction ID</label>
            <input type="text" name="transaction_id" class="form-control" value="{{ $payment->transaction_id }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Paid At</label>
            <input type="date" name="paid_at" class="form-control" value="{{ $payment->paid_at ? $payment->paid_at->format('Y-m-d') : '' }}">
        </div>

        <button type="submit" class="btn btn-success">Update Payment</button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
