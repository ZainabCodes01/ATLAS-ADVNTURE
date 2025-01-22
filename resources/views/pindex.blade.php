@extends('app.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 500px;">
            <div class="container mt-7">
                <h1 class="text-center">The Wonders of Nature</h1>
                <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 mb-4">
                            <div class="card d-flex flex-row">
                                <!-- Make the image and card title clickable -->
                                <a href="{{ route('places.index', ['category_id' => $category->id]) }}" class="d-flex text-decoration-none text-dark">
                                    <img src="{{ $category->image }}" class="card-img-left" alt="{{ $category->name }}" style="width: 150px; height: 100%; object-fit: cover; border-radius: 8px;">
                                    <div class="card-body d-flex flex-column justify-content-between" style="flex: 1; padding-left: 15px;">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                        <p class="card-text">Explore the beauty of this category.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</body>
</html>


@endsection
