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
    <h2 class="mb-4 text-dark mt-5">{{ $Festivals->name }}</h2>
    <p class="text-dark">{{ $Festivals->description }}</p>

    <!-- Image Gallery -->
    <div class="row">
        <div class="col-md-12">
            <!-- Large Image Display -->
            <div class="position-relative">
                <img id="largeThumbnail" src="{{ asset($Festivals->thumbnail) }}" class="img-fluid rounded shadow-lg w-100"
                     alt="{{ $Festivals->name }}" style="height: 400px; object-fit: cover;">
            </div>

            <!-- Thumbnail Images (Horizontal Scrolling) -->
            <div class="d-flex overflow-auto mt-3">
                @foreach($Festivals->images as $place)
                    <img src="{{ asset($place->image_path) }}"
                         class="img-thumbnail mx-2 clickable-thumbnail"
                         data-full="{{ asset($place->image_path) }}"
                         style="width: 100px; height: 100px; object-fit: cover; cursor: pointer; border: 2px solid transparent;">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Uploaded Gallery Images -->
    <div class="row mt-4">
        <div id="galleryImages" class="d-flex flex-wrap">
            @if($Festivals->galleries && $Festivals->galleries->isNotEmpty())
                @foreach($Festivals->galleries as $gallery)
                    <img src="{{ asset($gallery->image_path) }}" class="img-thumbnail m-2"
                         style="width: 120px; height: 120px; object-fit: cover;">
                @endforeach
            @else
                <p class="text-muted">No images available in the gallery.</p>
            @endif
        </div>
    </div>



    <!-- Festivals Details -->
    <div class="row mt-4">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong>
                    {{ $Festivals->country ? $Festivals->country->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Province:</strong>
                    {{ $Festivals->province ? $Festivals->province->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>City:</strong>
                    {{ $Festivals->city ? $Festivals->city->name : 'N/A' }}
                </li>
                <li class="list-group-item"><strong>Town:</strong>
                    {{ $Festivals->town ? $Festivals->town->name : 'N/A' }}
                </li>
            </ul>
        </div>
    </div>
    <!-- Upload Photos (Only for Logged-in Users) -->
    @if(Auth::check())
        <form id="galleryUploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="Festivals_id" value="{{ $Festivals->id }}">
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
        <h2 class="text-center">RELATED FESTIVALS</h2>
        <div class="row">
            @foreach($otherFestivals as $otherFestival)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg">
                        <!-- Place image -->
                        <img src="{{ asset($otherFestival->thumbnail) }}" class="card-img-top" alt="{{ $otherFestival->name }}" style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Place name -->
                            <h5 class="card-title">{{ $otherFestival->name }}</h5>

                            <!-- Short description -->
                            <p class="card-text">{{ $otherFestival->short_description }}</p>

                            <!-- View Details button -->
                            <a href="{{ route('Festivals.show', $otherFestival->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
