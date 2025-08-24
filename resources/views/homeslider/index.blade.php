@extends('app.master')

@section('content')
<div class="hero-section position-relative d-flex align-items-center text-white text-center"
     id="heroSection"
     style="height: 85vh; background: url('{{ $sliders->first()->image ?? 'default.jpg' }}') center/cover no-repeat; transition: background 0.5s ease-in-out;">

    <div class="position-absolute top-50 start-50 translate-middle text-center w-75">
        <h1 class="fw-bold display-4">{{ $sliders->first()->title ?? 'Default Title' }}</h1>
        <p class="fs-5">{{ $sliders->first()->description ?? 'Default Description' }}</p>
    </div>

    <!-- 3D Rotating Image Carousel -->
    <div class="carousel-container position-absolute start-50 translate-middle-x d-flex gap-3 p-3"
         style="bottom: -60px; perspective: 1000px;">

        @foreach ($sliders as $slider)
            <div class="carousel-card rounded shadow-lg flex-shrink-0"
                 style="width: 150px; height: 200px; background: url('{{ $slider->image }}') center/cover no-repeat;
                        cursor: pointer; transition: transform 0.5s ease-in-out;"
                 onclick="changeHeroImage('{{ $slider->image }}', '{{ $slider->title }}', '{{ $slider->description }}')">
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript for 3D Effect & Auto-Sliding -->
<script>
    var sliderImages = @json($sliders->pluck('image'));
    var sliderTitles = @json($sliders->pluck('title'));
    var sliderDescriptions = @json($sliders->pluck('description'));
    var heroSection = document.getElementById("heroSection");
    var titleElement = document.querySelector(".hero-section h1");
    var descElement = document.querySelector(".hero-section p");
    var currentIndex = 0;
    var interval;

    function changeHeroImage(imageUrl, title, description) {
        heroSection.style.backgroundImage = "url('" + imageUrl + "')";
        titleElement.innerHTML = title;
        descElement.innerHTML = description;
        restartAutoSlide();
    }

    function startAutoSlide() {
        interval = setInterval(() => {
            currentIndex = (currentIndex + 1) % sliderImages.length;
            changeHeroImage(sliderImages[currentIndex], sliderTitles[currentIndex], sliderDescriptions[currentIndex]);
        }, 4000);
    }

    function restartAutoSlide() {
        clearInterval(interval);
        startAutoSlide();
    }

    document.querySelectorAll(".carousel-card").forEach((card, index) => {
        card.addEventListener("mouseover", function() {
            this.style.transform = "rotateY(15deg) scale(1.1)";
        });

        card.addEventListener("mouseout", function() {
            this.style.transform = "rotateY(0deg) scale(1)";
        });
    });

    startAutoSlide();
</script>



<section>
    <div class="container">
        <div class="card shadow border-0" style="max-width: 700px; margin: 0 auto;">
            <div class="card-body">
                <form method="GET" action="{{ route('placeuser') }}">

                    <div class="row g-5 align-items-end">

                        <!-- Search by Destinations -->
                        <div class="col-md-4">
                            <label for="place_id" class="form-label text-dark"></label>
                            <input type="text" id="place" name="place" placeholder="Search by Destinations*" class="form-control">
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
                            <button type="submit" style="background-color:#0C243C;" class="btn  px-4 text-light">Search Now</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<div class="container mt-5">
    <h6 class="text-danger mt-5 text-center fw-bold">____EXPLORE PLACES</h6>
    <h1 class="text-center">TOP NOTCH PLACES</h1>
    <p class="text-center">Places are specific locations known for their history, culture, or natural beauty. They can be cities,<br> landmarks, or hidden gems attracting travelers worldwide.</p>

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
                            <a href="{{ route('homeslider.show', $place->id) }}" class="btn text-light" style="background-color:#0C243C;">View Details</a>
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
          <h5 class="modal-title text-dark" id="loginModalLabel">Sign Up Required</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
          You need to log in to add places to favorites.
        </div>
        <div class="modal-footer">
          <a href="{{ route('register') }}" class="btn text-light" style="background-color:#0C243C;">Sign Up </a>
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


<div  class="ms-5 rounded-3 p-4 shadow-lg mt-5" style="background-color:#C9D1D5; width: 93%; height: 400px;">
     <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h6 class="text-danger fw-bold">____ADVENTURE AWAITS</h6>
                <h1 class="mt-3">ABOUT US</h1>
                <p>Atlas Adventure connects travelers to Subcontinent Asia’s rich culture, breathtaking landscapes, and seamless travel experiences.</p>
                <a class="btn text-light" style="background-color:#0C243C;" href="{{route('aboutus')}}">Read More</a>
            </div>
            <div class="col-md-8 d-flex justify-content-center">
                <div id="ovalCarousel" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <img src="About us 1.jpg" class="img-fluid rounded-pill" style="width: 500px; height: 300px; object-fit: cover;" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="About us 2.jpg" class="img-fluid rounded-pill" style="width: 500px; height: 300px; object-fit: cover;" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="About us 3.jpg" class="img-fluid rounded-pill" style="width: 500px; height: 300px; object-fit: cover;" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="About us 4.jpg" class="img-fluid rounded-pill" style="width: 500px; height: 300px; object-fit: cover;" alt="Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#ovalCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#ovalCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
     </div>
</div>


