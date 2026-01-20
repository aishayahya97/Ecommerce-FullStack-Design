@extends('admin.backend_layout.master')
@section('page_title', 'Sellers')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between mb-3">
        <h4>Sellers</h4>
        <a href="{{ route('admin.sellers.create') }}" class="btn btn-primary">Add Seller</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller->id }}</td>
                <td>{{ $seller->name }}</td>
                <td>{{ $seller->email ?? 'N/A' }}</td>
                <td>{{ $seller->phone ?? 'N/A' }}</td>
                <td>{{ $seller->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.sellers.edit', $seller->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.sellers.destroy', $seller->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sellers->links() }}
</div>
@endsection
