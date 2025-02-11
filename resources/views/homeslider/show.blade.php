@extends('app.master')

@section('content')


<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Destination_Slider.jpg"  class="d-block w-100" alt="Slide Image" style="height: 80vh; object-fit: cover;">
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-light mt-5">{{ $place->name }}</h2>
    <div class="row">
        <!-- Left Side: Place Details -->
        <div class="col-md-6">
            <p class="text-light">{{ $place->description }}</p>

            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong> {{ $place->country->name }}</li>
                <li class="list-group-item"><strong>Province:</strong> {{ $place->province->name }}</li>
                <li class="list-group-item"><strong>City:</strong> {{ $place->city->name }}</li>
                <li class="list-group-item"><strong>Town:</strong> {{ $place->town->name }}</li>
                <li class="list-group-item"><strong>Location:</strong> {{ $place->location }}</li>
                <li class="list-group-item"><strong>Latitude:</strong> {{ $place->lat }}</li>
                <li class="list-group-item"><strong>Longitude:</strong> {{ $place->lng }}</li>
                <li class="list-group-item">
                    <strong>External URL:</strong>
                    <a class="btn btn-primary" href="{{ $place->external_url }}" target="_blank">
                        {{ $place->external_url }}
                    </a>
                </li>
            </ul>

            <!-- Add to Gallery Button -->
            <div class="mt-3">
                <form action="{{ route('gallery.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                    <button type="submit" class="btn btn-primary">
                        📷 Add to Gallery
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side: Images -->
        <div class="col-md-6">
            <img src="{{ $place->thumbnail }}" class="img-fluid rounded shadow-lg"
                 alt="{{ $place->name }}" style="height: 300px; width: 100%; object-fit: cover;">

            <div class="d-flex flex-wrap mt-3">
                @foreach($place->images as $placesc)
                    <img src="{{ $placesc->image_path }}" class="img-thumbnail m-1"
                         style="width: 80px; height: 80px; object-fit: cover;">
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
