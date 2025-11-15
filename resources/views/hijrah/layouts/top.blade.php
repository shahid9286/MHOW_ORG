<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hijrah Walk 2025| @yield('title')</title>
    <meta name="author" content="MHOW">
    <meta name="description" content="Muhammadiyah House of Wisdom (MHOW) is a global charity fostering peace, unity, and empowerment through Islamic teachings. We offer healing retreats, educational programs, and community support to promote mental, spiritual, and societal well-being. ">
    <meta name="keywords" content="">

  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ $setting->fav_icon }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $setting->fav_icon }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('hijrahwalk/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $setting->fav_icon }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ $setting->fav_icon }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $setting->fav_icon }}">
    <link rel="manifest" href="{{ asset('hijrahwalk/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $setting->fav_icon }}">
    <meta name="theme-color" content="#ffffff">
    
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

    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('hijrahwalk/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('hijrahwalk/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('hijrahwalk/css/magnific-popup.min.css') }}">

    <!-- Swiper css -->
    <link rel="stylesheet" href="{{ asset('hijrahwalk/css/swiper-bundle.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('hijrahwalk/css/style.css') }}">
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
    </style>

</head>

<body>

    <div class="magic-cursor relative z-10">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>

    <!--==============================
    Sidemenu
============================== -->
