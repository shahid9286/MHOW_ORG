@php
    $section_title = App\Models\SectionTitle::where('type', 'faq')->first();
@endphp
<div class="space-top mt-5">
    <div class="container">
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
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="accordion-area accordion mb-30" id="faqAccordion">
                    @foreach ($page->faqs as $faq)
                        <div class="accordion-card style2">
                            <div class="accordion-header" id="collapse-item-{{ $loop->iteration }}"><button
                                    class="accordion-button {{ $loop->iteration == 1 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $loop->iteration }}" aria-expanded="{{ $loop->iteration == 1 ? 'true' : '' }}"
                                    aria-controls="collapse-{{ $loop->iteration }}">{{ $faq->question }}</button></div>
                            <div id="collapse-{{ $loop->iteration }}"
                                class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                aria-labelledby="collapse-item-{{ $loop->iteration }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body style2">
                                    <p class="faq-text">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
