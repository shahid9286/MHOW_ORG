@foreach ($page->sections as $section)
    <section class="pt-5">
        <div class="container">
            <div class="row">
                @if ($section->type == 'R-2-L')
                    <div class="col-xl-6 align-self-center">
                        <div class="title-area">
                            @if (!empty($section->subtitle))
                                <span
                                    class="sub-title fs-6 fw-semibold  d-none d-md-block">{{ $section->subtitle }}</span>
                            @endif
                            @if (!empty($section->title))
                                <h4 class="sec-title pb-0">{{ $section->title }}</h4>
                            @endif
                            <div style="width: 60px; height: 3px; background-color: #A91F21;"></div>
                        </div>

                        @if (!empty($section->description))
                            {!! $section->description !!}
                        @endif
                    </div>

                    <div class="col-xl-6 align-self-center">
                        @if (!empty($section->image))
                            <img src="{{ asset($section->image) }}" alt="careox">
                        @endif
                    </div>
                @else
                    <div class="col-xl-6 align-self-center">
                        @if (!empty($section->image))
                            <img src="{{ asset($section->image) }}" alt="careox">
                        @endif
                    </div>

                    <div class="col-xl-6 align-self-center">
                        <div class="title-area">
                            @if (!empty($section->subtitle))
                                <span
                                    class="sub-title fs-6 fw-semibold  d-none d-md-block">{{ $section->subtitle }}</span>
                            @endif
                            @if (!empty($section->title))
                                <h4 class="sec-title pb-0">{{ $section->title }}</h4>
                            @endif
                            <div style="width: 60px; height: 3px; background-color: #A91F21;"></div>
                        </div>

                        @if (!empty($section->description))
                            {!! $section->description !!}
                        @endif

                    </div>
                @endif
            </div>
        </div>
    </section>
@endforeach
