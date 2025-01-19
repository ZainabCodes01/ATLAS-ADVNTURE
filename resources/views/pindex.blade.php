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
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">
            <div class="container mt-7">
                <h1 class=" text-center ">The Wonders of Nature</h1>
                <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
                <div class="row">
                    @foreach($places as $placesc)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <!-- Make the image and card title clickable -->
                                <a href="{{ route('placeimage.show', $placesc->id) }}" style="text-decoration: none; color: inherit;">
                                    <img src="{{ $placesc->thumbnail }}" class="card-img-top" alt="{{ $placesc->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $placesc->name }}</h5>
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
