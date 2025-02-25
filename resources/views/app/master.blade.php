<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atlas Adventure</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


</head>
<body>
<body class="bg-light" style=" margin: 0; height: 100vh;">

    <nav class="navbar navbar-expand-md fixed-top" style="background-color:#0C243C;">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img height="65px" width="auto" src="{{ asset('wiAtlas7.png') }}" alt="Logo">
            </a>

            <!-- Hamburger Menu Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i> <!-- Menu Icon -->
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" style="color:#C9D1D5;" href="{{route('homeslider')}}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('categories.user')}}" style="color:#C9D1D5;">DESTINATIONS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('food.index')}}" style="color:#C9D1D5;">FOOD</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('Festivals.index')}}" style="color:#C9D1D5;">FESTIVALS</a></li>
                </ul>

               <!-- Search Bar with Voice Search -->
       <form id="searchForm" action="{{ route('placeuser') }}" method="GET" class="d-flex">
        <div class="input-group">
        <input type="text" id="voiceSearch" name="place" value="{{request()->input('place')}}" placeholder="Search by keyword..." class="form-control rounded-pill px-3">
        <button type="button" class="btn btn-outline-light rounded-pill ms-2" onclick="startVoiceRecognition()">
            <i class="fas fa-microphone"></i> <!-- Mic Icon -->
        </button>
        <button type="submit" class="btn rounded-pill ms-2 bg-light" style=" color:#0C243C">Search</button>
      </div>
     </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="btn bg-light" style=" color:#0C243C;">Sign Up</button>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <!-- Profile Icon -->
                            <a id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user() && Auth::user()->profile_image)
                                    <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" class="rounded-circle" width="40" height="40" alt="User Image">
                                @else
                                    <i class="fas fa-user-circle text-secondary" style="font-size: 40px;"></i>
                                @endif
                            </a>


                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu dropdown-menu-end p-3 shadow-lg" aria-labelledby="navbarDropdown" style="min-width: 200px;">
                                <p class="dropdown-item  fw-bold mb-2">{{ Auth::user()->name }}</p>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
                                    <i class="fas fa-user me-2"></i> Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.favorites') }}">
                                    <i class="fas fa-heart me-2 text-danger"></i> Saved Items
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center " href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
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

    <!-- Voice Recognition Script -->
    <script>
        function startVoiceRecognition() {
            var recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';

            recognition.onresult = function(event) {
                document.getElementById('voiceSearch').value = event.results[0][0].transcript;
            };

            recognition.start();
        }
    </script>





<div>
    @yield('content');
</div>

<footer style=" background-color:#0C243C; color:#C9D1D5">
    <div class="container text-md-start ">
        <div class="row">

            <!-- About Travel -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-4">
                <img height="100px" width="100px" src="{{ asset('wiAtlas7.png') }}" alt="">
                <p class="p-1">Discover the beauty, heritage, and spirit of South Asia</p>
             </div>
            <!-- Contact Information -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">CONTACT INFO</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <p><i class="fas fa-phone"></i> +92 3456789012</p>
                <p><i class="fas fa-map-marker-alt"></i> 3146 Gujranwala, Pakistan</p>
            </div>

            <!-- Latest Posts -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">QUICK LINKS</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <ul>
                    <li>
                        <a style="color: #C9D1D5" href="{{route('placeuser')}}">HOME</a>
                    </li>
                    <li>
                        <a style="color:#C9D1D5" href="{{route('categories.user')}}">DESTINATIONS</a>
                    </li>
                    <li>
                        <a style="color:#C9D1D5" href="{{route('food.index')}}"> FOOD</a>
                    </li>
                    <li>
                        <a style="color:#C9D1D5" href="{{route('Festivals.index')}}">FESTIVALS</a>
                    </li>
                    <li>
                        <a style="color:#C9D1D5" href="{{route('aboutus')}}">ABOUT US</a>
                    </li>
                </ul>
            </div>

            <!-- Subscribe Us -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-5">
                <h5 class="text-uppercase fw-bold">FOLLOW US</h5>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ff6600; height: 2px;">
                <ul class="d-flex flex-column gap-3">
                    <li>
                        <a href="https://www.instagram.com" class="text-white">
                            <i class="fab fa-instagram fa-2x" style="color:#C9D1D5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" class="text-white">
                            <i class="fab fa-facebook fa-2x" style="color:#C9D1D5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com" class="text-white">
                            <i class="fab fa-linkedin fa-2x" style="color:#C9D1D5"></i>
                        </a>
                    </li>
                </ul>

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






