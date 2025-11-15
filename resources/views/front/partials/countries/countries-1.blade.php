<section class="category-area bg-top-center" data-bg-src="assets/img/bg/category_bg_1.png">
    <div class="container th-container">
        <div class="title-area text-center">
            <span class="sub-title fs-6 d-none d-md-block">Spreading Peace, Knowledge, and Compassion Across Borders</span>
            <h4 class="sec-title">Our Global Impact</h2>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

        </div>
        <div class="swiper categorySlider" id="categorySlide">
            <div class="swiper-wrapper">

                @foreach ($countries as $country)
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img">
                                <img src="{{ asset($country->icon) }}" alt="{{ $country->name }}">
                            </div>
                            <h3 class="box-title">{{ $country->name }}</h3>
                            {{-- <a class="line-btn" href="destination.html">See more</a> --}}
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>