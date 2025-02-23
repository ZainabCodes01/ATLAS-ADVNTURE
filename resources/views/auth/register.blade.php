<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="row g-0">
                    <!-- Left Side Image -->
                    <div class="col-md-6 d-none d-md-block text-white d-flex align-items-center justify-content-center"
                    style="background: url('{{ asset('LahorePakistan.jpeg') }}') no-repeat center center; background-size: cover;">
                    <h2 class="fw-bold text-center bg-dark bg-opacity-50 p-3 rounded">Welcome to Atlas Adventure</h2>
                    </div>



                    <!-- Right Side Form -->
                    <div class="col-md-6 p-5" style="background-color:#C9D1D5;">
                        <!-- Tabs for Sign Up / Sign In -->
                        <ul class="nav nav-tabs nav-fill mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#signup">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#signin">Sign In</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <!-- Sign Up Form -->
                            <div class="tab-pane fade show active" id="signup">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                </form>
                            </div>

                            <!-- Sign In Form -->
                            <div class="tab-pane fade" id="signin">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">By signing up, you agree to our Terms & Conditions.</small>
                        </div>
                    </div> <!-- Right Side End -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
