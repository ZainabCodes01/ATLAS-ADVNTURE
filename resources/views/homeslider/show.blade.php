{{-- @extends('app.master')

@section('content')

<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-dark mt-5">{{ $place->name }}</h2>
    <p class="text-dark">{{ $place->description }}</p>

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

    <!-- Uploaded Gallery Images -->
    <div class="row mt-4">
        <div id="galleryImages" class="d-flex flex-wrap">
            @if($place->galleries && $place->galleries->isNotEmpty())
                @foreach($place->galleries as $gallery)
                    <img src="{{ asset($gallery->image_path) }}" class="img-thumbnail m-2"
                         style="width: 120px; height: 120px; object-fit: cover;">
                @endforeach
            @else
                <p class="text-muted">No images available in the gallery.</p>
            @endif
        </div>
    </div>



    <!-- Place Details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong>
                    {{ $place->country ? $place->country->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Province:</strong>
                    {{ $place->province ? $place->province->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>City:</strong>
                    {{ $place->city ? $place->city->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Town:</strong>
                    {{ $place->town ? $place->town->name : 'N/A' }}
                </li>
            </ul>
        </div>
    </div>
    <!-- Upload Photos (Only for Logged-in Users) -->
    @if(Auth::check())
        <form id="galleryUploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="place_id" value="{{ $place->id }}">
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
            const thumbnails = document.querySelectorAll(".clickable-thumbnail");

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener("click", function () {
                    largeImage.src = this.dataset.full;

                    // Remove border from all thumbnails and highlight selected one
                    thumbnails.forEach(thumb => thumb.style.border = "2px solid transparent");
                    this.style.border = "2px solid #007BFF";
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
                        imgElement.className = "img-thumbnail m-2";
                        imgElement.style.width = "120px";
                        imgElement.style.height = "120px";
                        imgElement.style.objectFit = "cover";

                        // Append the new image to gallery
                        document.getElementById("galleryImages").appendChild(imgElement);
                    });
                }
            })
            .catch(error => console.error("Error uploading images:", error));
        }
    </script>
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
                        <img src="{{ asset($otherPlace->thumbnail) }}" class="card-img-top" alt="{{ $otherPlace->name }}" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Place name -->
                            <h5 class="card-title">{{ $otherPlace->name }}</h5>

                            <!-- Short description -->
                            <p class="card-text">{{ $otherPlace->short_description }}</p>

                            <!-- View Details button -->
                            <a href="{{ route('homeslider.show', $otherPlace->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




@endsection --}}


@extends('app.master')

@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Destination_Slider.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Let the Journey begin!</h1>
        <p>Explore, Discover, Experience!</p>
    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-dark mt-5">{{ $place->name }}</h2>
    <p class="text-dark">{{ $place->description }}</p>

    <!-- Image Gallery -->
    <div class="row">
        <div class="col-md-12">
            <!-- Large Image Display -->
            <div class="position-relative">
                <img id="largeThumbnail" src="{{ asset($place->thumbnail) }}" class="img-fluid rounded shadow-lg w-100"
                     alt="{{ $place->name }}" style="height: 400px; object-fit: cover;">
            </div>
            <!-- Thumbnail Images (Horizontal Scrolling) -->
            <div class="d-flex flex-wrap mt-3">
                @foreach($place->images as $image)
                    <img src="{{ asset($image->image_path) }}"
                         class="img-thumbnail m-1 clickable-thumbnail"
                         data-full="{{ asset($image->image_path) }}"
                         style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery Images Display (Dynamic) -->
    <div class="row mt-4">
        <div id="galleryImages" class="d-flex flex-wrap">
            @if($place->galleries && $place->galleries->isNotEmpty())
                @foreach($place->galleries as $gallery)
                    <img src="{{ asset($gallery->image_path) }}" class="img-thumbnail m-2"
                         style="width: 120px; height: 120px; object-fit: cover;">
                @endforeach
            @else
                <p class="text-muted">No images available in the gallery.</p>
            @endif
        </div>
    </div>
    <!-- Place Details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong> {{ $place->country->name }}</li>
                <li class="list-group-item"><strong>Province:</strong> {{ $place->province->name }}</li>
                <li class="list-group-item"><strong>City:</strong> {{ $place->city->name }}</li>
                <li class="list-group-item"><strong>Town:</strong> {{ $place->town->name }}</li>
                <li class="list-group-item"><strong>Location:</strong> {{ $place->location }}</li>
                <li class="list-group-item"><strong>Latitude:</strong> {{ $place->lat }}</li>
                <li class="list-group-item"><strong>Longitude:</strong> {{ $place->lng }}</li>
                <li class="list-group-item">
                    <strong>External URL:</strong>
                    <a class="btn btn-primary" href="{{ $place->external_url }}" target="_blank">
                        {{ $place->external_url }}
                    </a>
                </li>
            </ul>
              <!-- Upload Photos (Only for Logged-in Users) -->
              @if(Auth::check())
              <form id="galleryUploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="place_id" value="{{ $place->id }}">
                  <button class="btn btn-primary mt-3" type="button" onclick="document.getElementById('image_path').click();">
                      Upload Photos
                  </button>
                  <input type="file" id="image_path" name="image_path[]" multiple required style="display: none;" onchange="submitGalleryForm()">
              </form>
          @endif
        </div>
        <script>
            // Thumbnail Click to Change Large Image
               $(document).on("click", ".clickable-thumbnail", function() {
               var newSrc = $(this).attr("data-full");
                 $("#largeThumbnail").attr("src", newSrc);
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
    <div class="container mt-4">
        @if(auth()->check())
            <form action="{{ url('/rate-place') }}" method="POST" class="p-4 bg-light mt-5 shadow rounded">
                @csrf
                <input type="hidden" name="place_id" value="{{ $place->id }}">

                <h3 class="mt-3 text-primary">Share Your Experience at <strong>{{ $place->name }}</strong></h3>

                <div class="mb-3">
                    <label for="rating" class="form-label fw-bold text-dark">Rating</label>
                    <select name="rating" class="form-select w-50" required>
                        <option value="">Select Rating Level</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Your Review</label>
                    <textarea name="review" class="form-control" placeholder="Write a review (optional)" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-success px-4 py-2">Submit Review</button>
            </form>
        @else
            <p class="mt-3"><a href="{{ route('login') }}" class="btn btn-warning">Login</a> to rate this place.</p>
        @endif
        <h4 class="mb-3">Visitors Reviews</h4>

        @if($place->ratings->isEmpty())
            <p class="alert alert-info">No reviews yet. Be the first to rate this place!</p>
        @else
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
                        <img src="{{ asset($otherPlace->thumbnail) }}" class="card-img-top" alt="{{ $otherPlace->name }}" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Place name -->
                            <h5 class="card-title">{{ $otherPlace->name }}</h5>

                            <!-- Short description -->
                            <p class="card-text">{{ $otherPlace->short_description }}</p>

                            <!-- View Details button -->
                            <a href="{{ route('homeslider.show', $otherPlace->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
