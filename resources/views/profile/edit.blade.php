@extends('app.master')

@section('content')

<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>

<div class="container mt-5" >
    <div class="card p-4 shadow-lg text-white" style="background: url('{{ asset('Edit.png') }}') center/cover no-repeat;">
        <h2 class="mb-4 text-center">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="text-center mb-3">
                <img src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}"
                     class="rounded-circle border border-primary img-fluid"
                     style="width: 120px; height: 120px; object-fit: cover;"
                     alt="Profile Image">
            </div>

            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Image:</label>
                <input type="file" name="profile_image" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">New Password:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success w-100">Update Profile</button>
            </div>
        </form>
    </div>

</div>


@endsection
