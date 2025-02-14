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
           <h6 class="text-danger mt-5">____POPULAR PARKS</h6>
           <h1>Top Notch places<br></h1>
      </div>
      <div class="col-md-6 mt-5">
          <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
      </div>
    </div>
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
                        <a href="{{ route('homeslider.show', $place->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Right Side: Images -->
            {{-- <div class="col-md-6">
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
            </div> --}}
        @endforeach
    </div>

    @if($places->isEmpty())
        <p class="text-center text-muted">No places found for this category.</p>
    @endif
</div>


@endsection
