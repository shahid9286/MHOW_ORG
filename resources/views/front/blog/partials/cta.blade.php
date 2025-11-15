@if ($cta)
    <div class="th-hero-wrapper bg-bottom-center hero-4 background-image py-5" id="hero"
        style="background-image: url({{ asset($cta->image) }});">
        <div class="container shape-mockup-wrap">
            <div class="hero-style4 text-center"><span class="sub-title text-white style1">{{ $cta->subtitle }}</span>
                <h1 class="hero-title text-white">{{ $cta->title }}</h1>
                <p class="text-white">{!! $cta->description !!}</p>
                <div class="btn-group"><a href="{{ $cta->button_link_1 }}" class="th-btn th-icon">{{ $cta->button_text_1 }}</a> 
                @if ($cta->button_text_2 && $cta->button_link_2)
                    <a href="{{ $cta->button_link_2 }}" class="th-btn style3 th-icon">{{ $cta->button_text_2 }}</a>
                @endif
                </div>
            </div>
        </div>
    </div>
@endif
