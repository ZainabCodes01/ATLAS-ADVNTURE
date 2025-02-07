@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <div class="card p-5 shadow-lg" style="width: 450px; border-radius: 12px;">
        <h3 class="text-center mb-4 text-dark">{{ __('Dashboard') }}</h3>

        @if (session('status'))
            <div class="alert alert-success text-center fs-5" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p class="text-center fs-5 text-dark">{{ __('You are logged in!') }}</p>
    </div>
</div>

@endsection
