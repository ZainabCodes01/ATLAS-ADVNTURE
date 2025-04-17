<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Atlas Adventure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: url('{{ asset('pexels-sagui-andrea-200115-618833.jpg') }}') center center / cover no-repeat; min-height: 100vh;">

    <div class="container  d-flex justify-content-center py-5">
        <div class="row w-100 justify-content-center">
            <div class="col-lg-10">
                <div class="row g-0 rounded-4 shadow-lg overflow-hidden" style="backdrop-filter: blur(6px); background-color: rgba(255, 255, 255, 0.15);">
                      <!-- Left Side Image -->
                      <div class="col-md-6 d-none d-md-flex flex-column justify-content-center p-5 text-white" style="background: rgba(0, 0, 0, 0.4);">
                        <h1 class="display-5 fw-bold">Explore Atlas Adventure</h1>
                        <p class="mt-3">Adventure begins the moment you log in. Discover places you've only dreamed of — it's all just a click away.</p>

                   </div>
                    <!-- Right Side Form -->
            <div class="col-md-6 p-5  bg-white bg-opacity-75 rounded-end" >
                <h4 class="text-center mb-4">Sign In</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-strat mt-2 mb-2">
                        <a href="{{route('password.request')}}" class="text-primary">Forget Password?</a>
                    </div>
                    <button type="submit" class=" text-light btn w-100" style="background-color:#0C243C">Sign In</button>
                </form>

                <p class="text-center mt-3">By signing up, you agree to our Terms & Conditions.</p>
            </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
