@foreach ($page->sections as $section)
    <section class="about-one about-one--about {{ $loop->iteration != 1 ? 'pt-0' : '' }}">
        <div class="container">
            <div class="row">
                @if ($section->type == 'R-2-L')
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
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
                                <p class="about-one__content__text">
                                    {!! $section->description !!}
                                </p>
                            @endif

                            <div class="about-one__content__border"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 align-self-center">
                        <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                @if (!empty($section->image))
                                    <img src="{{ asset($section->image) }}" alt="careox">
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6 align-self-center">
                        <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                @if (!empty($section->image))
                                    <img src="{{ asset($section->image) }}" alt="careox">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
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
                                <p class="about-one__content__text">
                                    {!! $section->description !!}
                                </p>
                            @endif

                            <div class="about-one__content__border"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endforeach
