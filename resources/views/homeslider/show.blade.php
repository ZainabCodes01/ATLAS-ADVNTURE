@extends('app.master')

@section('content')
<div class="w-100" style="height: 80vh; overflow: hidden;">
    <img src="{{ asset('Destination_Slider.jpg') }}" class="img-fluid w-100" style="height: 100%; object-fit: cover;" alt="Banner Image">
</div>

<div class="container mt-5">
    <h2 class="mb-4 text-light mt-5">{{ $place->name }}</h2>
    <div class="row">
        <!-- Left Side: Place Details -->
        <div class="col-md-6">
            <p class="text-light">{{ $place->description }}</p>

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

        <!-- Right Side: Images -->
        <div class="col-md-6">
            <!-- Large Image Thumbnail -->
            <img id="largeThumbnail" src="{{ asset($place->thumbnail) }}" class="img-fluid rounded shadow-lg"
                 alt="{{ $place->name }}" style="height: 300px; width: 100%; object-fit: cover;">

            <!-- Thumbnail Images (Clickable) -->
            <div class="d-flex flex-wrap mt-3">
                @foreach($place->images as $image)
                    <img src="{{ asset($image->image_path) }}"
                         class="img-thumbnail m-1 clickable-thumbnail"
                         data-full="{{ asset($image->image_path) }}"
                         style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                @endforeach
            </div>

            <!-- Gallery Images Display (Dynamic) -->
            <div id="galleryImages" class="row mt-3">
                @foreach($place->galleries as $gallery)
                    <div class="col-md-3">
                        <img src="{{ asset($gallery->image_path) }}" class="img-fluid img-thumbnail clickable-thumbnail"
                             data-full="{{ asset($gallery->image_path) }}" alt="Gallery Image"
                             style="cursor: pointer;">
                    </div>
                @endforeach
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    @if(auth()->check())
    <form action="{{ url('/rate-place') }}" method="POST" class="p-4 bg-light mt-5 shadow rounded">
        @csrf
        <input type="hidden" name="place_id" value="{{ $place->id }}">

        <h3 class="mt-3 text-primary">Share Your Experience at <strong>{{ $place->name }}</strong></h3>

        <div class="mb-3">
            <label for="rating" class="form-label fw-bold">Rating</label>
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
            <label class="form-label fw-bold">Your Review</label>
            <textarea name="review" class="form-control" placeholder="Write a review (optional)" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-success px-4 py-2">Submit Review</button>
    </form>

       @else
      <p><a href="{{ route('login') }}" class="text-warning">Login</a> to rate this place.</p>
      @endif

      @foreach($place->ratings as $rating)
      <div class="rating-box mt-5">
        <h5>Recent Reviews</h5>
        <strong>{{ $rating->user->name }}-⭐ </strong>
        <p><i> "{{$rating->review }}"</p>
      </div>
    @endforeach


</div>

@endsection
