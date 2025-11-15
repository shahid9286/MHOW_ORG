<!-- Jquery -->
<script src="{{ asset('hijrahwalk/js/vendor/jquery-3.6.0.min.js') }}"></script>
<!-- Swiper Js -->
<script src="{{ asset('hijrahwalk/js/swiper-bundle.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('hijrahwalk/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('hijrahwalk/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('hijrahwalk/js/jquery.counterup.min.js') }}"></script>
<!-- Range Slider -->
<script src="{{ asset('hijrahwalk/js/jquery-ui.min.js') }}"></script>
<!-- imagesloaded -->
<script src="{{ asset('hijrahwalk/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- isotope -->
<script src="{{ asset('hijrahwalk/js/isotope.pkgd.min.js') }}"></script>
<!-- gsap -->
<script src="{{ asset('hijrahwalk/js/gsap.min.js') }}"></script>

<!-- circle-progress -->
<script src="{{ asset('hijrahwalk/js/circle-progress.js') }}"></script>

<script src="{{ asset('hijrahwalk/js/matter.min.js') }}"></script>
<script src="{{ asset('hijrahwalk/js/matterjs-custom.js') }}"></script>


<!-- nice select -->
<script src="{{ asset('hijrahwalk/js/nice-select.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



<!-- Main Js File -->
<script src="{{ asset('hijrahwalk/js/main.js') }}"></script>
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
<script>
    // document.addEventListener('DOMContentLoaded', function() {
        // Set the date we're counting down to (December 29, 2025)
        const countDownDate = new Date('2025-12-29T00:00:00').getTime();

        // Update the countdown every 1 second
        const countdownFunction = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();

            // Find the distance between now and the count down date
            const distance = countDownDate - now;

            // Time calculations for days, hours, minutes, and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result
            document.getElementById("hijrah-timer-days").textContent = days.toString().padStart(2, '0');
            document.getElementById("hijrah-timer-hours").textContent = hours.toString().padStart(2,
                '0');
            document.getElementById("hijrah-timer-minutes").textContent = minutes.toString().padStart(2,
                '0');
            document.getElementById("hijrah-timer-seconds").textContent = seconds.toString().padStart(2,
                '0');

            // If the countdown is finished, display a message
            if (distance < 0) {
                clearInterval(countdownFunction);
                document.getElementById("hijrah-timer-days").textContent = "00";
                document.getElementById("hijrah-timer-hours").textContent = "00";
                document.getElementById("hijrah-timer-minutes").textContent = "00";
                document.getElementById("hijrah-timer-seconds").textContent = "00";
                const timerMessage = document.querySelector(".hijrah-timer-message");
                if (timerMessage) {
                    timerMessage.textContent = "The event has started!";
                }
            }
        }, 1000);
    // });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper("#heroSlide1", {
            loop: true,
            effect: "fade", // or "slide" if you prefer
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".slider-next",
                prevEl: ".slider-prev",
            },
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const header = document.querySelector(".th-header");

        // check once on load
        if (window.scrollY < 100) {
            header.classList.add("is-hidden");
        }

        window.addEventListener("scroll", function() {
            if (window.scrollY < 100) {
                // only hide if not already hidden
                if (!header.classList.contains("is-hidden")) {
                    header.classList.add("is-hidden");
                }
            } else {
                // only show if hidden
                if (header.classList.contains("is-hidden")) {
                    header.classList.remove("is-hidden");
                }
            }
        });
    });
</script>

<script>
    // Function to handle donation option selection
    document.querySelectorAll('.hijrah-donation-option').forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options in the same card
            const card = this.closest('.hijrah-card');
            card.querySelectorAll('.hijrah-donation-option').forEach(opt => {
                opt.classList.remove('selected');
            });

            // Add selected class to clicked option
            this.classList.add('selected');

            // Get the amount from data attribute
            const amount = this.getAttribute('data-amount');

            // Find the custom input in the same card and update its value
            const customInput = card.querySelector('input[type="number"]');
            if (customInput) {
                customInput.value = amount;
            }
        });
    });

    // Handle custom input focus - deselect any selected options
    document.querySelectorAll('.hijrah-donation-input').forEach(input => {
        input.addEventListener('focus', function() {
            const card = this.closest('.hijrah-card');
            card.querySelectorAll('.hijrah-donation-option').forEach(opt => {
                opt.classList.remove('selected');
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // animation duration
        once: false, // keep animating on scroll up/down
        mirror: true, // animate out when scrolling back up
        offset: 100 // trigger when 120px of section enters bottom of viewport
    });
</script>

@yield('js')
</body>

</html>
