<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atlas Adventure</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<body class="text-white" style="background-color: #0C243C; margin: 0; height: 100vh;">

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
                    <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="{{route('homeslider')}}">HOME</a></li>


                    <li class="nav-item">
                        <a class="nav-link " href="{{route('catuser')}}" id="navbar" role="button"  aria-expanded="false" style="color:#0C243C;">
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
                            <p class="dropdown-item text-center fw-bold mb-2">{{ Auth::user()->name }}</p>

    <!-- Divider -->
    <div class="dropdown-divider"></div>

    <!-- Logout Option -->
    <a class="dropdown-item text-center py-2" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>

    <!-- Hidden Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

                        </div>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>


<div>
    @yield('content');
</div>

<footer style="background-color:#C9D1D5; color:#0C243C">
    <div class="container text-md-start ">
        <div class="row">

            <!-- About Travel -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-4">
                <img height="100px" width="100px" src="{{ asset('wAtlas7.png') }}" alt="">
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
                        <a style="color:#0C243C" href="{{route('catuser')}}">DESTINATIONS</a>
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


