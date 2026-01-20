@extends('admin.backend_layout.master')
@section('page_title','Carts')

@section('content')
<div class="card p-4 shadow-sm">
    <h4 class="mb-4">All Carts</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->user->name ?? 'Guest' }}</td>
                <td>{{ $cart->items->count() }}</td>
                <td>₹{{ number_format($cart->items->sum(fn($i)=>$i->quantity*$i->price),2) }}</td>
                <td>
                    @if($cart->status) <span class="badge bg-success">Active</span>
                    @else <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.carts.show',$cart->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $carts->links() }}
</div>
@endsection
