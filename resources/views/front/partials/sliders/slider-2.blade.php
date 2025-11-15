<div class="th-hero-wrapper hero-1" id="hero">
    <div class="swiper th-slider hero-slider-1" id="heroSlide1"
        data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
        <div class="swiper-wrapper" style="max-height: 100vh;">


            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="{{ asset('assets/admin/img/slider/' . $slider->image) }}">
                        </div>
                        <div class="container">
                            <div class="hero-style1">
                                {{-- <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">{{ $slider->sub_title }}</span> --}}
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">
                                    {{ $slider->title }} </h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                    <a href="tour.html" class="th-btn th-icon">Explore Tours</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="th-swiper-custom">
            <button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev"><img
                    src="{{ asset('front') }}/img/icon/right-arrow.svg" alt=""></button>
            <div class="slider-pagination"></div>
            <button data-slider-next="#heroSlide1" class="slider-arrow slider-next"><img
                    src="{{ asset('front') }}/img/icon/left-arrow.svg" alt=""></button>
        </div>

    </div>
</div>
