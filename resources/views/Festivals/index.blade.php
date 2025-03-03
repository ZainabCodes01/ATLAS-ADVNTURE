@extends('app.master')
@section('content')

<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('Festival.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">Celebrate Cultures, Embrace Traditions!</h1>
        <p class="text-light">Experience the world's most vibrant festivals and timeless traditions.</p>

    </div>
</div>



<div class="container">
    <h6 class="text-center text-danger mt-5">___EXPLORE COUNTRY FETE</h6>
    <h2 class="text-center">FESTIVALS</h2>

    <!-- Bootstrap Tabs for Countries -->
    <ul class="nav nav-tabs justify-content-center" id="festivaltabs">
        @foreach($countries as $countrie)
            <li class="nav-item">
                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                    data-bs-toggle="tab" data-bs-target="#country-{{ $countrie->id }}" role="tab">
                     {{ $countrie->name }}
                 </a>
            </li>
        @endforeach
    </ul>

    <!-- Content Area for Foods -->
    <div class="tab-content mt-4 w-100">
        @foreach($countries as $countrie)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="country-{{ $countrie->id }}">
                <div class="row ms-5 me-5">
                    @php
                        $countryFestivals = $places->where('country_id', $countrie->id);
                    @endphp

                    @if($countryFestivals->isEmpty())
                        <p class="text-center">No Festivals found for this country.</p>
                    @else
                        @foreach($countryFestivals as $place)
                            <div class="col-md-4">
                                <div class="card shadow-sm mb-4">
                                    <img src="{{  $place->thumbnail }}" class="card-img-top" alt="{{ $place->name }}" style="height: 200px; object-fit: cover;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold text-dark">{{ $place->name }}</h5>
                                        <a href="{{ route('foods.show', $place->id) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection
