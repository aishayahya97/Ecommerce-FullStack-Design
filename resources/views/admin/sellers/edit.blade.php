@extends('admin.backend_layout.master')
@section('page_title', 'Edit Seller')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Edit Seller</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sellers.update', $seller->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $seller->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $seller->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $seller->phone) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status', $seller->status) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !old('status', $seller->status) ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Seller</button>
        <a href="{{ route('admin.sellers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
