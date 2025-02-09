@php
    use App\Models\Categories;
    $categories = Categories::all();
@endphp
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

 <!-- Categories -->
 @foreach($categories as $category)
    <div class="category-card">
        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
        <h3>{{ $category->name }}</h3>
        <button class="category-btn" data-id="{{ $category->id }}">View Places</button>
    </div>
@endforeach

<div id="places-container"></div>

<script>
  $(document).ready(function() {
    $('.category-btn').click(function() {
        var categoryId = $(this).data('id');

        $.ajax({
            url: '/places/' + categoryId,
            type: 'GET',
            success: function(data) {
                var html = '';
                if (data.length > 0) {
                    data.forEach(place => {
                        html += `<div class="place-card">
                            <img src="${place.image}" alt="${place.name}">
                            <h4>${place.name}</h4>
                            <p>${place.description}</p>
                            <a href="/place/${place.id}">View More</a>
                        </div>`;
                    });
                } else {
                    html = '<p>No places found for this category.</p>';
                }
                $('#places-container').html(html);
            },
            error: function() {
                alert('Error fetching places');
            }
        });
    });
});

</script>

@endsection
