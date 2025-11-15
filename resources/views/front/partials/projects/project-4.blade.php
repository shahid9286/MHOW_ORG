<div class="destination-area13 position-relative overflow-hidden space-top arrow-wrap">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title fw-semibold fs-6 d-none d-md-block">Uplifting Communities Through Knowledge, Kindness, and Care</span>
            <h3 class="sec-title  ">Building a Better World Together</h3>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

        </div>

        <div class="slider-area">
            <div class="swiper th-slider project-slider" id="project-slider">
                <div class="swiper-wrapper">
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <a href="{{ route('front.project.detail', ['slug' => $project->slug]) }}" class="destination-box3 text-decoration-none">
                                <div class="destination-img">
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->name ?? 'Project image' }}">
                                </div>
                                <div class="text-black text-center fs-4 mt-2">
                                    {{ $project->name ?? '' }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="icon-box mt-60 text-center">
                <button data-slider-prev="#project-slider" class="slider-arrow style6 default">
                    <img src="assets/img/icon/right-arrow2.svg" alt="Previous">
                </button>
                <button data-slider-next="#project-slider" class="slider-arrow style6 default">
                    <img src="assets/img/icon/left-arrow2.svg" alt="Next">
                </button>
            </div>
        </div>
    </div>
</div>
