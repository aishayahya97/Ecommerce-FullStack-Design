@extends('admin.backend_layout.master')
@section('page_title', 'Brands')

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between mb-3">
        <h4>Brands</h4>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Add Brand</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    @if($brand->logo)
                        <img src="{{ asset('storage/'.$brand->logo) }}" width="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $brand->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $brands->links() }}
</div>
@endsection
