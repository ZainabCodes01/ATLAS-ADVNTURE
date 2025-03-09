@extends('app.master')
@section('content')

<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Food.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Taste the Flavors of the World!</h1>
        <p class="text-light">Discover delicious cuisines, savor authentic dishes, and indulge in unforgettable flavors.</p>

    </div>
</div>

 <div class="container mt-5">
    <h2 class="mb-4 text-dark mt-5">{{ $food->name }}</h2>
    <p class="text-dark">{{ $food->description }}<button type="button" class="mt-3 btn btn-md btn-outline-primary d-flex align-items-center gap-2 fw-bold px-4 py-2 shadow-sm rounded-pill"
        data-bs-toggle="modal"
        data-bs-target="{{ auth()->check() ? '#reviewModal' : '#loginModal' }}">
        <i class="bi bi-pencil-square"></i> Write a Review
    </button></p>

    <!-- Image Gallery -->
    <div class="row">
        <div class="col-md-12">
            <!-- Large Image Display -->
            <div class="position-relative">
                <img id="largeThumbnail" src="{{ asset($food->thumbnail) }}" alt="{{ $food->name }}"
                class="img-fluid w-100 large-image" style="height: 500px; object-fit: cover; object-position: center;">
            </div>

            <!-- Thumbnail Images (Horizontal Scrolling) -->
            <div class="d-flex overflow-auto mt-3">
                @foreach($food->images as $place)
                <img src="{{ asset($place->image_path) }}"
                class="img-thumbnail mx-2 clickable-thumbnail"
                data-full="{{ asset($place->image_path) }}"
                style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; cursor: pointer;">

                @endforeach
            </div>
        </div>
    </div>

<!-- Thumbnail Gallery using Bootstrap -->
<div class="row mt-4">
    <div id="galleryImages" class="d-flex flex-wrap">
        @if($food->galleries && $food->galleries->isNotEmpty())
            @foreach($food->galleries as $gallery)
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




    <!-- Food Details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong>
                    {{ $food->country ? $food->country->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Province:</strong>
                    {{ $food->province ? $food->province->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>City:</strong>
                    {{ $food->city ? $food->city->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Town:</strong>
                    {{ $food->town ? $food->town->name : 'N/A' }}
                </li>
            </ul>

            <strong>External URL:</strong>
            <a class="btn btn-primary mt-2" href="{{ $food->external_url }}" target="_blank">Book Now</a>
        </div>
    </div>
    <!-- Upload Photos (Only for Logged-in Users) -->
    @if(Auth::check())
              <form id="galleryUploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="place_id" value="{{ $food->id }}">
                  <button class="btn btn-primary mt-3" type="button" onclick="document.getElementById('image_path').click();">
                      Upload Photos
                  </button>
                  <input type="file" id="image_path" name="image_path[]" multiple required style="display: none;" onchange="submitGalleryForm()">
              </form>
          @endif

    <!-- JavaScript for Thumbnail Click -->
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
     <div class="container mt-4">
        @if(auth()->check())

            <!-- Review Modal -->
            <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel">Share Your Experience at <strong>{{ $food->name }}</strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/rate-place') }}" method="POST">
                                @csrf
                                <input type="hidden" name="food_id" value="{{ $food->id }}">

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
            <p class="mt-3"><a href="{{ route('login') }}" class="btn btn-warning">Login</a> to rate this place and upload photos of your choice.</p>
        @endif
        @if(!auth()->check())
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>You need to login to write a review.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif


        <!-- Visitors Reviews Section -->
        <h2 class="mb-3 mt-4 text-center">Visitors Reviews</h2>

        @if(isset($place->ratings) && $place->ratings->isNotEmpty())
        @foreach($place->ratings as $rating)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-primary fw-bold">
                        {{ $rating->user->name }}
                        <span class="text-warning">⭐ {{ $rating->rating }}/5</span>
                    </h6>
                    <small class="text-muted">{{ $rating->created_at->format('F j, Y') }}</small>
                    <p class="card-text fst-italic mt-2">"{{ $rating->review }}"</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="alert alert-info">No reviews yet. Be the first to rate this place!</p>
    @endif

    </div>
</div>


<div class="place-details ms-5 me-5">
    <div class="other-places">
        <h6 class="text-center text-danger mt-5">___YOU MIGHT ALSO LIKE</h6>
        <h2 class="text-center">RELATED CUISINS</h2>
        <div class="row ms-5 me-5">
            @if($relatedFoods->isEmpty())
                <p class="text-center">No similar cuisines found in this country.</p>
            @else
                @foreach($relatedFoods as $relatedFood)
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <img src="{{ asset($relatedFood->thumbnail) }}" class="card-img-top" alt="{{ $relatedFood->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-dark">{{ $relatedFood->name }}</h5>
                                <a href="{{ route('foods.show', $relatedFood->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
