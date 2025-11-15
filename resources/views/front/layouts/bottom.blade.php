<!-- Jquery -->
<script src="{{ asset('front/js/vendor/jquery-3.6.0.min.js') }}"></script>
<!-- Swiper Js -->
<script src="{{ asset('front/js/swiper-bundle.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
<!-- Range Slider -->
<script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
<!-- imagesloaded -->
<script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- isotope -->
<script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
<!-- gsap -->
<script src="{{ asset('front/js/gsap.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

<!-- circle-progress -->
<script src="{{ asset('front/js/circle-progress.js') }}"></script>

<script src="{{ asset('front/js/matter.min.js') }}"></script>
<script src="{{ asset('front/js/matterjs-custom.js') }}"></script>


<!-- nice select -->
<script src="{{ asset('front/js/nice-select.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



<!-- Main Js File -->
<script src="{{ asset('front/js/main.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoSliderEl = document.getElementById('videoSlider');
        if (videoSliderEl && typeof Swiper !== 'undefined') {
            const options = videoSliderEl.dataset.sliderOptions ? JSON.parse(videoSliderEl.dataset
                .sliderOptions) : {};
            new Swiper(videoSliderEl, options);
        }

        // Popup for videos only in video slider
        $('.video-gallery-slider .popup-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
</script>


@yield('js')




@if ($seoGlobal && $seoPage)
    @include('front.layouts.bottom-seo-page')
@else
    @include('front.layouts.bottom-seo-global')
@endif
</body>

</html>
