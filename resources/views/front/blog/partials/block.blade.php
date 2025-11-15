@if ($block)
    <section class="mhow-section py-5">
        <div class="container">
            <div class="row align-items-center">
                @if ($block->type == 'R-2-L')

                <!-- Right side content -->
                <div class="col-lg-6">
                    <small class="text-uppercase d-block mb-2 sub-title">{{ $block->subtitle }}</small>
                    <h4 class="mb-3 sec-title heading">{{ $block->title }}</h4>
                    <p class="mb-4">{!! $block->description !!}</p>

                    <!-- Features -->
                    <ul class="list-unstyled mhow-features">
                        @foreach ($block->features as $feature)
                            <li class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#28a745"
                                    class="me-2" viewBox="0 0 16 16">
                                    <path d="M16 2 6 12l-4-4" stroke="#28a745" stroke-width="2" fill="none" />
                                </svg>
                                {{ $feature->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
                        <img src="{{ asset($block->image) }}" class="img-fluid rounded shadow mhow-img1" alt="Image 1">
                </div>
                @else
                <!-- Left side images -->
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
                        <img src="{{ asset($block->image) }}" class="img-fluid rounded shadow mhow-img1" alt="Image 1">
                </div>

                <!-- Right side content -->
                <div class="col-lg-6">
                    <small class="text-uppercase d-block mb-2 sub-title">{{ $block->subtitle }}</small>
                    <h4 class="mb-3 sec-title heading">{{ $block->title }}</h4>
                    <p class="mb-4">{!! $block->description !!}</p>

                    <!-- Features -->
                    <ul class="list-unstyled mhow-features">
                        @foreach ($block->features as $feature)
                            <li class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#28a745"
                                    class="me-2" viewBox="0 0 16 16">
                                    <path d="M16 2 6 12l-4-4" stroke="#28a745" stroke-width="2" fill="none" />
                                </svg>
                                {{ $feature->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </section>
@endif
