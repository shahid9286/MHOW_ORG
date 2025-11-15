<div class="brand-area overflow-hidden space-bottom">
    <div class="container th-container">
        <div class="text-center text-md-start pt-5 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 text-center">
                    <div class="title-area mb-md-0">
                         <h4 class="sec-title">Our Supporting Partners</h2>
                    <p class="sec-text">Creating Global Impact Through Shared Vision and Values</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper th-slider brandSlider1" id="brandSlider1"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"4"}}}'>
            <div class="swiper-wrapper">

                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="brand-box">
                            <a href="">
                                <img class="original"
                                    src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}"
                                    alt="{{ $partner->title }}" width="300px">
                                <img class="gray" src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}"
                                    alt="{{ $partner->title }}" width="300px">
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
