<style>
    .papu-destination-img {
    height: 80vh; /* or 100vh if full screen */
    overflow: hidden;
}
.papu-destination-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


</style>
<div class="destination-area position-relative overflow-hidden mt-5">
    <div class="container">
        <div class="title-area text-center">
          <span class="sub-title">Inspiring Minds, Spreading Peace, and Building Better Lives Worldwide</span>
            <h4 class="sec-title">Global Events & Workshops</h3>

        </div>
        <div class="swiper th-slider destination-slider" id="aboutSlider1"
          data-slider-options='{
                "breakpoints": {
                    "0": { "slidesPerView": 1 },
                    "576": { "slidesPerView": 2 },
                    "992": { "slidesPerView": 3 },
                    "1200": { "slidesPerView": 3 }
                },
                "effect": "coverflow",
                "coverflowEffect": {
                    "rotate": 0,
                    "stretch": 50,
                    "depth": 170,
                    "modifier": 1
                },
                "centeredSlides": true,
                "speed": 300,
                "autoplay": {
                    "delay": 2000,
                    "disableOnInteraction": false
                }
                }'
            >
            <div class="swiper-wrapper">
                @foreach ($events as $event)
                    <div class="swiper-slide">
                    <div class="destination-box gsap-cursor">
                            <a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}">
                        <div class="destination-img papu-destination-img">
                                <img src="{{ asset($event->image) }}" alt="destination image">
                        </div>
                            </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
