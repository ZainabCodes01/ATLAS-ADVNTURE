@extends('app.master')
@section('content')
<div class="hero-section text-center text-white d-flex align-items-center justify-content-center" style="background: url('{{ asset('About us.png') }}') center/cover no-repeat; height: 60vh;">
    <div class="overlay" style=" width: 100%; height: 100%; position: absolute;"></div>
    <div class="container position-relative">
        <h1 class="fw-bold display-4">About Us</h1>
    </div>
</div>

<!-- Our Story -->
<section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h6 class="text-danger mt-5 fw-bold">___Atlas Adventure</h6>
            <h2>OUR STORY</h2>
            <p>At Atlas Adventure, we make exploring South Asia easy, immersive, and unforgettable. From the mountains of Nepal to the beaches of Sri Lanka, we connect travelers with authentic experiences, rich cultures, and seamless bookings.</p>
            <p>Our passion for travel drives us to uncover hidden gems, local traditions, and must-visit destinations. Whether you're seeking adventure or cultural insights, we’re here to guide you every step of the way.</p>
        </div>
        <div class="col-md-6">
            <img src="{{asset('Our Team.jpg')}}" class="img-fluid rounded shadow" alt="Our Story">
        </div>
    </div>
</section>

<!-- What We Offer -->
<section class="bg-light mt-5 mb-5">
    <div class="container text-center" style="background-color: #C9D1D5; width: 100%;">
        <h6 class="text-danger fw-bold">___OUR SERVICES</h6>
        <h2 class="mb-4">WHAT WE OFFER</h2>
        <div class="row">
            <div class="col-md-3">
                <i class="bi bi-globe2 display-4 text-primary"></i>
                <h4 class="mt-3">Travel Guides</h4>
                <p>Comprehensive guides to top South Asian destinations.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-calendar-check display-4 text-primary"></i>
                <h4 class="mt-3">Booking Services</h4>
                <p>Easy and secure booking for hotels & tours.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-people display-4 text-primary"></i>
                <h4 class="mt-3">Cultural Insights</h4>
                <p>Experience South Asian traditions like never before.</p>
            </div>
            <div class="col-md-3">
                <i class="bi bi-star display-4 text-primary"></i>
                <h4 class="mt-3">Personalized Trips</h4>
                <p>Get custom recommendations for your perfect trip.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<div class="container text-center">
    <h6 class="text-danger text-uppercase fw-bold">___Testimonial</h6>
    <h1 class="mb-4">What Our Clients Say</h1>

    <div class="row mt-4">
        @php
            $testimonials = [
                ["name" => "Robert Holland", "image" => "Testimonial1.jpg", "rating" => 4],
                ["name" => "William Wright", "image" => "Testimonial2.jpg", "rating" => 4.5],
                ["name" => "Alison Hobb", "image" => "Testimonial3.jpg", "rating" => 4],
            ];
        @endphp

        @foreach($testimonials as $testimonial)
            <div class="col-md-4">
                <div class="card border-0 shadow-lg p-4 position-relative overflow-hidden"
                     style="border-radius: 20px; transition: transform 0.3s, box-shadow 0.3s;">
                    <div class="d-flex justify-content-center">
                        <img src="{{ $testimonial['image'] }}" class="rounded-circle border border-success border-3 shadow-lg"
                             width="90" height="90">
                    </div>
                    <h5 class="mt-3 fw-bold text-primary">{{ $testimonial['name'] }}</h5>
                    <p class="text-muted fst-italic">
                        "Atlas Adventure made travel planning so easy! Their guides and bookings helped me explore South Asia stress-free. Highly recommended!"
                    </p>
                    <div class="text-warning">
                        @php
                            $fullStars = floor($testimonial['rating']);
                            $halfStar = ($testimonial['rating'] - $fullStars) > 0 ? true : false;
                        @endphp
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        @if($halfStar)
                            <i class="fas fa-star-half-alt"></i>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<!-- Call to Action -->
<section style="background-color:#C9D1D5;" class="text-center py-5 text-dark mt-5">
    <h2>Ready for Your Next Adventure?</h2>
    <p>Join our community & explore Subcontinent Asia like never before.</p>
    <a href="{{route('categories.user')}}" class="btn btn-light btn-lg">Explore Destinations</a>
</section>
@endsection
