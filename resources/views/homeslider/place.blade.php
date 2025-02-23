@extends('app.master')

@section('content')


<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center text-light fw-bold">{{ optional($country)->name ?? 'Search Results' }} - Places</h2>

    <div class="row">
        @foreach($country->places as $place)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <img src="{{ $place->thumbnail }}" class="card-img-top" alt="{{ $place->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $place->name }}</h5>
                    <a href="{{ route('homeslider.show', $place->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if(isset($country) && $country->places)
    <div class="row">
        @foreach($country->places as $place)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="{{ $place->thumbnail }}" class="card-img-top" alt="{{ $place->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark">{{ $place->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <h3 class="text-center text-danger">No places found!</h3>
@endif

</div>
@endsection
