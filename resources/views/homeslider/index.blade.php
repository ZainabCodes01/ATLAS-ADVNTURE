@extends('app.master')

@section('content')

    <div id="carouselExample" class="carousel slide mt-55px" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ( $sliders as $key => $slider)
            <div class="carousel-item {{$key == 0 ? 'active':''}}">
                @if ($slider->image)
                <img src="{{asset("$slider->image")}}" class="d-block w-100" alt="Slide 1" style="height: 80vh; object-fit: cover;">
                @endif
                <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                  <h1>{{$slider->title}}</h1>
                   <p>{{$slider->description}}</p>
                </div>
              </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section>
        <div class="container">
            <div class="card shadow border-0" style="max-width: 700px; margin: 0 auto;">
                <div class="card-body">
                    <form method="GET" action="{{ route('placeuser') }}">

                        <div class="row g-5 align-items-end">

                            <!-- Search by Destinations -->
                            <div class="col-md-4">
                                <label for="place_id" class="form-label text-dark">Search by Destinations*</label>


                                <input type="text" id="place" name="place">

                            </div>

                            <!-- Search by Categories -->
                            <div class="col-md-4">
                                <label for="category_id" class="form-label text-dark"></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Search Button -->
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-danger px-4">Search Now</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <div class="container mt-5">
        <h6 class="text-danger mt-5 text-center">____EXPLORE PLACES</h6>
        <h1 class="text-center">TOP NOTCH PLACES</h1>

        <div class="row g-4 mt-5">
            @foreach($places as $place)
                <div class="col-md-3">
                    <div class="card mb-4 shadow position-relative">
                        <!-- Heart Icon Positioned Over Image -->
                        <span class="like position-absolute top-0 end-0 m-2 p-2 "
                            data-place="{{ $place->id }}"
                            onclick="{{ Auth::check() ? 'togglelike(this, ' . $place->id . ')' : 'showLoginAlert()' }}"
                            style="font-size: 20px; color: {{ Auth::check() && Auth::user()->favorites->where('place_id', $place->id)->count() ? 'red' : '#d3d3d3' }}; cursor: pointer;">
                            <i class="fa-regular fa-heart"></i>
                        </span>

                        <!-- Place Image -->
                        <img src="{{ $place->thumbnail }}" class="card-img-top" style="height: 200px; object-fit: cover;">

                        <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $place->name }}</h5>
                            <p class="card-text text-dark">{{ Str::limit($place->description, 20) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('homeslider.show', $place->id) }}" class="btn btn-primary">View Details</a>
                                @if($place->ratings->count() > 0)
                                    <span class="text-muted">⭐ {{ $place->ratings->count() }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        @if($places->isEmpty())
            <p class="text-center text-muted">No places found.</p>
        @endif
    </div>
    <!-- Login Alert Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="loginModalLabel">Login Required</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
          You need to log in to add places to favorites.
        </div>
        <div class="modal-footer">
          <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

    <!-- AJAX Function for Like/Unlike -->
<script>
function showLoginAlert() {
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
}


    function togglelike(element, placeId) {
        fetch('/toggle-favorite', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ place_id: placeId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'added') {
                element.style.color = 'red';
            } else {
                element.style.color = '#d3d3d3';
            }
        });
    }
</script>




    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-5">
                <h6 class="text-danger">____OUR TOUR GALLERY</h6>
                <h1 class="mt-3">BEST<br>TRAVELLERS<br>SHARED<br>PHOTOS</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae quidem vero, adipisci animi ex.</p>
                <img width="300" height="200" src="G4.jpg" alt="">
            </div>
            <div class="col-md-8 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <img src="G1.jpg" alt="Image 1" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <img src="G2.jpg" alt="Image 2" class="img-fluid">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <img src="G3.jpg" alt="Image 3" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
               <h6 class="text-danger">____POPULAR COUNTRIES</h6>
               <h1>TOP NOTCH<br> COUNTRIES</h1>
          </div>
          <div class="col-md-6 mt-5">
              <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
          </div>
        </div>
        <div class="container my-5">
           <div class="row justify-content-center mt-4">
                @foreach($countries as $country)
                <div class="col-md-3 col-sm-6">
                    <a href="{{ route('places.show', $country->id) }}" class="text-decoration-none">
                        <div class="card shadow-sm border-0">
                            <img src="{{ $country->image }}" class="card-img-top rounded-top" alt="{{ $country->name }}" style="height: 180px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-dark">{{ $country->name }}</h5>
                                <img width="25%" height="15%" src="{{$country->flag}}" alt="">
                                <p class="card-text text-muted">{{ $country->places_count }} Places</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>


  </div>


<div class="container mt-5 my-5 ">
    <h6 class="text-danger text-center">____FROM OUR BLOG</h6>
    <h1 class="text-center">OUR RECENT POSTS</h1>
    <p class="text-center">Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit,<br> blandit torquent, odit placeat. Adipiscing repudiandae eius<br> cursus? Nostrum magnis maxime curae placeat.</p>
    <div class="container mt-4">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="Blog1.jpg" class="card-img-top" alt="Travel Image">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Life is a beautiful journey, not a destination</h5>
                        <p class="text-muted">Demoteam | August 17, 2021 | No Comments</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="Blog2.jpg" class="card-img-top" alt="Travel Image">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Take only memories, leave only footprints</h5>
                        <p class="text-muted">Demoteam | August 17, 2021 | No Comments</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="Blog3.jpg" class="card-img-top" alt="Travel Image">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Journeys are best measured in new friends</h5>
                        <p class="text-muted">Demoteam | August 17, 2021 | No Comments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


