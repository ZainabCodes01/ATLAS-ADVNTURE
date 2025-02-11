@extends('app.master')

@section('content')

<div>
    <img src="Destination_Slider.jpg" alt="">
</div>

<div class="container mt-5">
    <h2 class="mb-4">{{ $place->name }}</h2>

    <div class="row">
        <!-- Left Side: Place Details -->
        <div class="col-md-6">
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
