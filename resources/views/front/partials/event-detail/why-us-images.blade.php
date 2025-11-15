@php
    $section_title = App\Models\SectionTitle::where('type', 'why_us_image')->first();
@endphp
<div class="feature-area overflow-hidden space-bottom" id="feature-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="title-area text-center"><span class="sub-title style1">{{ $section_title->title ?? '' }}</span>
                    <h4 class="sec-title">{{ $section_title->subtitle ?? '' }}</h4>
                    <p class="feature-text">{{ $section_title->description ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($page->whyUsImages as $whyUsImage)
                <div class="col-md-6 col-xl-3">
                    <div class="feature-item th-ani h-100">
                        <div class="feature-item_icon"><img src="{{ asset($whyUsImage->image) }}" alt="icon" width="100px">
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">{{ $whyUsImage->title }}</h3>
                            <p class="feature-item_text">{{ $whyUsImage->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
