<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atlas Adventure Register</title>
  <link rel="icon" type="image/png" href="{{ asset('Atlas Adventure logo 2.png') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body style="background: url('{{ asset('pexels-sagui-andrea-200115-618833.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

   <div class="container d-flex justify-content-center py-5">
  <div class="row w-100 justify-content-center">
    <div class="col-lg-10">
      <div class="row g-0 shadow-lg overflow-hidden" 
           style="border-radius: 20px; backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.15);">
           
        <!-- Left Side Welcome Text -->
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center p-5 text-white" 
             style="background: rgba(0, 0, 0, 0.4);">
          <h1 class="display-5 fw-bold">Explore Horizons</h1>
          <p class="mt-3">Where your dream destinations become reality.</p>
          <p class="small">Embark on a journey where every corner of the world is within your reach.</p>
        </div>

        <!-- Right Side Form -->
        <div class="col-md-6 p-5 bg-white bg-opacity-75">
          <!-- Tabs -->
          <ul class="nav nav-tabs nav-fill mb-3">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="tab" href="#signup">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#signin">Sign In</a>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="signup">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                         name="name" value="{{ old('name') }}" required>
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}" required>
                  @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                         name="password" required>
                  @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" style="background-color: #0C243C" class="btn text-light w-100">Sign Up</button>
              </form>
            </div>

            <!-- Sign In -->
            <div class="tab-pane fade" id="signin">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}" required>
                  @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                         name="password" required>
                  @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                  <small><a href="{{ route('password.request') }}">Forgot password?</a></small>
                </div>

                <button type="submit" style="background-color: #0C243C" class="btn text-light w-100">Sign In</button>
              </form>
            </div>
          </div>

          <div class="text-center mt-4">
            <small class="text-muted">By signing up, you agree to our Terms & Conditions.</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>


