@extends('app.master')

@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
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
