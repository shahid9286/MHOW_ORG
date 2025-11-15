<div class="th-menu-wrapper onepage-nav">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle ms-5"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="home-travel.html"><img src="{{ asset($setting->logo) }}" alt="MHOW"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('front.about') }}">About Us</a></li>
                <li><a href="{{ route('front.projects') }}">Projects</a></li>
                <li><a href="{{ route('front.events') }}">Events</a></li>
                <li><a href="{{ route('front.volunteer') }}">Volunteer</a></li>
                <li><a href="{{ route('front.gallery') }}">Gallery</a></li>
                <li><a href="{{ route('front.contactus') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div><!--==============================
 Header Area
==============================-->
<header class="th-header header-layout3">
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container-fluid th-container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('front.index') }}"><img src="{{ asset($setting->logo) }}" alt="MHOW"></a>
                        </div>
                    </div>
                    <div class="col-auto mx-auto">
                        <nav class="main-menu d-none d-xl-inline-block">
                            <ul>
                                <li><a href="{{ route('front.index') }}">Home</a></li>
                                <li><a href="{{ route('front.about') }}">About Us</a></li>
                                <li><a href="{{ route('front.projects') }}">Projects</a></li>
                                <li><a href="{{ route('front.events') }}">Events</a></li>
                                <li><a href="{{ route('front.volunteer') }}">Volunteer</a></li>
                                <li><a href="{{ route('front.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('front.contactus') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-xl-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                    <div class="col-auto d-none d-xl-block pe-0">
                        <div class="header-button">
                            @guest
                                <a href="{{ route('front.donate') }}" class="ms-auto" style="padding: 27px 55px; border-radius: 0; background-color: #A91F21; color: white;">Donate Now</a>
                            @endguest
                            @auth
                                <a href="{{ route('admin.dashboard') }}" class="ms-auto" style="padding: 27px 55px; border-radius: 0; background-color: #A91F21; color: white;"
                                    target="_blank">Dashboard</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-bg" data-mask-src="{{ asset('front') }}/img/logo_bg_mask.png"></div>
        </div>
    </div>
</header>
