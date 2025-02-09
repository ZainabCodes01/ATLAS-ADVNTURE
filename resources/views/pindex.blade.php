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
    <div class="row">
      <div class="col-md-6">
           <h6 class="text-danger">____POPULAR PARKS</h6>
           <h1>TOP NOTCH<br>PARKS</h1>
      </div>
      <div class="col-md-6 mt-5">
          <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
      </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">{{ $category->name }}</h2>

    @foreach($places as $place)
        <div class="row mb-5">
            <!-- Left Side: Place Details -->
            <div class="col-md-6">
                <h4>{{ $place->name }}</h4>
                <p>{{ $place->description }}</p>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Country:</strong> {{ $place->country->name }}</li>
                    <li class="list-group-item"><strong>Province:</strong> {{ $place->province->name }}</li>
                    <li class="list-group-item"><strong>City:</strong> {{ $place->city->name }}</li>
                    <li class="list-group-item"><strong>Town:</strong> {{ $place->town->name }}</li>
                    <li class="list-group-item"><strong>Location:</strong> {{ $place->location }}</li>
                    <li class="list-group-item"><strong>Latitude:</strong> {{ $place->lat }}</li>
                    <li class="list-group-item"><strong>Longitude:</strong> {{ $place->lng }}</li>
                    <li class="list-group-item">
                        <strong>External URL:</strong> <a href="{{ $place->external_url }}" target="_blank">{{ $place->external_url }}</a>
                    </li>
                </ul>
            </div>

            <!-- Right Side: Images -->
            <div class="col-md-6">
                <!-- Main Thumbnail -->
                <img src="{{ $place->thumbnail}}" class="img-fluid rounded shadow-lg"
                     alt="{{ $place->name }}" style="height: 300px; width: 100%; object-fit: cover;">

                <!-- Small Thumbnails -->
                <div class="d-flex flex-wrap mt-3">
                    @foreach($place->images as $placesc)
                        <img src="{{ asset($placesc->image_path) }}"
                             class="img-thumbnail m-1"
                             style="width: 80px; height: 80px; object-fit: cover;">
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    @if($places->isEmpty())
        <p class="text-center text-muted">No places found for this category.</p>
    @endif
</div>


@endsection
