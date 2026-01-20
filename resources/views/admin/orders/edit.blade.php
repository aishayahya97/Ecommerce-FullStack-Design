@extends('admin.backend_layout.master')
@section('page_title','Edit Order')

@section('content')
<div class="card p-4 shadow-sm" style="max-width:600px;margin:auto;">
<h4>Edit Order #{{ $order->id }}</h4>

<form method="POST" action="{{ route('admin.orders.update',$order->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-select">
<option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>
<option value="processing" {{ $order->status=='processing'?'selected':'' }}>Processing</option>
<option value="completed" {{ $order->status=='completed'?'selected':'' }}>Completed</option>
<option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>
</select>
</div>

<button class="btn btn-success">Update</button>
<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary ms-2">Back</a>
</form>
</div>
@endsection
