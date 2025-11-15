<section class="position-relative bg-top-center overflow-hidden space" id="service-sec"
    data-bg-src="assets/img/bg/tour_bg_1.jpg">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-area text-center">
                    <span class="sub-title">Uplifting Communities Through Knowledge, Kindness, and Care</span>
                    <h4 class="sec-title">Building a Better World Together</h2>
                </div>
            </div>
        </div>
        <div class="slider-area tour-slider ">
            <div class="swiper th-slider has-shadow"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1300":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">

                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <div class="tour-box th-ani gsap-cursor">
                                <div class="tour-box_img global-img">
                                    <img src="{{ asset($project->image) }}" alt="image">
                                </div>
                                <div class="tour-content text-center">
                                    <h3 class="box-title"><a href="tour-details.html">{{ $project->name }}</a></h3>
                                    <div class="tour-action text-center">
                                        <a href="tour-details.html" class="th-btn style4 th-icon">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section>
