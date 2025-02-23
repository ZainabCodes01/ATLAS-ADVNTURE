@extends('app.master')

@section('content')

<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>
 <h6 class="text-center text-danger mt-5">___EXPLORE COUNTRY CUSINES</h6>
<h2 class="text-center">TRADITIONAL FOOD POINTS</h2>

<div class="row ms-5 me-5">
        @foreach($foods as $place)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <img src="{{ $place->thumbnail }}" class="card-img-top" alt="{{ $place->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $place->name }}</h5>
                    <a href="{{ route('foods.show', $place->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

