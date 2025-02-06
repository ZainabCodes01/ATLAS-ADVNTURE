@extends('app.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>

    <div class="container mt-7">
        <h1 class="text-center">The Wonders of Nature</h1>
        <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 ">
                    <div class="card border-0 position-relative">
                        <!-- Image Section -->
                        <img src="{{ $category->image }}" class="card-img-top img-fluid" alt="{{ $category->name }}">
                        <div class="position-absolute  top-0 start-0 bg-dark text-white px-3 py-1 fw-bold" >{{ $category->name }}</div>
                        <!-- Text Section -->
                        <div class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-75 text-white text-center p-2">
                            <h6 class="mb-0 text-light">Explore the beauty</h6>
                            <p class="mb-0">
                                <span style="color: lightyellow;">★★★★</span><span style="color: gray;">★</span>
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</body>
</html>


@endsection
