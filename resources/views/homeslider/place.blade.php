@extends('app.master')

@section('content')


<div  class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
</div>

<div class="container my-5">
    <h2 class="text-center text-dark fw-bold">{{ $country->name }} - Places</h2>
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
</div>
@endsection
