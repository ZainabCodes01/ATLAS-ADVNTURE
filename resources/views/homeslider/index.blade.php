@extends('app.master')

@section('content')
<div id="carouselExample" class="carousel slide mt-55px" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ( $sliders as $key => $slider)
        <div class="carousel-item {{$key == 0 ? 'active':''}}">
            @if ($slider->image)
            <img src="{{asset("$slider->image")}}" class="d-block w-100" alt="Slide 1" style="height: 80vh; object-fit: cover;">
            @endif
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
              <h1>{{$slider->description}}</h1>
              {{-- <p>Experience the beauty and culture of Pakistan.</p> --}}
            </div>
          </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
