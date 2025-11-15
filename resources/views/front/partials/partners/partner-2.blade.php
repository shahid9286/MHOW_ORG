<section class="position-relative bg-top-center overflow-hidden space " id="service-sec"
    data-bg-src="assets/img/bg/tour_bg_1.jpg">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-area text-center">
                    <span class="sub-title d-none d-md-block fw-semibold fs-6">Creating Global Impact Through Shared Vision and Values</span>
                    <h3 class="sec-title">Our Supporting Partners</h3>
                    <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-md-3">
                    <div class="tour-box th-ani gsap-cursor">
                        <div class="global-img">
                            <img src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}"
                                alt="{{ $partner->title }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section>