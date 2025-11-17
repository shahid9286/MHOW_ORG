@php
    $section_title = App\Models\SectionTitle::where('type', 'feature_image')->first();
@endphp

@if (
    !empty($section_title?->title) ||
        !empty($section_title?->description) ||
        (!empty($page?->featureImages) && count($page->featureImages)))
    <section class="country-one mt-5">
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


            {{-- Feature Items --}}
            @if (!empty($page?->featureImages) && count($page->featureImages))
                <div class="row gy-4 justify-content-center">

                    @foreach ($page->featureImages as $index => $image)
                        @php
                            $hasImage = !empty($image?->image);
                            $hasTitle = !empty($image?->title);
                            $hasSubtitle = !empty($image?->subtitle);
                        @endphp

                        @if ($hasImage || $hasTitle || $hasSubtitle)
                            <div class="col-md-6 col-xl-3">
                                <div class="feature-item th-ani wow fadeInUp" data-wow-delay="{{ $index * 80 }}ms">

                                    {{-- Icon / Image --}}
                                    @if ($hasImage)
                                        <div class="feature-item_icon">
                                            <img src="{{ asset($image->image) }}" alt="Feature Icon" width="100px">
                                        </div>
                                    @endif

                                    <div class="media-body">

                                        {{-- Title --}}
                                        @if ($hasTitle)
                                            <h3 class="box-title">{{ $image->title }}</h3>
                                        @endif

                                        {{-- Subtitle --}}
                                        @if ($hasSubtitle)
                                            <p class="feature-item_text">{{ $image->subtitle }}</p>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            @endif

        </div>
    </section>
@endif
