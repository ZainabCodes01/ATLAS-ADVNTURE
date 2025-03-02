  @extends('admin.master.app')

 @section('title', 'Admin Dashboard')

 @section('content')
 <div class="container mt-4">

    <div class="row mt-3">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text text-light">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Places</h5>
                    <p class="card-text text-light">{{ $totalPlaces }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Ratings</h5>
                    <p class="card-text text-light">{{ $totalRatings }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Galleries</h5>
                    <p class="card-text text-light">{{ $totalGalleries }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Countries -->
    <div class="mt-2">
        <h4>🎇Featured Countries</h4>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('Malaysia.png')}}" class="card-img-top" alt="Destination">
                    <div class="card-body">
                        <h5 class="card-title">Malaysia</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('assets/img/1740554304_pexels-wasifmehmood997-15826125.jpg')}}" class="card-img-top" alt="Destination">
                    <div class="card-body">
                        <h5 class="card-title">Pakistan</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('assets/img/1739847294_pexels-freestockpro-2166553.jpg')}}" class="card-img-top" alt="Destination">
                    <div class="card-body">
                        <h5 class="card-title">Indonesia</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🌍 Popular Travel Destinations -->
    <div class="mt-3">
        <h4 >🌍 Popular Travel Destinations</h4>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Destination</th>
                    <th>Country</th>
                    <th>Visitors</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="Pakistan.jpg" alt="Istanbul" class="img-thumbnail" width="50">Badshahi Mosque</td>
                    <td>Pakistan</td>
                    <td>50,000</td>
                    <td>⭐⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><img src="turkey.jpg" alt="Istanbul" class="img-thumbnail" width="50"> Istanbul</td>
                    <td>Turkey</td>
                    <td>22,500</td>
                    <td>⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><img src="Twin Tower.png" alt="Malaysia" class="img-thumbnail" width="50">Twin Tower</td>
                    <td>Malaysia</td>
                    <td>9,200</td>
                    <td>⭐⭐⭐⭐</td>
                </tr>
                <tr>
                    <td><img src="Sultan Qaboos.jpg" alt="Oman" class="img-thumbnail" width="50"> Sultan Qaboos</td>
                    <td>Oman</td>
                    <td>8,800</td>
                    <td>⭐⭐⭐⭐</td>
                </tr>


                <tr>
                    <td><img src="Beijing.jpg" alt="Istanbul" class="img-thumbnail" width="50">Beijing</td>
                    <td>China</td>
                    <td>5,000</td>
                    <td>⭐⭐⭐</td>
                </tr>
            </tbody>
        </table>
    </div>

    <style>
        .bar-container {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 300px;
            width: 100%;
            border-left: 2px solid #333;
            border-bottom: 2px solid #333;
            padding: 10px;
            margin-top: 20px;
        }
        .bar {
            width: 50px;
            text-align: center;
            color: white;
            font-size: 14px;
            margin: 0 5px;
            transition: 0.3s;
        }
        .bar:hover {
            opacity: 0.8;
        }
    </style>
<div class="container mt-5 mb-3">
    <h3 class="text-center">📈 Visitors Trend for Popular Destinations</h3>
    <div class="bar-container">
        <div class="bar bg-primary" style="height: 90%;">15,200</div>
        <div class="bar bg-success" style="height: 75%;">12,800</div>
        <div class="bar bg-warning" style="height: 60%;">9,500</div>
        <div class="bar bg-danger" style="height: 50%;">8,000</div>
        <div class="bar bg-dark" style="height: 30%;">5,000</div>
    </div>
    <div class="d-flex justify-content-around mt-2">
        <span>Pakistan</span>
        <span>Turkey</span>
        <span>Malaysia</span>
        <span>Oman</span>
        <span>China</span>
    </div>
</div>
 @endsection
