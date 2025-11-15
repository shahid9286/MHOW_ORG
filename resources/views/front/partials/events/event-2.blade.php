<section class="category-area3 bg-smoke space background-image arrow-wrap"
    style="background-image: url('assets/img/bg/line-pattern3.png');">
    <div class="container th-container">
        <div class="title-area text-center">
            <span class="sub-title text-white fs-6  d-none d-md-block">Mark Your Calendar and Join Us in Spreading Peace and Knowledge</span>
            <h3 class="sec-title text-white ">Upcoming Programs & Workshops</h3>
            <div class="bg-white mx-auto" style="width: 60px; height: 3px; color: #A91F21;"></div>
        </div>

        <div class="slider-area">
            <div class="swiper th-slider has-shadow category-slider2" id="categorySlider3"
                data-slider-options='{
                    "breakpoints": {
                        "0": { "slidesPerView": 1 },
                        "576": { "slidesPerView": 2 },
                        "768": { "slidesPerView": 3 },
                        "992": { "slidesPerView": 4 }
                    },
                    "spaceBetween": 10,
                    "loop": true,
                    "autoplay": {
                        "delay": 200,
                        "disableOnInteraction": false
                    },
                    "pagination": {
                        "el": ".slider-pagination",
                        "clickable": true
                    }
                }'>

                <div class="swiper-wrapper" id="swiper-wrapper-55dbfb61d3767743" aria-live="off"
                    style="transition-duration: 0ms; transform: translate3d(-2248.33px, 0px, 0px); transition-delay: 0ms;">
                    @foreach ($events as $event)
                        <div class="swiper-slide" style="width: 425.667px; margin-right: 24px;" role="group"
                            aria-label="10 / 10" data-swiper-slide-index="9">
                            <div class="category-card single2">
                                <div class="box-img global-img">
                                    <a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}">
                                        <img src="{{ asset($event->image) }}" alt="Image">
                                    </a>
                                </div>

                                <h3 class="box-title text-white"><a href="destination.html">{{ $event->title }}</a></h3>
                                <a class="line-btn text-white" href="{{ route('front.event.detail', ['slug' => $event->slug]) }}">See more</a>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- END .swiper-wrapper -->

                <div
                    class="slider-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <!-- Swiper bullets are here -->
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>

            </div> <!-- END swiper -->
        </div> <!-- END .slider-area -->
    </div> <!-- END .container -->
</section>
