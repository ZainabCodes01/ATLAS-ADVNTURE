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


                    <li class="nav-item">
                        <a class="nav-link " href="{{route('categories.user')}}" id="navbar" role="button"  aria-expanded="false" style="color:#0C243C;">
                            DESTINATIONS
                        </a>

                    </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="#" id="navbar" role="button"  aria-expanded="false" style="color:#0C243C;">
                           FOOD
                        </a>


                    </li>
                     <li class="nav-item ">
                        <a class="nav-link " href="#" id="navbar" role="button" aria-expanded="false" style="color:#0C243C;">
                           FESTIVALS
                        </a>
                    </li>


                    {{-- <button class="nav-item btn me-md-1"  &nbsp;  style="background-color: #0C243C; color:#C9D1D5;">LOGIN</button>

                    <button class="nav-item btn" style="background-color: #0C243C; color:#C9D1D5;">REGISTER</button> --}}
                </ul>



                {{-- <form class="d-flex" role="search">
                    <i class="bi bi-mic-fill voice-search-icon"></i>
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                </form> --}}
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <button class="btn me-2" style="background-color: #0C243C; color:#C9D1D5;">LOGIN</button>
                        </a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <button class="btn" style="background-color: #0C243C; color:#C9D1D5;">REGISTER</button>
                        </a>
                    </li>
                @endif


                    @else
                    <li class="nav-item dropdown">
                        <!-- Profile Picture with no dropdown icon -->
                        <a id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- Default Profile Picture (Circle) -->
                            <img src="{{asset('Default_Avatar.jpeg')}}" style="width: 40px; height: 40px;">
                        </a>

                        <!-- Dropdown Menu with Username and Logout -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- Display Username -->
                            <p class="dropdown-item">{{ Auth::user()->name }}</p>

                            <!-- Logout Option -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <!-- Hidden Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>

                        </div>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

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
                    <div class="card mb-4 shadow">
                        <img src="{{ $place->thumbnail }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $place->name }}</h5>
                            <p class="card-text text-dark">{{ Str::limit($place->description, 20) }}</p>
                            <a href="{{ route('homeslider.show', $place->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($places->isEmpty())
            <p class="text-center text-muted">No places found.</p>
        @endif
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




    {{-- <div class="container mt-5 my-5 ">
        <h6 class="text-danger text-center">____TRAVEL BY ACTIVITY</h6>
        <h1 class="text-center">ADVENTURE & ACTIVITY</h1>
        <p class="text-center">Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.</p>
        <div class="container my-5">
            <div class="row row-cols-1 row-cols-md-6 g-2 text-center">
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Mountain.png" class="mx-auto" alt="Adventure">
                        <div class="card-body text-dark">
                            <h6 class="card-title">Adventure</h6>
                            <p class="card-text">15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Trekking.png" class="mx-auto" alt="Trekking">
                        <div class="card-body text-dark">
                            <h6 class="card-title">Trekking</h6>
                            <p class="card-text">12 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Camp Fire.png" class="mx-auto" alt="Camp Fire">
                        <div class="card-body text-dark">
                            <h6 class="card-title">Camp Fire</h6>
                            <p class="card-text">7 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Off Road.png" class="mx-auto" alt="Off Road">
                        <div class="card-body text-dark ">
                            <h6 class="card-title">Off Road</h6>
                            <p class="card-text">15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Campping.png" class="mx-auto" alt="Camping">
                        <div class="card-body text-dark">
                            <h6 class="card-title">Campping</h6>
                            <p class="card-text">13 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 border-0 shadow-sm">
                        <img width="50" height="50" src="Exploring.png" class="mx-auto" alt="Exploring">
                        <div class="card-body text-dark">
                            <h6 class="card-title">Exploring</h6>
                            <p class="card-text">25 Destination</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


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


<footer style="background-color:#C9D1D5; color:#0C243C">
    <div class="container text-md-start ">
        <div class="row">

            <!-- About Travel -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-4">
                <img height="100px" width="100px" src="wAtlas7.png" alt="">
                <p class="p-1">Discover the beauty, heritage, and spirit of South Asia</p>
             </div>
            <!-- Contact Information -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">CONTACT INFO</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <p><i class="fas fa-phone"></i> +01 (977) 2599 12</p>
                <p><i class="fas fa-map-marker-alt"></i> 3146 Koontz, California</p>
            </div>

            <!-- Latest Posts -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">USEFUL LINKS</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <a style="color: #C9D1D5" href="{{route('placeuser')}}">HOME</a>
                <ul>
                    <li>
                        <a style="color:#0C243C" href="{{route('categories.user')}}">DESTINATIONS</a>
                    </li>
                    <li>
                        <a style="color:#0C243C" href="{{route('placeuser')}}">FESTIVALS</a>
                    </li>
                    <li>
                        <a style="color:#0C243C" href="{{route('placeuser')}}">SERVICES</a>
                    </li>
                    <li>
                        <a style="color:#0C243C" href="{{route('placeuser')}}">CONTACT US</a>
                    </li>
                </ul>
            </div>

            <!-- Subscribe Us -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">FOLLOW US</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <ul>
                    <li>
                        <a href="https://www.instagram.com" class="text-white me-3"><i class="fab fa-instagram fa-2x" style="color: #0C243C"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" class="text-white me-3"><i class="fab fa-facebook fa-2x" style="color: #0C243C"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com" class="text-white"><i class="fab fa-linkedin fa-2x" style="color: #0C243C"></i></a>
                    </li>
                </u>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="text-center mt-4">
            <p>&copy; 2025 Atlas Adventure. All rights reserved.</p>
        </div>
    </div>
</footer>


</body>
</html>