<div class="container my-5">
            <h6 class="text-danger mt-5 text-center fw-bold">____EXPLORE COUNTRIES</h6>
            <h1 class="text-center">TOP NOTCH COUNTRIES</h1>
            <p class="text-center">Countries are defined territories with unique cultures, governments, and landscapes. They vary in size,<br> language, economy, and history, offering diverse experiences for travelers.</p>
            <div class="row justify-content-center mt-4">
                @foreach($countries as $country)
                <div class="col-md-2 col-sm-4 d-flex flex-column align-items-center">
                    <a href="{{ route('places.show', $country->id) }}" class="text-decoration-none">
                        <div class="position-relative text-center"
                             style="width: 180px; height: 260px; border-radius: 50px; overflow: hidden; margin: 20px 10px;">

                            <!-- Oval Image -->
                            <img src="{{ $country->image }}" alt="{{ $country->name }}"
                                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 50px;">

                            <!-- Places Count Badge -->
                            <div class="position-absolute bottom-0 start-50 translate-middle-x bg-white text-dark fw-bold text-center"
                                 style="width: 65px; height: 50px; line-height: 50px; border-radius: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); font-size: 14px;">
                                {{ $country->places_count }} Places
                            </div>
                        </div>
                    </a>

                    <!-- Country Name (Perfectly Centered) -->
                    <h5 class="fw-bold text-dark text-center mt-2">{{ $country->name }}</h5>
                </div>
                @endforeach
            </div>
</div>


<div class="rounded-3 p-5 shadow-lg mt-5" style="background-color:#C9D1D5; width: 100%;">
    <div class="container text-center">
        <h6 class="text-danger text-uppercase fw-bold">___Testimonial</h6>
        <h1 class="fw-bold mb-4">What Our Clients Say</h1>

        <div class="row mt-4">
            @php
                $testimonials = [
                    ["name" => "Robert Holland", "image" => "Testimonial1.jpg", "rating" => 4],
                    ["name" => "William Wright", "image" => "Testimonial2.jpg", "rating" => 4.5],
                    ["name" => "Alison Hobb", "image" => "Testimonial3.jpg", "rating" => 4],
                ];
            @endphp

            @foreach($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg p-4 position-relative overflow-hidden"
                         style="border-radius: 20px; transition: transform 0.3s, box-shadow 0.3s;">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $testimonial['image'] }}" class="rounded-circle border border-success border-3 shadow-lg"
                                 width="90" height="90">
                        </div>
                        <h5 class="mt-3 fw-bold text-primary">{{ $testimonial['name'] }}</h5>
                        <p class="text-muted fst-italic">
                            "Atlas Adventure made travel planning so easy! Their guides and bookings helped me explore South Asia stress-free. Highly recommended!"
                        </p>
                        <div class="text-warning">
                            @php
                                $fullStars = floor($testimonial['rating']);
                                $halfStar = ($testimonial['rating'] - $fullStars) > 0 ? true : false;
                            @endphp
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @if($halfStar)
                                <i class="fas fa-star-half-alt"></i>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<section class="text-center py-5 bg-light">
    <div class="container">
        <h6 class="text-danger txt-center fw-bold">___CALL TO ACTION</h6>
        <h2 class="fw-bold">PLAN YOUR NEXT ADVENTURE</h2>
        <p class="lead">Explore the best destinations with Atlas Adventure.</p>
    </div>
</section>

<!-- Tour Cards with "Book Now" Button -->
<div class="container mb-5">
    <div class="row">
        <!-- Left Side: About Us Text -->
        <div class="col-md-4">
            <div>
                  <h3 class="text-dark">Book Your Trip Now</h3>
                    <p>
                        Planning your next journey? Atlas Adventure makes booking tickets easy and hassle-free! Whether you're traveling to the majestic mountains of Pakistan, the vibrant cities of Turkey, the tropical beaches of Malaysia, or the golden deserts of Oman, we help you find the best travel options.
                    </p>
                    <a class="btn btn-success btn-lg px-4 py-2" href="https://www.booking.com">Book Now</a>
            </div>
        </div>

        <!-- Right Side: Image Cards -->
        <div class="col-md-8">
            <div class="row g-3">
                <!-- Card 1 -->
                <div class="col-6">
                    <div class="card text-white">
                        <img src="{{ asset('Blog1.png') }}" class="card-img img-fluid" style="height: 200px; object-fit: cover;" alt="Mountain Stay">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h6 class="card-title text-light">Mountain Stay 🏔️</h6>
                        </div>
                    </div>
                </div>


                <!-- Card 2 -->
                <div class="col-6">
                    <div class="card text-white">
                        <img src="{{ asset('Blog2.png') }}" class="card-img img-fluid" style="height: 200px; object-fit: cover;" alt="Mountain Stay">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h6 class="card-title text-light">Hiking Adventure 🎒
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                 <!-- Card 3 -->
                <div class="col-6">
                    <div class="card text-white">
                        <img src="{{ asset('Blog3.png') }}" class="card-img img-fluid" style="height: 200px; object-fit: cover;" alt="Mountain Stay">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h6 class="card-title text-light">Travel Guidance 🗺️</h6>
                        </div>
                    </div>
                </div>


                <!-- Card 4 -->
                <div class="col-6">
                    <div class="card text-white">
                        <img src="{{ asset('Blog4.png') }}" class="card-img img-fluid" style="height: 200px; object-fit: cover;" alt="Mountain Stay">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h6 class="card-title text-light">City Exploration 🏛️</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection


