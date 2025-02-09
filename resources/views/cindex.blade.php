@php
    use App\Models\Categories;
    $categories = Categories::all();
@endphp

@extends('app.master')

@section('content')


<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Destination_Slider.jpg"  class="d-block w-100" alt="Slide Image" style="height: 80vh; object-fit: cover;">
        </div>
    </div>
</div>

    <div class="row mt-5 ms-3 me-3">
        @foreach($categories as $category)
            <div class="col-md-3 mb-4">
                <a href="{{ url('/pindex/' . $category->id) }}" class="text-decoration-none">
                    <div class="card border-white rounded-lg shadow-lg position-relative overflow-hidden category-btn"
                         data-id="{{ $category->id }}">
                        <!-- Image Section -->
                        <img src="{{ $category->image }}" class="card-img-top img-fluid" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">

                        <!-- Category Name Badge -->
                        <div class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 fw-bold">
                            {{ $category->name }}
                        </div>

                        <!-- Text Section -->
                        <div class="text-center p-3" style="background-color: rgba(23, 23, 24, 0.85);">
                            <h6 class="mb-1 text-light">Explore the beauty</h6>
                            <p class="mb-0">
                                <span style="color: lightyellow;">★★★★</span><span style="color: gray;">★</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


@endsection
