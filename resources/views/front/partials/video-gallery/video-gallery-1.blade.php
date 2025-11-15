
<section class="space bg-light" id="video-gallery-sec">
    <div class="container">
        <div class="text-center mb-5">
            <span class="sub-title fs-6 fw-semibold d-none d-md-block">Voices of Wisdom, Journeys of Change</span>
            <h3 class="sec-title  ">Our Video Gallery </h3>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>
        </div>

        <div class="swiper video-gallery-slider" id="videoSlider"
            data-slider-options='{
                "loop": true,
                "spaceBetween": 20,
                "autoplay": {
                    "delay": 3500,
                    "disableOnInteraction": false
                },
                "speed": 600,
                "breakpoints": {
                    "0": { "slidesPerView": 1 },
                    "768": { "slidesPerView": 2 }
                }
            }'>
            <div class="swiper-wrapper" id="videoSlider">
                @foreach ($galleries as $index => $gallery)
                    <div class="swiper-slide">
                        <div class="gallery-box style4 text-center">
                            <div class="gallery-img global-img position-relative papu-destination-img">
                                <img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                                <a href="{{ $gallery->video_link }}"
                                   class="icon-btn popup-video position-absolute top-50 start-50 translate-middle"
                                   style="background-color: #005EB4;">
                                    <i class="fas fa-play text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
