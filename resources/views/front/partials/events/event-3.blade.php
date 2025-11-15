<div class="destination-area13 position-relative overflow-hidden space-top arrow-wrap">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title fs-6 fw-semibold d-none d-md-block ">Inspiring Minds, Spreading Peace, and Building Better Lives Worldwide</span>
            <h3 class="sec-title">Global Events & Workshops</h3>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

        </div>
        <div class="slider-area">
            <div class="swiper th-slider project-slider2" id="project-slider2">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        <div class="swiper-slide">
                            <a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}"
                                class="destination-box3 text-decoration-none">
                                <div class="destination-img">
                                    <img src="{{ asset($event->image) }}" alt="{{ $event->title ?? 'Project image' }}">
                                </div>
                                <div class="text-black text-center fs-4 mt-2">
                                    {{ $project->title ?? '' }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="icon-box mt-60 text-center">
                <button data-slider-prev="#project-slider2" class="slider-arrow style6 default btn btn-outline-light rounded-circle mx-2">
                    <i class="fas fa-chevron-left fs-4 text-light  mb-2"></i>
                </button>
                <button data-slider-next="#project-slider2" class="slider-arrow style6 default btn btn-outline-light rounded-circle mx-2 ">
                    <i class="fas fa-chevron-right fs-4 text-light mb-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>