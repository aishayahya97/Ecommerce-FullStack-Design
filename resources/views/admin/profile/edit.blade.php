@extends('admin.backend_layout.master')

@section('page_title','Edit Profile')

@section('content')
<div class="card p-4 shadow-sm" style="max-width:600px;margin:auto;">
    <h4 class="mb-4">Edit Profile</h4>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- Laravel convention for update -->

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Profile Image -->
        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="user_img" class="form-control">
            @if($user->user_img)
                <img src="{{ asset('storage/'.$user->user_img) }}" width="80" class="mt-2 rounded">
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
@endsection
