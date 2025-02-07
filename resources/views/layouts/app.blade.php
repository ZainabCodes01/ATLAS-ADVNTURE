<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="text-white" style="background-color: #0C243C; margin: 0; height: 100vh;">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color:#C9D1D5;">
            <div class="container">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <img height="55px" width="auto" src="wAtlas7.png" alt="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                         <div class="collapse navbar-collapse" id="navbarNav">
                             <ul class="navbar-nav mx-auto">
                                 <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="{{route('catuser')}}">HOME</a></li>


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
                                 <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="{{route('master')}}">FESTIVAL</a></li>

                                     {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <li><a class="dropdown-item" style="color:#0C243C;" href="#">RELIGIOUS FESTIVALS</a></li>
                                         <li><a class="dropdown-item" style="color:#0C243C;" href="#">SEASONAL EVENTS</a></li>
                                         <li><a class="dropdown-item" style="color:#0C243C;" href="#">FESTIVALS BY COUNTRY</a></li>
                                     </ul> --}}

                                 <!--<li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="#">LOGIN</a></li>-->

                             </ul>



                             <form class="d-flex" role="search">
                                 <i class="bi bi-mic-fill voice-search-icon"></i>
                                 <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                             </form>
                             {{-- <button class="nav-item btn me-md-1"  &nbsp;  style="background-color: #0C243C; color:#C9D1D5;">LOGIN</button>

                             <button class="nav-item btn" style="background-color: #0C243C; color:#C9D1D5;">REGISTER</button> --}}
                         </div>
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
                                <img src="https://a0.anyrgb.com/pngimg/466/1622/courage-get-5-user-login-flashed-prints-user-profile-home-page-login-avatar-user.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
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
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
