<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two Cards with Bootstrap</title>
   <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


</head>
<body class="text-white" style="background-color: #0C243C; margin: 0; height: 100vh;">
    <!-- Navbar (stays at the top) -->
    <nav class="navbar navbar-expand-md fixed-top" style="background-color:#C9D1D5;">
        <div class="container">
            <img height="55px" width="auto" src="wAtlas7.png" alt="">
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
       </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="{{route('placeuser')}}">HOME</a></li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                            DESTINATIONS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="{{route('master')}}">PAKISTAN</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="{{route('master')}}">TURKEY</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="{{route('master')}}">MALAYSIA</a></li>
                             <li><a class="dropdown-item" style="color:#0C243C;" href="{{route('master')}}">OMAN</a></li>
                        </ul>


                    </li>
                     {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                           FOOD
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">TRADITIONAL DISHES</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">STREET FOOD</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">FAMOUS RESTAURANTS</a></li>
                        </ul>


                    </li> --}}
                    <li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="{{route('master')}}">FESTIVAL</a></li>

                        {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">RELIGIOUS FESTIVALS</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">SEASONAL EVENTS</a></li>
                            <li><a class="dropdown-item" style="color:#0C243C;" href="#">FESTIVALS BY COUNTRY</a></li>
                        </ul> --}}



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#0C243C;">
                            MORE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="color:#0C243C;" href="{{route('master')}}">SAVED ITEMS</a></li>



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

                    <!--<li class="nav-item"><a class="nav-link" style="color:#0C243C;" href="#">LOGIN</a></li>-->

                </ul>



                <form class="d-flex" role="search">
                    <i class="bi bi-mic-fill voice-search-icon"></i>
                    <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button class="nav-item btn me-md-1"  &nbsp;  style="background-color: #0C243C; color:#C9D1D5;">LOGIN</button>

                <button class="nav-item btn" style="background-color: #0C243C; color:#C9D1D5;">REGISTER</button>
            </div>
        </div>
    </nav>

   <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">
            <h1 class="text-center">Embark on a journey with Atlas Adventures</h1>
            <p class="text-center">Discover the beauty, heritage, and spirit of South Asia</p>
            <!--<div class="gallery">
                <div class="carousel">
                    <img src="Pakistan.png" alt="Image 1">
                    <img src="istockphoto-1124656717-612x612.jpg" alt="Image 2">
                    <img src="Malaysia.png" alt="Image 3">
                    <img src="Oman.png" alt="Image 4">
                </div>-->
            </div>
        </div>
    </div>




   <!--<div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 500px;">
            <h1 class="text-center">The Wonders Of Nature</h1>
            <p class="text-center">Experience the wonders of nature with Atlas Adventure.</p>
        </div>
    </div>-->

   {{-- <div class="container mt-5 ">
    <div class="card-container text-white">
      <div class="row row-cols-1 row-cols-md-3 g-1">
        <!-- Card 1 -->
        <div class="col">
          <div class="card h-60" style="width: 60%;">
            <img height="120px" src="majestic-peaks.png" class="card-img-top" alt="Majestic Peaks">
            <div class="card-body">
              <h5 class="card-title">Majestic Peaks</h5>
              <p class="card-text">Conquer the heights of serenity.</p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card  h-60" style="width:60%;">
            <img height="120px" src="monu.png" class="card-img-top" alt="Exhibits">
            <div class="card-body">
              <h5 class="card-title">Exhibits</h5>
              <p class="card-text">A realm of history, art, and culture.</p>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col">
          <div class="card h-60" style="width:60%;">
            <img height="120px" src="enchanted-forests.png" class="card-img-top" alt="Enchanted Forests">
            <div class="card-body">
              <h5 class="card-title">Secret Forests</h5>
              <p class="card-text">Uncover the mysteries of wild.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

   <div>

   </div>

   <footer>
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
                        <a href=""><img width="70px" height="50px" src="Linkedin.png" alt="Image"></a><br><br>
                        <a href=""><img width="70px" height="50px" src="Linkedin.png" alt="Image"></a><br><br>
                        <a href=""><img width="70px" height="50px" src="Linkedin.png" alt="Image"></a><br><br>
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
   </footer>

</body>
</html>
