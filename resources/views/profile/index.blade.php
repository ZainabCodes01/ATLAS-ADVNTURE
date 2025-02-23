<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">





<div class="card shadow-lg d-flex flex-row" style="width: 600px;">
    <div class="bg-danger text-white p-3 d-flex flex-column align-items-center">
        <a href="{{route('profile.index')}}" class="text-white mb-3">👤</a> <!-- Profile Icon -->
        <a href="{{ route('profile.edit') }}" class="text-white mb-3">✏️</a> <!-- Editing Icon -->
        <a href="{{route('profile.favorites')}}" class="text-white mb-3">⭐</a> <!-- Favorites Icon -->
        <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        🚪</a> <!-- Logout Icon -->

    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <div class="p-4 flex-fill">
        <h3>Profile</h3>
        <img width="100" height="100" src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}" alt="Profile Image" class="rounded-circle w-24 h-24 mx-auto">
        <p><strong>Username:</strong>{{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
</div>


{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card profile-card text-center shadow-lg border-0">
                <div class="card-header text-white py-3" style="background-color:#0C243C; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="mb-0 text-white">{{ $user->name }}</h5>
                </div>

                <!-- Profile Image -->
                <div class="profile-content py-4" style="background-color: #d7d8da">
                    <img src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('Default_Avatar.jpeg') }}" alt="Profile Image" class="rounded-circle w-24 h-24 mx-auto">
                    <h4 class="text-dark mt-3">{{ $user->name }}</h4>
                    <p class="text-dark mb-4">Email: {{ $user->email }}</p>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-success btn-sm">Edit Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm"
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
</div> --}}




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
</body>
</html>
