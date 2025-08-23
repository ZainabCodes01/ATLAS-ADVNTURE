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
           <h1 class=" mt-5 text-center text-uppercase">Discover the best places for adventure</h1>
          <p class="text-center">Every place has a story to tell, from bustling cities to serene landscapes. Whether you're exploring historic landmarks, indulging in local cuisine, or immersing yourself in nature’s wonders, each destination offers a unique experience.</p>
</div>

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach($places as $place)
            <!-- Left Side: Place Details -->
            <div class="col">
                <div class="card shadow-sm mb-4">
                    <img src="{{ $place->thumbnail }}" class="card-img-top" alt="{{ $place->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark">{{ $place->name }}</h5>
                        <a href="{{ route('homeslider.show', $place->id) }}" class="btn text-light" style="background-color:#0C243C;">View Details</a>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($places->isEmpty())
        <p class="text-center text-muted">No places found for this category.</p>
    @endif
</div>


@endsection
