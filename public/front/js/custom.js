/* Mhow New Slider JS Start */

document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".new-mhow-swiper", {
        autoHeight: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        navigation: {
            nextEl: ".new-mhow-next",
            prevEl: ".new-mhow-prev",
        },
        allowTouchMove: true,
        speed: 800,
        loop: true,
    });
});

/* Mhow New Slider JS End */

/* Mhow New Grid JS Start */

document.addEventListener("DOMContentLoaded", function () {
    const grids = document.querySelectorAll(".new-mhow-grid");

    grids.forEach((grid) => {
        const imageContainers = grid.querySelectorAll(
            ".new-mhow-image-container"
        );
        const count = imageContainers.length;

        grid.classList.remove(
            "new-mhow-grid-1",
            "new-mhow-grid-2",
            "new-mhow-grid-3"
        );

        if (count === 1) {
            grid.classList.add("new-mhow-grid-1");
        } else if (count === 2) {
            grid.classList.add("new-mhow-grid-2");
        } else if (count === 3) {
            grid.classList.add("new-mhow-grid-3");
        }
    });
});

/* Mhow New Grid JS End */

document.addEventListener("DOMContentLoaded", function () {
    new Swiper("#project-slider", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        centeredSlides: true,
        effect: "coverflow",
        coverflowEffect: {
            rotate: 35,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        breakpoints: {
            576: { slidesPerView: 1 },
            992: { slidesPerView: 2 },
            1200: { slidesPerView: 3 },
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '[data-slider-next="#project-slider"]',
            prevEl: '[data-slider-prev="#project-slider"]',
        },
    });
});
document.addEventListener("DOMContentLoaded", function () {
    new Swiper("#project-slider2", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        centeredSlides: true,
        effect: "coverflow",
        coverflowEffect: {
            rotate: 35,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        breakpoints: {
            576: { slidesPerView: 1 },
            992: { slidesPerView: 2 },
            1200: { slidesPerView: 3 },
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '[data-slider-next="#project-slider2"]',
            prevEl: '[data-slider-prev="#project-slider2"]',
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    new Swiper("#aboutSlider9", {
        // basic motion
        slidesPerView: 3,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 600,

        // coverflow depth feel
        effect: "coverflow",
        coverflowEffect: {
            rotate: 0,
            stretch: 50,
            depth: 170,
            modifier: 1,
            slideShadows: false,
        },

        // autoplay
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        // responsive tweaks
        breakpoints: {
            0: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
            1200: { slidesPerView: 3 },
        },
    });
});
