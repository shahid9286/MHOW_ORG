<section class="position-relative overflow-hidden space" id="destination-sec">
    <div class="container">
        <div class="row gy-4 gx-4">
            <div class="title-area text-center mb-0">
                <span class="sub-title fs-6 fw-semibold  d-none d-md-block">Mark Your Calendar and Join Us in Spreading Peace and Knowledge</span>
                <h3 class="sec-title mb-3">Upcoming Programs & Workshops</h3>
                <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

            </div>

            @foreach ($events as $event)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="destination-item th-ani">
                        <div class="destination-item_img global-img">
                            <img src="{{ asset($event->image) }}" alt="image">
                        </div>
                        <div class="destination-content"
                            style="background-color: #063A68; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                            <h3 class="box-title mb-2 text-white"><a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}">{{ $event->title }}</a></h3>
                            <a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}" class="th-btn th-icon" style="background-color: #A91F21;">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>




