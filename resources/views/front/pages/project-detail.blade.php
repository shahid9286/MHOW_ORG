@extends('front.layouts.master')

@section('title', 'Global Peace Workshop | Mhow.org')

@section('content')
    <!-- Hero Section -->
    <section class="hero-area position-relative overflow-hidden" style="background: url('{{ asset('website/assets/img/event/hero-bg.jpg') }}') center/cover no-repeat;">
        <div class="container text-center text-white py-5">
            <h1 class="display-4 fw-bold">Global Peace Workshop 2025</h1>
            <p class="lead mt-2">Empowering minds and spreading harmony through learning</p>
        </div>
    </section>

    <!-- About Event -->
    <section class="space">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <img src="{{ asset('website/assets/img/event/about.jpg') }}" class="rounded-3 shadow w-100" alt="Event Image">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-3">About the Event</h2>
                    <p class="mb-3">Join us for an enlightening workshop that focuses on global peacebuilding, leadership, and mindfulness. This one-day event brings together thinkers, educators, and youth from around the world to share perspectives and create solutions for a peaceful future.</p>

                    <ul class="list-unstyled mb-4">
                        <li><strong>Date:</strong> January 25, 2025</li>
                        <li><strong>Venue:</strong> Mhow Conference Hall, Dubai</li>
                        <li><strong>Duration:</strong> 1 Day (9:00 AM – 5:00 PM)</li>
                    </ul>

                    <a href="#" class="th-btn th-icon" style="background-color:#A91F21;">Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="space bg-light">
        <div class="container text-center">
            <h3 class="sec-title mb-4">Event Gallery</h3>
            <div class="row g-3">
                <div class="col-md-4"><img src="{{ asset('website/assets/img/event/gallery1.jpg') }}" class="rounded-3 w-100" alt=""></div>
                <div class="col-md-4"><img src="{{ asset('website/assets/img/event/gallery2.jpg') }}" class="rounded-3 w-100" alt=""></div>
                <div class="col-md-4"><img src="{{ asset('website/assets/img/event/gallery3.jpg') }}" class="rounded-3 w-100" alt=""></div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="space">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="sec-title">Event Schedule</h3>
                <p>Here’s what you can expect during the day</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="timeline">
                        <div class="timeline-item mb-4">
                            <h5>Opening Ceremony</h5>
                            <p>9:00 AM – Welcome note and keynote session by global peace leaders.</p>
                        </div>
                        <div class="timeline-item mb-4">
                            <h5>Panel Discussion</h5>
                            <p>11:00 AM – Collaborative dialogue on cultural harmony and leadership.</p>
                        </div>
                        <div class="timeline-item mb-4">
                            <h5>Networking Lunch</h5>
                            <p>1:00 PM – Connect with like-minded individuals over a meal.</p>
                        </div>
                        <div class="timeline-item">
                            <h5>Closing Ceremony</h5>
                            <p>4:00 PM – Certificates distribution and closing remarks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Events -->
    <section class="space bg-light">
        <div class="container text-center">
            <h3 class="sec-title mb-4">Related Events</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="destination-item">
                        <div class="destination-item_img global-img">
                            <img src="{{ asset('website/assets/img/event/related1.jpg') }}" alt="image">
                        </div>
                        <div class="destination-content" style="background-color:#063A68;">
                            <h4 class="text-white mb-2">Leadership Forum</h4>
                            <a href="#" class="th-btn th-icon" style="background-color:#A91F21;">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="destination-item">
                        <div class="destination-item_img global-img">
                            <img src="{{ asset('website/assets/img/event/related2.jpg') }}" alt="image">
                        </div>
                        <div class="destination-content" style="background-color:#063A68;">
                            <h4 class="text-white mb-2">Education for Peace</h4>
                            <a href="#" class="th-btn th-icon" style="background-color:#A91F21;">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="destination-item">
                        <div class="destination-item_img global-img">
                            <img src="{{ asset('website/assets/img/event/related3.jpg') }}" alt="image">
                        </div>
                        <div class="destination-content" style="background-color:#063A68;">
                            <h4 class="text-white mb-2">Mindfulness Workshop</h4>
                            <a href="#" class="th-btn th-icon" style="background-color:#A91F21;">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
