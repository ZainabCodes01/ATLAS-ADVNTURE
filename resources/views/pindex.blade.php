@extends('app.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
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
    </style>
</head>
<body>

            <div class="container mt-7">
                <h1 class="text-center">The Wonders of Nature</h1>
                <p class="text-center">Experience the wonders of nature with Atlas Adventure</p>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <!-- Image Section -->
                                <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->name }}" style="height: 180px; object-fit: cover;">
                                <!-- Text Section -->
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">Explore the beauty of this category.</p>
                                    <a href="{{ route('places.index', ['category_id' => $category->id]) }}" class="btn btn-primary">Discover More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>




    <div class="d-flex justify-content-center align-items-center mt-2" style="height: calc(100vh - 56px);">
        <div class="rounded-3 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.1); width: 85%; height: 450px;">

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
    </div>


</body>
</html>


@endsection
