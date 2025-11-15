@php
    $section_title = App\Models\SectionTitle::where('type', 'faq')->first();
@endphp
<div class="space-top space-extra-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="title-area text-center"><span class="sub-title">{{ $section_title->title ?? 'FAQ' }}</span>
                    <h4 class="sec-title">{{ $section_title->subtitle ?? 'Frequently Ask Questions' }}</h4>
                    <p>{{ $section_title->description ?? 'Have questions you want answers to?' }}</p>
                </div>
            </div>
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
