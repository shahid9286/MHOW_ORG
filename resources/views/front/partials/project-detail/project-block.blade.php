@foreach ($page->blocks ?? [] as $index => $block)
    @php
        $hasContent =
            !empty($block?->title) ||
            !empty($block?->subtitle) ||
            !empty($block?->description) ||
            !empty($block?->image) ||
            ($block?->features && count($block->features));
    @endphp

    @if ($hasContent)
        <div class="container">
            <div class="row gx-60 gy-30 align-items-center">
                @if (!empty($block?->image))
                    <div class="col-lg-6">
                        <div class="resort-image global-img" data-wow-delay="200ms">
                            <img src="{{ asset($block->image) }}">
                        </div>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="resort-content">
                        <div class="title-area">
                            @if (!empty($block->subtitle))
                                <span class="sub-title fs-6 fw-semibold  d-none d-md-block">{{ $block->subtitle }}</span>
                            @endif
                            @if (!empty($block->title))
                                <h4 class="sec-title pb-0">{{ $block->title }}</h4>
                            @endif
                            <div style="width: 60px; height: 3px; background-color: #A91F21;"></div>
                        </div>
                        @if (!empty($block?->description))
                            <p class="about-three__content__text">
                                {!! $block->description !!}
                            </p>
                        @endif
                        @if (!empty($block?->features) && count($block->features))
                            <div class="resort-list">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($block->features as $feature)
                                        @if (!empty($feature?->title))
                                            <li class="mb-2"><i
                                                    class="bi bi-check-circle-fill text-danger me-2"></i>{{ $feature->title }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
