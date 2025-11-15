@php
    $section_title = App\Models\SectionTitle::where('type', 'element')->first();
    $colors = ['#ffa415', '#fc5528', '#8139e7', '#44c895', '#399be7', '#d340c3'];
@endphp

@foreach ($page->elements ?? [] as $element)
    <section class="tab-one">
        <div class="container">
            <div class="title-area text-center">
                @if (!empty($section_title->subtitle))
                    <span class="sub-title">{{ $section_title->subtitle }}</span>
                @endif
                @if (!empty($section_title->title))
                    <h4 class="sec-title">{{ $section_title->title }}</h2>
                @endif
            </div>

            <div class="tab-one__wrapper tabs-box">
                <div class="tabs-content">
                    <div class="tab fadeInUp animated active-tab" id="medical">
                        <div class="tab-one__content">
                            <div class="tab-one__content__bg"
                                style="background-image: url({{ asset('assets/core/tab-bg.jpg') }});"></div>
                            <div class="row">
                                <div class="col-lg-6" style="padding: 30px 0px 69px 30px !important;">
                                    <div class="tab-one__content__image">
                                        <div class="row">
                                            <div class="col">
                                                <div class="sec-title text-left">
                                                    <div class="title-area">
                                                        @if (!empty($element->title))
                                                            <h3
                                                                class="sec-title pb-0">{{ $element->title }}</h3>
                                                        @endif
                                                    </div>

                                                    @if (!empty($element?->description))
                                                        <p>{!! $element->description !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if (!empty($element?->image))
                                            <img src="{{ asset($element->image) }}" alt="careox">
                                        @endif

                                        <div class="tab-one__content__image__shape" style="background-image: url();">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 d-flex">
                                    <div class="tab-one__content__right">
                                        @if (!empty($element?->subtitle))
                                            <h3 class="tab-one__content__title">{{ $element->subtitle }}</h3>
                                        @endif

                                        @foreach ($element->features ?? [] as $index => $feature)
                                            @if (!empty($feature?->title) || !empty($feature?->description))
                                                <div class="tab-one__content__box"
                                                    style="--accent-color: {{ $colors[$index % count($colors)] }}">
                                                    <div class="tab-one__content__box__icon">
                                                        <i class="bi bi-check-circle"></i>
                                                    </div>

                                                    @if (!empty($feature?->title))
                                                        <h3 class="tab-one__content__box__title">{{ $feature->title }}
                                                        </h3>
                                                    @endif

                                                    @if (!empty($feature?->description))
                                                        <p class="tab-one__content__box__text">
                                                            {{ $feature->description }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
