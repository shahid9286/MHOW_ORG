@php
    $section_title = App\Models\SectionTitle::where('type', 'element')->first();
@endphp

@foreach ($page->elements ?? [] as $element)
<section class="hijrah-option-section" data-aos="fade-up" id="eventDetail">
    <div class="container-fluid px-5 mt-5">

        {{-- Section Titles --}}
        <div class="title-area text-center">
            @if (!empty($section_title?->subtitle))
                <span class="sub-title">{{ $section_title->subtitle }}</span>
            @endif

            @if (!empty($section_title?->title))
                <h4 class="sec-title">{{ $section_title->title }}</h4>
            @endif

            <div class="mx-auto" style="width:60px; height:3px; background:#A91F21;"></div>
        </div>

        <div class="hijrah-info-box">
            <div class="row">

                {{-- LEFT COLUMN: Main Title + Description + Image --}}
                <div class="col-lg-6 hijrah-mb-4" 
                    data-aos="fade-up" 
                    data-aos-delay="500" 
                    data-aos-duration="1200">

                    {{-- Element Image --}}
                    @if (!empty($element?->image))
                        <img 
                            src="{{ asset($element->image) }}" 
                            alt="image" 
                            class="img-fluid mt-3 rounded"
                        >
                    @endif
                </div>

                {{-- RIGHT COLUMN: Features --}}
                <div class="col-lg-6 hijrah-mb-4">


                    {{-- Element Title --}}
                    @if (!empty($element?->title))
                        <h2 class="h4 hijrah-text-primary"
                            style="margin-bottom:15px; font-weight:700; line-height:1.333; font-size:30px; font-family:Manrope, sans-serif; color:#1B4332;">
                            {{ $element->title }}
                        </h2>
                    @endif

                    {{-- Element Description --}}
                    @if (!empty($element?->description))
                        <div style="font-family:Inter, sans-serif; color:#4F6F52; line-height:1.75;">
                            {!! $element->description !!}
                        </div>
                    @endif
                    @foreach ($element->features ?? [] as $feature)
                        @if (!empty($feature?->title) || !empty($feature?->description))
                            <div class="hijrah-info-item hijrah-option1-item" data-aos="zoom-in">

                                <div class="hijrah-info-icon">
                                    <i class="bi bi-star-fill"></i>
                                </div>

                                <div class="hijrah-info-content">
                                    @if (!empty($feature?->title))
                                        <h5 class="hijrah-info-title m-0">{{ $feature->title }}</h5>
                                    @endif

                                    @if (!empty($feature?->description))
                                        <p class="mb-0">{{ $feature->description }}</p>
                                    @endif
                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>
@endforeach
