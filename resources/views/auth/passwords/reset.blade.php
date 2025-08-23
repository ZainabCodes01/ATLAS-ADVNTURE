<h2 style="color:red">Testing Reset Password</h2>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset - Atlas Adventure</title>
    <link rel="icon" type="image/png" href="{{ asset('Atlas Adventure logo 2.png') }}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body style="background: url('{{ asset('pexels-sagui-andrea-200115-618833.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

<div class="container d-flex justify-content-center py-5">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-10">
            <div class="row g-0 shadow-lg overflow-hidden"
                 style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.15); border-radius: 20px">

                <!-- Left Side Image & Text -->
                <div class="col-md-6 d-none d-md-flex flex-column justify-content-center p-5 text-white"
                     style="background: rgba(0, 0, 0, 0.4);">
                    <h1 class="display-5 fw-bold">Reset Your Password</h1>
                    <p class="mt-3">Don’t worry! It happens to the best of us.
                        Enter your new password and get back to exploring Atlas Adventure.</p>
                </div>

                <!-- Right Side Form -->
                <div class="col-md-6 p-5 bg-white bg-opacity-75 rounded-end">
                    <h4 class="text-center mb-4">Reset Password</h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn w-100 text-light" style="background-color:#0C243C">
                            Reset Password
                        </button>
                    </form>

                    <p class="text-center mt-3">Back to <a href="{{ route('login') }}" class="text-primary">Login</a></p>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
