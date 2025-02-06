@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Places</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">{{ $category->name }} - Places</h2>
    <div class="row">
        @foreach($category->places as $place)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/' . $place->image) }}" class="card-img-top" alt="{{ $place->name }}">
                <div class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 fw-bold">
                    {{ $place->name }}
                </div>
                <div class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-75 text-white text-center p-2">
                    <p class="mb-0 text-warning">
                        {{ str_repeat('★', $place->rating) }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
