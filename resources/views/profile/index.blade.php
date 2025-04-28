@extends('app.master')

@section('content')

<!-- Hero / Cover Section -->
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 40vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
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
                    <a href="{{ route('profile.edit') }}" style="background-color: #0C243C" class="text-light btn btn-sm w-100 mb-2">Edit Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm w-100">Logout</a>
                </div>
            </div>
        </div>

        <!-- Profile Form and Tabs -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-3" id="profileTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-tab" data-bs-toggle="tab" href="#account">Account Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="favorites-tab" data-bs-toggle="tab" href="#favorites">Favorites</a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Account Settings -->
                        <div class="tab-pane fade show active" id="account">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label"> Name</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Favorites Section -->
                        <div class="tab-pane fade" id="favorites">
                            <div class="row mt-3">
                                @if($favorites->isNotEmpty())
                                    @foreach($favorites as $favorite)
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100 d-flex flex-row">
                                                <img src="{{ asset($favorite->place->thumbnail) }}" class="img-fluid rounded-start" style="width: 100px; height: 100px; object-fit: cover;">
                                                <div class="card-body p-2">
                                                    <h6 class="card-title mb-1">{{ $favorite->place->name }}</h6>
                                                    <p class="card-text small text-muted">{{ Str::limit($favorite->place->description, 50) }}</p>
                                                    <a href="{{ route('homeslider.show', $favorite->place_id) }}" class="btn btn-sm btn-primary">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No favorite places found.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Extra Space Before Footer -->
<div class="mb-5"></div>

@endsection