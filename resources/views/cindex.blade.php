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

            <div class="container mt-7">
                <h1 class="text-center">The Wonders of Nature</h1>
                <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <!-- Image Section -->
                                <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->name }}" style="height: 180px; object-fit: cover;">
                                <!-- Text Section -->
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">Explore the beauty of this category.</p>
                                    <a href="{{ route('placeuser', ['category_id' => $category->id]) }}" class="btn btn-primary">Discover More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
       

</body>
</html>


@endsection
