@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $category->name }}</h1>
    <div class="row">
        @forelse ($category->places as $place)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $place->image }}" class="card-img-top" alt="{{ $place->name }}" style="height: 180px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $place->name }}</h5>
                        <a href="{{ route('places.show', $place->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No places found in this category.</p>
        @endforelse
    </div>
</div>
@endsection
