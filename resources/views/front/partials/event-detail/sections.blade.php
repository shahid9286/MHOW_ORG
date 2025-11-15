@foreach ($page->sections as $section)
    <div class="about-area position-relative space" id="about-sec">
        <div class="container shape-mockup-wrap">
            <div class="row">
                @if ($section->type == 'R-2-L')
                    <div class="col-xl-5">
                        <div class="img-box3">
                            <div class="img1"><img src="{{ asset($section->image) }}" alt="About"></div>
                        </div>
                    </div>
                    <div class="col-xl-7 align-self-center">
                        <div class="ps-xl-4">
                            <div class="title-area mb-20"><span class="sub-title style1">{{ $section->subtitle }}</span>
                                <h2 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">{{ $section->title }}
                                </h2>
                            </div>
                            <p class="pe-xl-5">{!! $section->description !!}</p>
                        </div>
                    </div>
                @else
                    <div class="col-xl-7 align-self-center">
                        <div class="ps-xl-4">
                            <div class="title-area mb-20"><span class="sub-title style1">{{ $section->subtitle }}</span>
                                <h2 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">{{ $section->title }}
                                </h2>
                            </div>
                            <p class="pe-xl-5">{!! $section->description !!}</p>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="img-box3">
                            <div class="img1"><img src="{{ asset($section->image) }}" alt="About"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
