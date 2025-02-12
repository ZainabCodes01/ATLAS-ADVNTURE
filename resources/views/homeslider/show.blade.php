@extends('app.master')

@section('content')


<div  class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
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
            <img id="thumbnail" src="{{ $place->thumbnail }}" class="img-fluid rounded shadow-lg"
                 alt="{{ $place->name }}" style="height: 300px; width: 100%; object-fit: cover;">

            <div class="d-flex flex-wrap mt-3">
                @foreach($place->images as $image)
                  <img src="{{ asset($image->image_path) }}" class="img-thumbnail m-1" style="width: 80px; height: 80px; object-fit: cover;">
                @endforeach
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
               $(document).ready(function () {
               $(".img-thumbnail").click(function () {
               var newSrc = $(this).attr("src"); // Get clicked image src
               $("#thumbnail").attr("src", newSrc); // Set large image src
               });
             });
            </script>
        </div>
    </div>
</div>

@endsection
