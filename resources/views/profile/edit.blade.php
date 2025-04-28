@extends('app.master')

@section('content')

<!-- Hero / Cover Section -->
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 40vh;">
    <div class="overlay" style="width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4 mt-3">Welcome, {{ $user->name }}!</h1>
        <p>Manage your profile and favorites here.</p>
    </div>
</div>

<!-- Profile Section -->
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <img src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}" class="rounded-circle mb-3" width="100" height="100" alt="Profile">
                    <h5 class="mb-2">{{ $user->name }}</h5>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm w-100">Logout</a>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Edit Profile</h4>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <!-- 🔥 FIXED: File Upload Field inside Form -->
                        <div class="mb-3">
                            <label class="form-label">Change Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" style="background-color: #0C243C" class="btn text-light px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Space before footer -->
<div class="mb-5"></div>

@endsection
