@extends('app.master')

@section('content')
<div class="container">
    <h2>My Profile</h2>

    <div class="card p-3">
        <!-- Profile Image -->
        <img src="{{ $user->profile_image ? asset('profile_images/'.$user->profile_image) : asset('default-avatar.png') }}"
             alt="Profile Image" class="rounded-circle img-thumbnail shadow" width="120">

        <h3>{{ $user->name }}</h3>
        <p>Email: {{ $user->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    @if($galleries->count() > 0)
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
@endif

</div>
@endsection
