@extends('app.master')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h2 class="fw-bold display-4">Discover Breathtaking Destinations!</h2>
<p class="text-light">Explore hidden gems, experience new cultures, and create unforgettable memories.</p>

    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-dark mt-5">{{ $place->name }}</h2>
    <p class="text-dark">{{ $place->description }} <button type="button" class="mt-3 btn btn-md text-light d-flex align-items-center gap-2 fw-bold px-4 py-2 shadow-sm rounded-pill" style="background-color:#0C243C;"
        data-bs-toggle="modal"
        data-bs-target="{{ auth()->check() ? '#reviewModal' : '#loginModal' }}">
        <i class="bi bi-pencil-square"></i> Write a Review
    </button>
    </p>

    <!-- Image Gallery -->
    <div class="row">
        <div class="col-md-12">
            <!-- Large Image Display -->
            <div class="position-relative">
                <img id="largeThumbnail" src="{{ asset($place->thumbnail) }}" class="img-fluid rounded shadow-lg w-100"
                     alt="{{ $place->name }}" style="height: 400px; object-fit: cover;">
            </div>
            <!-- Thumbnail Images (Horizontal Scrolling) -->
            <div class="d-flex overflow-auto mt-3">
                @foreach($place->images as $image)
                    <img src="{{ asset($image->image_path) }}"
                         class="img-thumbnail mx-2 clickable-thumbnail"
                         data-full="{{ asset($image->image_path) }}"
                         style="width: 100px; height: 100px; object-fit: cover; cursor: pointer; border: 2px solid transparent;">
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery Images Display (Dynamic) -->
    <div class="row mt-4">
        <div id="galleryImages" class="d-flex flex-wrap">
            @if($place->galleries && $place->galleries->isNotEmpty())
                @foreach($place->galleries as $gallery)
                    <img src="{{ asset($gallery->image_path) }}"
     data-full="{{ asset($gallery->image_path) }}"
     class="img-thumbnail m-2 clickable-thumbnail"
     style="width: 120px; height: 120px; object-fit: cover; cursor: pointer;">

                @endforeach
            @else
                <p class="text-muted">No images available in the gallery.</p>
            @endif
        </div>
    </div>
    <!-- Place Details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="container mt-4">
    <div class="row">

        <!-- Left Side: Place Details -->
        <div class="col-md-6">
            <ul class="list-group ">
                <li class="list-group-item"><strong>Country:</strong> {{ $place->country->name }}</li>
                <li class="list-group-item"><strong>Province:</strong> {{ $place->province->name }}</li>
                <li class="list-group-item"><strong>City:</strong> {{ $place->city->name }}</li>
                {{-- <li class="list-group-item"><strong>Town:</strong> {{ $place->town->name }}</li> --}}
                <li class="list-group-item"><strong>Location:</strong> {{ $place->location }}</li>
            </ul>

            <ul class="list-group">
                <li class="list-group-item"><strong>Latitude:</strong> {{ $place->lat }}</li>
                <li class="list-group-item"><strong>Longitude:</strong> {{ $place->lng }}</li>
            </ul>
        </div>

        <!-- Right Side: Map -->
        <div class="col-md-6">
            <div id="mapid" style="height: 300px; width: 100%;"></div>
        </div>

    </div>
