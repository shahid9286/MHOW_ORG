@if ($section)
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                @if ($section->type == 'R-2-L')
                    <!-- Image Left -->
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <img src="{{ asset($section->image) }}" class="img-fluid rounded shadow" alt="Section Image">
                    </div>
                    <div class="col-lg-7">
                        <div>
                            <h4 class="sub-title">{{ $section->title ?? '' }}</h4>
                            <h4 class="title split-text">{{ $section->subtitle ?? '' }}</h4>
                            <p class="mb-0">{!! $section->description ?? '' !!}</p>
                        </div>
                    </div>
                @else
                    <!-- Text Left -->
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div>
                            <h4 class="sub-title">{{ $section->title ?? '' }}</h4>
                            <h4 class="title split-text">{{ $section->subtitle ?? '' }}</h4>
                            <p class="mb-0">{!! $section->description ?? '' !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ asset($section->image) }}" class="img-fluid rounded shadow" alt="Section Image">
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
