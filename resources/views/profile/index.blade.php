@extends('app.master')

@section('content')


<div  class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
</div>

<style>
    .profile-card {
        background: url('your-image-path.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .profile-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Dull shade with transparency */
    }

    .profile-content {
        position: relative;
        z-index: 1;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
        padding: 5px 15px;
        font-size: 14px;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card profile-card text-center shadow-lg border-0">
                <div class="card-header text-white py-3" style="background-color:#0C243C; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="mb-0 text-white">{{ $user->name }}</h5>
                </div>

                <!-- Profile Image -->
                <div class="profile-content py-4" style="background-color: #d7d8da">
                    <img src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}"
                        alt="Profile Image"
                        class="profile-image">
                    <h4 class="text-dark mt-3">{{ $user->name }}</h4>
                    <p class="text-dark mb-4">Email: {{ $user->email }}</p>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-success btn-sm btn-custom">Edit Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-custom"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- - @if($galleries->count() > 0)
    <h4>My Gallery</h4>
    <ul class="list-group">
        @foreach($galleries as $gallery)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $gallery->place->name }}

                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Remove ❌</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No places in gallery yet.</p>
@endif -- --}}
