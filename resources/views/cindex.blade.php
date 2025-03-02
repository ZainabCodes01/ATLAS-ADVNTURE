@extends('app.master')

@section('content')


<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>

<div class="container my-5">
    <h6 class="text-danger mt-5 text-center">____EXPLORE COUNTRIES</h6>
    <h1 class="text-center">TOP NOTCH DESTINATIONS</h1>
    <p class="text-center">Countries offer unique cultures, landscapes, and histories, providing diverse experiences for travelers.</p>

    <div class="row justify-content-center mt-4">
        @foreach($countries as $country)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-lg border-0 text-center" style="border-radius: 15px; overflow: hidden;">
                <!-- Country Image -->
                <a href="{{ route('places.show', $country->id) }}" class="text-decoration-none">
                    <img src="{{ $country->image }}" alt="{{ $country->name }}" class="card-img-top"
                         style="height: 250px; object-fit: cover;">
                </a>
                <div class="card-body">
                    <!-- Country Name -->
                    <h5 class="fw-bold text-dark">{{ $country->name }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
           <h6 class="text-danger">____POPULAR CATEGORIES</h6>
           <h1>TOP NOTCH<br> CATEGORY</h1>
      </div>
      <div class="col-md-6 mt-5">
          <p>Categories in Atlas Adventure help travelers explore different types of destinations based on their interests. Each category represents a unique travel experience, making it easier for users to discover places that match their preferences.

          </p>
      </div>
    </div>
</div>

<div class="row mt-3 mx-5 g-4">
    @foreach($categories as $category)
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-lg border-0 rounded-lg overflow-hidden">
                <!-- Image Section -->
                <a href="{{ url('/pindex/' . $category->id) }}" class="text-decoration-none">
                    <img src="{{ $category->image }}" class="card-img-top img-fluid" alt="{{ $category->name }}"
                         style="height: 220px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                </a>

                <!-- Category Name Badge -->
                <div class="position-absolute top-0 start-0 text-white px-3 py-1 fw-bold"
                     style="background-color: rgba(23, 23, 24, 0.7); border-bottom-right-radius: 10px;">
                    {{ $category->name }}
                </div>

                <!-- Card Body -->
                <div class="card-body text-center" style="background-color: #F8F9FA;">
                    <p class="mb-2 text-dark">
                        {{ Str::limit($category->description, 20, '...') }}
                    </p>
                    <a href="{{ url('/pindex/' . $category->id) }}" class="btn btn-primary fw-bold"
                       style="background-color: #0C243C; border: none;">More Destinations</a>
                </div>
            </div>
        </div>
    @endforeach
</div>



@endsection
