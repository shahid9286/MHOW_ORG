<div class="th-menu-wrapper onepage-nav">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="home-travel.html"><img src="{{ asset($setting->logo) }}" alt="MHOW"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li><a href="{{ route('hijrah.index') }}">Home</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><a href="#eventDetail">Event Detail</a></li>
                <li><a href="#schedule">Schedule</a></li>
                <li><a href="#whyUs">Objectives</a></li>
                <li><a href="#register">Register</a></li>
                <li><a href="#contactUs">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
 Header Area
==============================-->
<header class="th-header header-layout3">
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container th-container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('hijrah.index') }}"><img src="{{ asset($setting->logo) }}"
                                    alt="MHOW"></a>
                        </div>
                    </div>
                    <div class="col-auto mx-auto">
                        <nav class="main-menu d-none d-xl-inline-block">
                            <ul>
                                <li><a href="{{ route('hijrah.index') }}">Home</a></li>
                                <li><a href="#aboutUs">About Us</a></li>
                                <li><a href="#eventDetail">Event Detail</a></li>
                                <li><a href="#schedule">Schedule</a></li>
                                <li><a href="#whyUs">Objectives</a></li>
                                <li><a href="#register">Register</a></li>
                                <li><a href="#contactUs">Contact Us</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-xl-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                    <div class="col-auto d-none d-xl-block ps-0">
                        <div class="header-button">
                            <a href="#donateNow" class="th-btn th-icon">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-bg" data-mask-src="{{ asset('hijrah') }}/img/logo_bg_mask.png"></div>
        </div>
    </div>
</header>
