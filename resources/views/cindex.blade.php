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

<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
           <h6 class="text-danger">____POPULAR CATEGORIES</h6>
           <h1>TOP NOTCH<br> CATEGORY</h1>
      </div>
      <div class="col-md-6 mt-5">
          <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
      </div>
    </div>
</div>

    <div class="row mt-5 ms-5 me-5 g-4">
        @foreach($categories as $category)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                        <div class="card border-white rounded-lg shadow-lg position-relative overflow-hidden category-btn"
                             data-id="{{ $category->id }}">
                            <!-- Image Section -->
                            <img src="{{ $category->image }}" class="card-img-top img-fluid" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">

                            <!-- Category Name Badge -->
                            <div class="position-absolute top-0 start-0 text-white px-3 py-1 fw-bold" style="background-color: rgba(23, 23, 24, 0.6);" >
                                {{ $category->name }}
                            </div>

                            <!-- Text Section -->
                            <div class="text-center p-3" style="background-color: rgba(233, 233, 236, 0.6);">

                                <p class="mb-1" style="color:#0C243C" >
                                    {{ Str::limit($category->description, 15, '...') }}
                                </p>

                                <a href="{{ url('/pindex/' . $category->id) }}" class="btn text-decoration-none" style="background-color: #0C243C; color:#C9D1D5">MORE DESTINATIONS</a>
                            </div>
                        </div>


                </div>
            </div>
        @endforeach
    </div>


@endsection
