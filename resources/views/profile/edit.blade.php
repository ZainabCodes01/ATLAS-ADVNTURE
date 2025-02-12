@extends('app.master')

@section('content')


<div  class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
</div>

<div class="container mt-5">
    <h2>Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Profile Image:</label>
            <input type="file" name="profile_image" class="form-control">
            @if($user->profile_image)
                <img src="{{ asset('storage/profile_images/'.$user->profile_image) }}"  class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>New Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
@endsection
