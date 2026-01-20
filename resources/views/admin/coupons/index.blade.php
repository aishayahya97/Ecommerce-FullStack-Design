@extends('admin.backend_layout.master')
@section('page_title','Coupons')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between mb-3">
        <h4>Coupons</h4>
        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">Add Coupon</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Min Cart</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ ucfirst($coupon->discount_type) }}</td>
                <td>{{ $coupon->discount_value }}</td>
                <td>{{ $coupon->min_cart_amount ?? 'N/A' }}</td>
                <td>{{ $coupon->expiry_date ?? 'N/A' }}</td>
                <td>
                    @if($coupon->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.coupons.edit',$coupon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.coupons.destroy',$coupon->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $coupons->links() }}
</div>
@endsection
