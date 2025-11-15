<div class="new-mhow-swiper-container">
    <div class="swiper new-mhow-swiper">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                <div class="swiper-slide new-mhow-slide">
                    <img src="{{ asset('assets/admin/img/slider/' . $slider->image) }}" class="new-mhow-img">
                    <div class="new-mhow-slide-overlay"></div>
                    <div class="new-mhow-slide-content">
                        <div class="new-mhow-title-box">
                            <h2 class="new-mhow-slide-title text-white">{!! $slider->title !!}</h2>
                        </div>
                        <p class="text-white mb-3 mb-md-4">{!! $slider->sub_title !!}</p>
                        @if ($slider->button_title && $slider->button_url)
                            <a href="{{ $slider->button_url }}" class="new-mhow-slide-button">
                                {{ $slider->button_title }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        <div class="new-mhow-navigation">
            <button class="new-mhow-nav-btn new-mhow-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="new-mhow-nav-btn new-mhow-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