</div>

              <!-- Upload Photos (Only for Logged-in Users) -->
            @if(Auth::check())
              <form id="galleryUploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="place_id" value="{{ $place->id }}">
                  <button class="btn text-light mt-3 ms-4" style="background-color: #0C243C" type="button" onclick="document.getElementById('image_path').click();">
                      Upload Photos
                  </button>
                  <input type="file" id="image_path" name="image_path[]" multiple required style="display: none;" onchange="submitGalleryForm()">
              </form>
          @endif
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
    const largeImage = document.getElementById("largeThumbnail");

    // Select all clickable images from both gallery and place images
    const thumbnails = document.querySelectorAll(".clickable-thumbnail");

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener("click", function () {
            if (this.dataset.full) {
                largeImage.src = this.dataset.full;

                // Remove border from all thumbnails and highlight the selected one
                thumbnails.forEach(thumb => thumb.style.border = "2px solid transparent");
                this.style.border = "2px solid #007BFF";
            } else {
                console.error("Image missing 'data-full' attribute");
            }
        });
    });
});

             // AJAX Image Upload & Show Uploaded Images
              function submitGalleryForm() {
                 let formData = new FormData(document.getElementById('galleryUploadForm'));

                  fetch("{{ route('gallery.store') }}", {
                  method: "POST",
                  body: formData,
                  headers: {
                  "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
                 })
                 .then(response => response.json())
                 .then(data => {
                 if (data.success) {
                  data.images.forEach(image => {
                      let imgElement = document.createElement("img");
                      imgElement.src = "/storage/" + image.path_image;
                      imgElement.className = "img-fluid img-thumbnail gallery-img m-1";

                      // Append the new image to gallery
                      document.getElementById("galleryImages").appendChild(imgElement);
                  });
                 }
                })
               .catch(error => console.error("Error uploading images:", error));
              }
        </script>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var lat = {{ $place->lat }};
        var lng = {{ $place->lng }};

        var map = L.map('mapid').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup("<b>{{ $place->name }}</b><br>{{ $place->location }}")
            .openPopup();
    });
</script>


    <div class="container mt-4">
        @if(auth()->check())

            <!-- Review Modal -->
            <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel">Share Your Experience at <strong>{{ $place->name }}</strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/rate-place') }}" method="POST">
                                @csrf
                                <input type="hidden" name="place_id" value="{{ $place->id }}">

                                <!-- Rating Dropdown -->
                                <div class="mb-3">
                                    <label for="rating" class="form-label fw-bold text-dark">Rating</label>
                                    <select name="rating" class="form-select w-100" required>
                                        <option value="">Select Rating Level</option>
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>

                                <!-- Review Text Area -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-dark">Your Review</label>
                                    <textarea name="review" class="form-control" placeholder="Write a review (optional)" rows="4"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="mt-3"><a href="{{ route('register') }}" class="btn btn-warning">Sign Up</a> to rate this place and upload photos of your choice.</p>
        @endif
        @if(!auth()->check())
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Sign Up Required</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>You need to Sign Up to write a review.</p>
                        <a href="{{ route('register') }}" class="btn text-light" style="background-color:#0C243C;">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

        <!-- Visitors Reviews Section -->
        <h2 class="mb-3 mt-4 text-center">Visitors Reviews</h2>

        @if($place->ratings->isEmpty())
            <p class="alert alert-info">No reviews yet. Be the first to rate this place!</p>
        @else
            @foreach($place->ratings as $rating)
            <div class="mb-3 ">
                <div>
                    <h6 class="text-primary fw-bold">
                        {{ $rating->user->name }}
                        <span class="text-warning">⭐ {{ $rating->rating }}/5</span>
                    </h6>
                    <p class="fst-italic mt-2">"{{ $rating->review }}"</p>
                    <small class="text-muted">{{ $rating->created_at->format('F j, Y') }}</small>
                </div>
            </div>
            @endforeach
        @endif
    </div>

</div>

<div class="place-details ms-5 me-5">
    <div class="other-places">
        <h6 class="text-center text-danger mt-5">___YOU MIGHT ALSO LIKE</h6>
        <h2 class="text-center">RELATED PLACES</h2>
        <div class="row">
            @foreach($otherPlaces as $otherPlace)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg">
                        <!-- Place image -->
                        <img src="{{ url($otherPlace->thumbnail) }}"
                        class="card-img-top" alt="{{ $otherPlace->name }}"
                        style="height: 200px; object-fit: cover;">


                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold text-dark">
                                {{ $otherPlace->name }}
                            </h5>
                            <a href="{{ route('homeslider.show', $otherPlace->id) }}"
                               class="btn text-light"
                               style="background-color:#0C243C;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
