<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two Cards with Bootstrap</title>
   <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

{{-- <style>
        .about-us {
            display: flex;
            flex-wrap: wrap;
        }
        .about-us .content {
            flex: 1;
            padding: 20px;
        }
        .about-us .images {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .about-us .images img {
            width: 100%;
            margin-bottom: 10px;
        }
    </style> --}}
</head>
<body class="text-white" style="background-color: #0C243C; margin: 0; height: 100vh;">
    <!-- Navbar (stays at the top) -->
    <nav class="navbar navbar-expand-md" style="background-color:#C9D1D5;">
        <div class="container">
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
        </div>
    </nav>

{{--
<div class="d-flex justify-content-center align-items-center mt-2" style="height: calc(100vh - 56px);"> --}}
        {{-- <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">

            <div class="container">
                <h1 class="text-center">Reason For Choosing Us</h1>
                    <div class="row mt-5 ms-1">
                       <div class="col-4">
                            <img width="165px" height="155px"  src="Reason1.png">
                            <h5 class="mt-2">Expert Guides</h5>
                            <p>Join a community of adventurers who<br> rely on us for unforgettable<br> experiences and seamless journeys.</p>
                       </div>
                       <div class="col-4">
                        <img width="165px" height="155px" src="{{asset('Reason2.png')}}">
                        <h5 class="mt-2" >Reliable Support</h5>
                        <p>We are here for you. Reach out<br> to us anytime by phone, email<br> or chat.</p>
                       </div>
                       <div class="col-4">
                        <img width="165px" height="155px" src="Reason3.png">
                        <h5 class="mt-2">Trusted by Thousands</h5>
                        <p>We are trusted by 20 million travellers<br> just like you.</p>
                       </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="images">
                            <img  width="185px" height="170px" src="Turkey.jpg" alt="Image 1">
                            <img width="185px" height="170px" src="Turkey.jpg" alt="Image 2">
                            <img width="185px" height="170px" src="Turkey.jpg" alt="Image 3">
                            <img width="185px" height="170px"  src="Turkey.jpg"alt="Image 4">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                                <h1>About Us</h1>
                                <p class="card-text">Explore the Vibrant Cultures, Places and Wonders of Pakistan, Turkey, Malaysia & Oman with Atlas Adventure</p>
                                <p class="card-text">Welcome to Atlas Adventure, where every journey is a gateway to discovering the breathtaking landscapes, delicious cuisines, and vibrant festivals. Our mission is to create immersive travel experiences that connect you to the heart of these destinations, offering a perfect blend of adventure, culture, and relaxation.</p>
                                <p class="card-text">From the stunning mountains of Pakistan to the pristine beaches of Malaysia, the golden deserts of Oman, and the historical treasures of Turkey, our travel packages promise unforgettable moments that celebrate the beauty. and diversity of these regions.   <a href="" class="rounded btn" style="background-color:#C9D1D5; text-color:#0C243C;"><b>Read More</b></a></p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center " style="height: calc(100vh - 56px);">
        <div class="p-4 shadow-lg " style="background: rgba(255, 255, 255, 0.1); width: 100%; height: 200px;">
            <div class="container">
                <h1 class="text-center">Our Mission</h1>
                <p class="text-center"><b>Our Mission</b>"Atlas Adventure, is to create unforgetable travel experiencesthat celeberate the beauty and diversity of Pakistan, Turkey, Malaysia and Oman. We strive to connect travelers with the soul of these destinations through immersive journeys, cultural experiences and sustainable tourisum practices. Join us to explore the extraordinary!"</p>
            </div>

        </div>
    </div>


    <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">
           <div class="container d-flex flex-column align-items-center">
             <h1 class="text-center">Testimonials</h1>
             <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, error.
             </p>
             <div class="row mt-5">
                <div class="cards col-4">
                  <div class="card " style="background-color: #C9D1D5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim quia consequuntur eius, nesciunt rem!</p>
                  </div><br>
                  <img class="rounded-circle align-items-center " width="50" height="50" src="Test.png" alt="">
                  <h5 class="text-center">Sara</h5>
                  <p class="text-center">Front-End-Develper</p>
                </div>

                <div class="cards col-4 ">
                    <div class="card" style="background-color: #C9D1D5">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim quia consequuntur eius, nesciunt rem!</p>
                    </div><br>
                    <img class="rounded-circle align-items-center" width="50" height="50" src="Test.png" alt="">
                    <h5 class="text-center">Sara</h5>
                    <p class="text-center">Front-End-Develper</p>
                  </div>

                  <div class="cards col-4 ">
                  <div class="card" style="background-color: #C9D1D5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam enim quia consequuntur eius, nesciunt rem!</p>
                  </div><br>
                  <img class="rounded-circle align-items-center" width="50" height="50" src="Test.png" alt="">
                  <h5 class="text-center">Sara</h5>
                  <p class="text-center">Front-End-Develper</p>
                </div>

            </div>
           </div>
        </div>
    </div> --}}


<div>
    @yield('content');
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
                        <a style="color: #C9D1D5" href="{{route('catuser')}}">HOME</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('catuser')}}">DESTINATIONS</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('catuser')}}">FESTIVALS</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('catuser')}}">SERVICES</a><br><br>
                        <a style="color: #C9D1D5" href="{{route('catuser')}}">CONTACT US</a>
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
   </footer> --}}




