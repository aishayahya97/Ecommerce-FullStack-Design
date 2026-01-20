@extends('admin.backend_layout.master')
@section('page_title','Add Coupon')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">Add Coupon</h4>

    @if($errors->any())
    <div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Type</label>
            <select name="discount_type" class="form-select" required>
                <option value="">-- Select Type --</option>
                <option value="fixed" {{ old('discount_type')=='fixed'?'selected':'' }}>Fixed</option>
                <option value="percent" {{ old('discount_type')=='percent'?'selected':'' }}>Percent</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Value</label>
            <input type="number" name="discount_value" class="form-control" value="{{ old('discount_value') }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Minimum Cart Amount</label>
            <input type="number" name="min_cart_amount" class="form-control" value="{{ old('min_cart_amount') }}" step="0.01">
        </div>

        <div class="mb-3">
            <label class="form-label">Expiry Date</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" {{ old('status')==1?'selected':'' }}>Active</option>
                <option value="0" {{ old('status')==0?'selected':'' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Coupon</button>
        <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
