<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Atlas Adventure</title>
    <link rel="icon" type="image/png" href="{{ asset('Atlas Adventure logo 2.png') }}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body style="background: url('{{ asset('pexels-sagui-andrea-200115-618833.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-10">
            <div class="row g-0 shadow-lg overflow-hidden"
                 style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.15); border-radius: 20px;">

                <!-- Left Side -->
                <div class="col-md-6 d-flex flex-column justify-content-center text-white p-5"
                     style="background: rgba(0,0,0,0.4); border-radius: 20px 0 0 20px;">
                    <h1 class="fw-bold display-5">Explore Atlas Adventure</h1>
                    <p class="lead">Adventure begins the moment you log in.
                        Discover places you've only dreamed of — it’s all just a click away.
                    </p>
                </div>

                <!-- Right Side -->
                <div class="col-md-6 d-flex justify-content-center align-items-center p-4"
                     style="background: #ffffff; border-radius: 0 20px 20px 0;">
                    <div class="w-100">

                        <!-- Header -->
                        <div class="text-center fw-bold mb-4"
                             style="font-size: 1.5rem; color: #0C243C;">
                            🔑 {{ __('Reset Password') }}
                        </div>

                        <!-- Body -->
                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-dark">
                                    {{ __('Email Address') }}
                                </label>
                                <input id="email" type="email"
                                       class="form-control border shadow-sm @error('email') is-invalid @enderror"
                                       placeholder="Enter your email"
                                       name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn px-5 py-2 rounded-pill shadow-sm"
                                        style="background: linear-gradient(90deg, #1d72b8, #007bff); color: #fff; font-weight: 600;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div> <!-- End Right Side -->

            </div> <!-- End Row -->
        </div>
    </div>
</div>

</body>
</html>
