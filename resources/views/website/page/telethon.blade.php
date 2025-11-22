@php use Carbon\Carbon; @endphp
@extends('front.layouts.master')

@section('content')
    {{-- <div class="container-fluid bg-black text-white py-3 text-center">
        <a onclick="$([document.documentElement, document.body]).animate({scrollTop: $('#registration-form').offset().top}, 500);"
            class="fw-bold text-white text-decoration-none" style="font-size: 18px; cursor: pointer">
            @if ($event->page_top_text)
                {{ $event->page_top_text }}
            @else
                Register Now
            @endif
        </a>
    </div> --}}

    <!-- Hero Section with 2 Columns -->
    <div class="container-fluid py-5 bg-black text-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Banner Image -->
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img src="{{ asset($event->banner_image) }}" class="img-fluid rounded shadow" alt="Event Banner" style="max-height: 500px; object-fit: cover;">
                    </div>
                </div>
                
                <!-- Right Column: Event Details -->
                <div class="col-lg-6 col-md-6">
                    <div class="ps-lg-4 ps-md-3">
                        <h1 class="fw-bold display-5 text-white mb-3">
                            @if ($event->id == 0)
                                DONATE NOW
                            @else
                                {{ $event->title ?? 'Transform Your Journey' }}
                            @endif
                        </h1>
                        
                        <h3 class="text-warning mb-4" style="font-weight: 600;">
                            {{ $event->subtitle ?? 'Spiritual Growth & Community Development' }}
                        </h3>
                        
                        <div class="mb-4 " style="font-size: 1.1rem; line-height: 1.7;">
                            @if ($event->page_form_detail)
                                {!! nl2br(e($event->page_form_detail)) !!}
                            @else
                                <p class="text-white">Join our community in pursuing knowledge, spiritual growth, and positive change. Our programs are designed to help you connect with your faith and make a meaningful impact.</p>
                                <p class="text-white">Ready to embark on this transformative adventure? Secure your spot by filling out the form. Don't miss this opportunity to invest in yourself and cultivate lasting change.</p>
                            @endif
                        </div>

                        @if (request()->is('hijrah'))
                            <div class="mt-4">
                                <a href="{{ route('front.donate.now') }}"
                                    class="btn btn-danger btn-lg px-5 py-3 fw-bold"
                                    style="background-image: linear-gradient(to top, #bc1a1d 0%, #d9191d 51%, #ecd0c0 100%); border: none; border-radius: 50px;">
                                    Donate Now
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration & Plans Section with 2 Columns -->
    <div class="py-5 bg-dark text-white" id="registration-form">
        <div class="container">
            <div class="row">
                <!-- Right Column: Subscriber Plans (Stacked Vertically) -->
                <div class="col-lg-12 col-md-12 ">
                    <div class="ps-lg-4 ps-md-3 bg-white rounded shadow p-4">
                        @if (request()->is('telethon'))
                            @include("website.partials.subscriber-plan")
                        @else
                            <!-- Default Plan Information -->
                            <div class="mb-4">
                                <h3 class="text-warning fw-bold mb-3">Event Benefits</h3>
                                <div class="d-flex flex-column gap-3">
                                    <div class="bg-dark p-4 rounded border-start border-warning border-4">
                                        <h5 class="text-white fw-bold">Spiritual Growth</h5>
                                        <p class="text-light mb-0">Deepen your connection with faith and community through guided sessions.</p>
                                    </div>
                                    <div class="bg-dark p-4 rounded border-start border-success border-4">
                                        <h5 class="text-white fw-bold">Community Network</h5>
                                        <p class="text-light mb-0">Connect with like-minded individuals on the same spiritual journey.</p>
                                    </div>
                                    <div class="bg-dark p-4 rounded border-start border-info border-4">
                                        <h5 class="text-white fw-bold">Expert Guidance</h5>
                                        <p class="text-light mb-0">Learn from experienced teachers and community leaders.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                

                
            </div>
        </div>
    </div>

    @if (request()->is('eastafrica'))
        <div class="container-fluid py-5 bg-black">
            <div class="container">
                <div class="row g-3">
                    @foreach ([1, 2, 3, 4] as $i)
                        <div class="col-12 col-sm-6 col-md-3">
                            <img src="{{ asset('website/assets/images/events/eastafrica-event-' . $i . ($i == 4 ? '.jpeg' : '.webp')) }}"
                                class="img-fluid w-100 rounded shadow" alt="Event Image {{ $i }}" style="height: 200px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <footer class="bg-black text-white pt-4 pb-5">
        <div class="container text-center">
            <small><strong>{{ $event->footer_text_1 }}</strong></small><br>
            <small>{{ $event->footer_text_2 }}</small>
        </div>
    </footer>
@endsection

@section('js')
    @if (session()->has('success') || $errors->isNotEmpty())
        <script>
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#newContent').offset().top
            }, 2000);
        </script>
    @endif
@endsection