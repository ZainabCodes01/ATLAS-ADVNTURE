@extends('app.master')

@section('content')

<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Destination_Slider.jpg"  class="d-block w-100" alt="Slide Image" style="height: 80vh; object-fit: cover;">
        </div>
    </div>
</div>
<div class="container">
    <h2 class="mb-4">{{ $category->name }}</h2>
    <div class="row">
        @foreach($places as $place)
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-lg">
                    <img src="{{ $place->thumbnail }}" class="card-img-top img-fluid" alt="{{ $place->name }}" style="height: 200px; object-fit: cover;">
                    <div class="p-2 bg-dark text-white text-center">
                        <h6>{{ $place->name }}</h6>
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
