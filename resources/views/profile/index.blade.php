@extends('app.master')
@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Welcome to Your Adventure!</h1>
        <p>Your journey starts here—explore, save, and share your favorite places!</p>

    </div>
</div>
 <style>
    .profile-header {
        background-color:#0C243C ;
        padding: 30px;
        border-radius: 15px;
        color: white;
        text-align: center;
    }
    .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid white;
    }
    .profile-container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container mt-5">
    <div class="profile-container" style="background-color: #d7d8da" >
        <div class="profile-header" >

            <img width="100" height="100" src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}" alt="Profile Image" class="rounded-circle w-24 h-24 mx-auto">
            <p>{{ $user->name }}</p>
            <a href="{{route('profile.edit')}}" class="btn" style="background-color: #d7d8da; color:#0C243C">Edit Profile</a>
            <a href="{{route('logout')}}" class="btn btn-outline-light">Logout</a>
        </div>
        <ul class="nav nav-tabs mt-3" id="profileTabs">
            <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="favorites-tab" data-bs-toggle="tab" href="#favorites">Favorites</a>
                <!-- Removed route and added #favorites -->
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="about">
                <p><strong>Username : </strong>{{ $user->name }}</p>
                <p><strong>Email : </strong> {{ $user->email }}</p>
            </div>
            <div class="tab-pane fade" id="favorites">
                <div id="favoritesContainer">
                    @if($favorites->isNotEmpty()) <!-- Check if there are favorites -->
                        <div class="row">
                            @foreach($favorites as $favorite)
                                <div class="col-md-4 mb-3">
                                    <div class="card d-flex flex-row align-items-center" style="width: 320px; height: 100px;">
                                        <img src="{{ asset($favorite->place->thumbnail) }}" class="card-img-left" alt="Favorite Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px 0 0 5px;">
                                        <div class="card-body p-2 d-flex flex-column justify-content-center">
                                            <h6 class="card-title text-dark m-0">{{ $favorite->place->name }}</h6>
                                            <p class="card-text small text-muted m-0">{{ Str::limit($favorite->place->description, 30) }}</p>
                                            <a href="{{ route('homeslider.show', $favorite->place_id) }}" class="btn btn-sm btn-primary mt-1">View</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Oops! No favorite photos yet.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection




