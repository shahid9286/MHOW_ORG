@php
    $section_title = App\Models\SectionTitle::where('type', 'why_us_image')->where('page_id', $page->id)->first();
@endphp

<section class="pt-5">
    <div class="container">

        {{-- Section Title --}}
        <div class="title-area text-center">
            @if (!empty($section_title?->description))
                <span class="sub-title fs-6 fw-semibold d-none d-md-block">
                    {{ $section_title->description }}
                </span>
            @endif

            @if (!empty($section_title?->title))
                <h4 class="sec-title pb-0">{{ $section_title->title }}</h4>
            @endif

            <div class="mx-auto" style="width:60px; height:3px; background:#A91F21;"></div>
        </div>

        {{-- Dynamic Cards --}}
        <div class="row mt-4">
            @foreach ($page->whyUsImages ?? [] as $index => $why)
                <div class="col-md-6 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}"
                    data-aos-duration="800">

                    <div class="hijrah-modern-card">

                        {{-- Icon / Image --}}
                        <div class="hijrah-modern-icon">
                            @if (!empty($why?->image))
                                <img src="{{ asset($why->image) }}" alt="icon" style="width:60px;">
                            @else
                                <i class="fas fa-star-and-crescent"></i> {{-- fallback icon --}}
                            @endif
                        </div>

                        {{-- Title --}}
                        @if (!empty($why?->title))
                            <h3 class="hijrah-modern-title text-theme">
                                {{ $why->title }}
                            </h3>
                        @endif

                        {{-- Description --}}
                        @if (!empty($why?->description))
                            <p class="hijrah-modern-text">
                                {{ $why->description }}
                            </p>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
