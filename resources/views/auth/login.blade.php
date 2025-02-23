<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Atlas Adventure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-lg-10 d-flex shadow overflow-hidden">
                <!-- Left Side Image -->
                <div class="col-md-6 d-none d-md-block text-white d-flex align-items-center justify-content-center"
                    style="background: url('LahorePakistan.jpeg') no-repeat center center; background-size: cover;">
                    <h2 class="fw-bold text-center bg-dark bg-opacity-50 p-3 rounded">Welcome to Atlas Adventure</h2>
                </div>

                <!-- Right Side Form -->
                <div class="col-md-6 p-5" style="background-color:#C9D1D5;">
                    <h4 class="text-center mb-4">Sign In</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                    <p class="text-center mt-3">By signing up, you agree to our Terms & Conditions. </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
