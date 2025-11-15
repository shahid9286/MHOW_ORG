<section class="overflow-hidden mt-5" id="blog-sec">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-area text-center">
                    <span class="sub-title">Uplifting Communities Through Knowledge, Kindness, and Care</span>
                    <h4 class="sec-title">Building a Better World Together</h2>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">

                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <div class="blog-box th-ani">
                                <div class="blog-img global-img">
                                    <img src="{{ asset($project->image) }}" alt="project image">
                                </div>
                                <div class="blog-box_content">
                                    <h3 class="box-title"><a href="{{ route('front.project.detail', ['slug' => $project->slug]) }}">{{ $project->name }}</a></h3>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
