@extends('app.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:70vh;">
  <div class="col-md-6">
    <div class="card shadow-lg border-0 rounded-4" style="background: #102a44; color: #C9D1D5;">

        <!-- Header -->
        <div class="card-header text-center fw-bold border-0 rounded-top-4"
             style="background: linear-gradient(135deg, #0C243C, #173B5C); color: #ffffff; font-size: 1.2rem;">
            🔑 {{ __('Reset Password') }}
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold text-light">
                        {{ __('Email Address') }}
                    </label>
                    <input id="email" type="email" style="color: #C9D1D5;"
                           class="form-control text-dark border-0 shadow-sm @error('email') is-invalid @enderror"
                           placeholder="Enter your email"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="text-center">
                    <button type="submit" class="btn px-5 py-2 rounded-pill shadow-sm"
                            style="background: linear-gradient(90deg, #1d72b8, #007bff); color: #fff; font-weight: 600;">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection
