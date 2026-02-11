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
                        <h5 class="card-title"></h5>
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

    <div class="container mt-5 mb-3">
  <h3 class="text-center">📈 Visitors Trend for Popular Destinations</h3>

  <!-- Bars -->
  <div class="d-flex align-items-end justify-content-around border-start border-2 border-dark border-bottom p-3" style="height:300px;">
    <div class="d-flex flex-column justify-content-end text-center bg-primary text-white fw-bold me-2" style="width:50px; height:90%;">
      <span class="mb-1">15,200</span>
    </div>
    <div class="d-flex flex-column justify-content-end text-center bg-success text-white fw-bold me-2" style="width:50px; height:75%;">
      <span class="mb-1">12,800</span>
    </div>
    <div class="d-flex flex-column justify-content-end text-center bg-warning text-dark fw-bold me-2" style="width:50px; height:60%;">
      <span class="mb-1">9,500</span>
    </div>
    <div class="d-flex flex-column justify-content-end text-center bg-danger text-white fw-bold me-2" style="width:50px; height:50%;">
      <span class="mb-1">8,000</span>
    </div>
    <div class="d-flex flex-column justify-content-end text-center bg-dark text-white fw-bold" style="width:50px; height:30%;">
      <span class="mb-1">5,000</span>
    </div>
  </div>

  <!-- Labels -->
  <div class="d-flex justify-content-around mt-2">
    <span>Pakistan</span>
    <span>Turkey</span>
    <span>Malaysia</span>
    <span>Oman</span>
    <span>China</span>
  </div>
</div>
 @endsection
