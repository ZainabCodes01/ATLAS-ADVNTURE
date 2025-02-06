<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atlas Adventure</title>
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">




</head>
<body class="text-white" style="background-color: #0C243C; margin: 0; height: 100vh;">
    <img src="Turkey.png" alt="">
    <!-- Navbar (stays at the top) -->
    <nav class="navbar navbar-expand-md fixed-top" style="background-color:#C9D1D5;">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img height="55px" width="auto" src="{{ asset('wAtlas7.png') }}" alt="Logo">
            </a>

            <!-- Hamburger Menu Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i> <!-- Manually added icon -->
              </button>


            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="#">HOME</a></li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                            DESTINATIONS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">PAKISTAN</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">TURKEY</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">MALAYSIA</a></li>
                             <li><a class="dropdown-item" style="color:#0C243C;" href="#">OMAN</a></li>
                        </ul>


                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                           FOOD
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">TRADITIONAL DISHES</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">STREET FOOD</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">FAMOUS RESTAURANTS</a></li>
                        </ul>


                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                           FESTIVALS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">RELIGIOUS FESTIVALS</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">SEASONAL EVENTS</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">FESTIVALS BY COUNTRY</a></li>
                        </ul>


                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                            MORE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">SAVED ITEMS</a></li>



                           <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                           PLAN YOUR TRIP
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="https://www.expedia.com">BOOK HOTELS</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="https://www.booking.com" target="_blank">BOOK TICKETS </a></li>
                        </ul>
                    </li>


                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">CONTACT US</a></li>
                        </ul>
                    </li>

                    <button class="nav-item btn me-md-1"  &nbsp;  style="background-color: #0C243C; color:#C9D1D5;">LOGIN</button>

                    <button class="nav-item btn" style="background-color: #0C243C; color:#C9D1D5;">REGISTER</button>
                </ul>



                <form class="d-flex" role="search">
                    <i class="bi bi-mic-fill voice-search-icon"></i>
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>



    <div id="carouselExample" class="carousel slide mt-55px" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active position-relative">
            <img src="Pakistan.jpg" class="d-block w-100" alt="Slide 1" style="height: 80vh; object-fit: cover;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <h1>Welcome to Pakistan</h1>
              <p>Experience the beauty and culture of Pakistan.</p>
            </div>
          </div>
          <div class="carousel-item position-relative">
            <img src="Malaysia.png" class="d-block w-100" alt="Slide 2" style="height: 80vh; object-fit: cover;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <h1>Discover Stunning Sites</h1>
              <p>Mountains, rivers, and valleys await you.</p>
            </div>
          </div>
          <div class="carousel-item position-relative">
            <img src="Oman.jpg" class="d-block w-100" alt="Slide 3" style="height: 80vh; object-fit: cover;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <h1>Explore Historical Sites</h1>
              <p>Delve into a rich cultural heritage.</p>
            </div>
          </div>
          <div class="carousel-item position-relative">
            <img src="Turkey.jpg" class="d-block w-100" alt="Slide 3" style="height: 80vh; object-fit: cover;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <h1>Majesty in Stone</h1>
              <p>Immerse Yourself in Timeless Splendor.</p>
            </div>
          </div>
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
        <div class="container ">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row g-3 align-items-end"  >
                        <div class="col-md-3">
                            <label for="text" class="form-label text-dark">Search Destinations*</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter Destination">
                        </div>

                        <div class="col-md-3">
                            <label for="text" class="form-label text-dark">Search Foods*</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter Food">
                        </div>

                        <div class="col-md-3">
                            <label for="text" class="form-label text-dark">Search Festivals*</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter Festival">
                        </div>

                        <div class="col-md-3">
                            <button type="search" class="btn btn-danger px-4">Search Now</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

      <div class="container mt-5">
         <div class="row">
            <div class="col-md-6">
                 <h6 class="text-danger">____POPULAR DESTINATION</h6>
                 <h1>TOP NOTCH<br> DESTINATION</h1>
            </div>
            <div class="col-md-6 mt-5">
                <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
            </div>
         </div>
      </div>

      {{-- <div class="container mt-7">
        <h1 class="text-center">The Wonders of Nature</h1>
        <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 ">
                    <div class="card border-0 position-relative">
                        <!-- Image Section -->
                        <img src="{{ $category->image }}" class="card-img-top img-fluid" alt="{{ $category->name }}">
                        <div class="position-absolute  top-0 start-0 bg-dark text-white px-3 py-1 fw-bold" >{{ $category->name }}</div>
                        <!-- Text Section -->
                        <div class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-75 text-white text-center p-2">
                            <h6 class="mb-0 text-light">Explore the beauty</h6>
                            <p class="mb-0">
                                <span style="color: lightyellow;">★★★★</span><span style="color: gray;">★</span>
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

      <div class="container mt-5 my-5 ">
        <h6 class="text-danger text-center">____TRAVEL BY ACTIVITY</h6>
        <h1 class="text-center">ADVENTURE & ACTIVITY</h1>
        <p class="text-center">Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
        {{-- <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-6 g-2 text-center">
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Adventure">
                        <div class="card-body">
                            <h6 class="card-title">Adventure</h6>
                            <p class="card-text">15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Trekking">
                        <div class="card-body">
                            <h6 class="card-title">Trekking</h6>
                            <p class="card-text">12 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Camp Fire">
                        <div class="card-body">
                            <h6 class="card-title">Camp Fire</h6>
                            <p class="card-text">7 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Off Road">
                        <div class="card-body">
                            <h6 class="card-title">Off Road</h6>
                            <p class="card-text">15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Camping">
                        <div class="card-body">
                            <h6 class="card-title">Camping</h6>
                            <p class="card-text">13 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Exploring">
                        <div class="card-body">
                            <h6 class="card-title">Exploring</h6>
                            <p class="card-text">25 Destination</p>
                        </div>
                    </div>
                </div>
            </div>
            </div> --}}
</div>



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



{{-- <footer>
    <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 500px;">
            <div class="container mt-5">
                 <div class="row ">
                     <div class="col-3">
                        <img height="100px" width="100px" src="wiAtlas7.png" alt="">
                        <p class="p-1">Discover the beauty, heritage, and spirit of South Asia</p>
                        <p><b>Phone Number:</b> +92 32456789</p>
                        <p><b>Email:</b> abc@gmail.com</p>
                     </div>

                     <div class="col-3">
                        <h3>Usefull Links</h3><br><br>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">HOME</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">DESTINATIONS</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">FESTIVALS</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">SERVICES</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">CONTACT US</a>
                     </div>

                     <div class="col-3">
                        <h3>Follow Us For More</h3><br><br>
                        <div class="align-item-center">
                         <a  href=""><img width="70px" height="45px" src="Linkedin.png" alt="Image"></a><br><br>
                        <a href=""><img width="70px" height="45px" src="Linkedin.png" alt="Image"></a><br><br>
                        <a href=""><img width="70px" height="45px" src="Linkedin.png" alt="Image"></a><br><br>
                        </div>
                     </div>

                     <div class="col-3">
                        <h3>Join Our Newsletter</h3><br><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, distinctio!</p>
                        <input type="text"><br><br>
                        <button class="rounded circle" style="background-color:#0C243C ;color:#C9D1D5">Subscribe</button>
                     </div>
                 </div>

                 <div class="container mt-5">
                    <p class="text-center">2025 Atlas Adventure. All Rights Reserved.</p>
                 </div>
            </div>
        </div>
    </div>
</footer>  --}}

</body>
</html>

{{-- <div>
    @yield('content')
</div> --}}
