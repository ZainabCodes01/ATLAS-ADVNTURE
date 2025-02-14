@extends('app.master')

@section('content')
<div class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
</div>
<div class="container mt-5">
    <h2>My Favorite Places</h2>
    <div class="row">
        @foreach($favorites as $favorite)
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <img src="{{ $favorite->place->thumbnail }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $favorite->place->name }}</h5>
                        <p class="card-text text-dark">{{ Str::limit($favorite->place->description, 20) }}</p>
                        <a href="{{ route('homeslider.show', $favorite->place->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
