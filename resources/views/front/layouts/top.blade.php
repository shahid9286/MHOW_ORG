<!doctype html>
<html class="no-js" lang="zxx">

<head>


    @if ($seoGlobal && $seoPage)
        @include('front.layouts.top-seo-page')
    @else
        @include('front.layouts.top-seo-global')
    @endif

   {!! $seoGlobal->google_site_verification  !!}
    {!! $seoGlobal->bing_site_verification  !!}
    {{ $seoGlobal->google_analytics_id  }}
    {{ $seoGlobal->google_tag_manager_id }}
    {!! $seoGlobal->facebook_pixel_id !!}
    {!! $seoGlobal->other_tracking_scripts !!}


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="dummy" content="@yield('title')">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--==============================
 Google Fonts
 ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Manrope:wght@200..800&family=Montez&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda:wght@400;800&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.min.css') }}">

    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('front/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Coda:wght@400;800&family=Manrope:wght@200..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @yield('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');

        #video-gallery-sec .swiper-slide {
            text-align: center;
        }

        #video-gallery-sec .papu-destination-img {
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
        }

        #video-gallery-sec .icon-btn {
            width: 50px;
            height: 50px;
            background-color: #005EB4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .breadcrumb-banner {
            background-image: url('/assets/images/banner.jpg');
            /* update with your image path */
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* semi-transparent overlay */
            z-index: 1;
        }

        .breadcrumb-banner .container {
            position: relative;
            z-index: 2;
        }

        .breadcrumb-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #ddd;
        }

        .breadcrumb-subtitle {
            font-size: 1.2rem;
            color: #ddd;
        }

        @media (max-width: 576px) {
            .breadcrumb-title {
                font-size: 1.8rem;
            }

            .breadcrumb-subtitle {
                font-size: 1rem;
            }

            .breadcrumb-banner {
                height: 220px;
            }
        }

        /* 🧭 Mobile-specific fixes */
        @media (max-width: 767.98px) {

            /* 1️⃣ Push the slider down a little to avoid navbar overlap */
            .new-mhow-swiper-container {
                margin-top: 0% !important;
                /* adjust 60–100px based on your header height */
                height: 30vh !important;

            }

            .new-mhow-slide-content {
                /* position: relative !important; */
            }

            .new-mhow-slide {
                position: relative !important;
                height: 30vh !important;
            }

            .new-mhow-slide-overlay {
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 100% !important;
            }

            .new-mhow-slide-content {
                position: absolute !important;
                top: 110px !important;
                left: 10px !important;
                width: 100% !important;
                height: 100% !important;
                text-align: left !important;
            }

            .new-mhow-img {
                height: 30vh !important;
            }


            .new-mhow-slide-button {
                /* position: absolute !important; */
                /* top: 50px !important; */
                /* font-size: 10px;
                padding: 2% !important; */
                display: none !important;
            }

            .new-mhow-slide-title {
                font-size: 1rem !important;

            }


            /* 2️⃣ Hide subheading on mobile */
            .new-mhow-slide-content p {
                display: none !important;
            }

            /* 3️⃣ Tidy up navigation buttons */
            .new-mhow-navigation {
                top: auto !important;
                bottom: 20px !important;
                justify-content: space-between !important;
                gap: 15px !important;
            }

            .new-mhow-nav-btn {
                width: 36px !important;
                height: 36px !important;
                font-size: 14px !important;
                background: rgba(0, 0, 0, 0.5) !important;
                color: #fff !important;
                border: none !important;
                border-radius: 50% !important;
            }

            .new-mhow-nav-btn i {
                font-size: 14px !important;
            }

            .new-mhow-next {
                margin-left: 280px !important;
            }
        }
    </style>
    @if ($seoPage?->custom_css)
        {!! $seoPage->custom_css !!}
    @endif
</head>

<body>
    @if ($seoPage?->body_start)
        {!! $seoPage->body_start !!}
    @endif


    <div class="magic-cursor relative z-10">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>

    <!--==============================
    Sidemenu
============================== -->
