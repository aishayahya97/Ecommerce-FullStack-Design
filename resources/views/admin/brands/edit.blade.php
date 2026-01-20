@extends('admin.backend_layout.master')
@section('page_title', 'Edit Brand')

@section('content')
<div class="card shadow-sm p-4">
    <h4 class="mb-4">Edit Brand</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Brand Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $brand->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control">
            @if($brand->logo)
                <img src="{{ asset('storage/'.$brand->logo) }}" width="80" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ old('status', $brand->status) ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !old('status', $brand->status) ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Brand</button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
