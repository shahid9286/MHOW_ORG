<style>
    .papu-destination-img {
        height: 80vh;
        /* or 100vh if full screen */
        overflow: hidden;
    }

    .papu-destination-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="destination-area position-relative overflow-hidden mt-5">
    <div class="container pb-5">
        <div class="title-area text-center">
            <span class="sub-title fs-6 fw-semibold  d-none d-md-block">Uplifting Communities Through Knowledge, Kindness, and Care</span>
            <h3 class="sec-title">Building a Better World Together</h3>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>
        </div>
        <div class="swiper th-slider" id="aboutSlider9">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <div class="swiper-slide">
                        <div class="destination-box gsap-cursor">
                            <a href="{{ route('front.project.detail', ['slug' => $project->slug]) }}">
                                <div class="destination-img papu-destination-img">
                                    <img src="{{ asset($project->image) }}" alt="destination image">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>