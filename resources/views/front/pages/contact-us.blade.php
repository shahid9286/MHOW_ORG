@extends('front.layouts.master')
@section('title', 'Contact Us')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Contact Us',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Contact Us',
        'image' => 'assets/core/BreadCrumb.png',
    ])
    
        <div class="container mt-5">
            <div class="title-area text-center">
                <span class="sub-title">Get In Touch</span>
                <h4 class="sec-title">Our Contact Information</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid style2">
                        <div class="about-contact-icon" style="background-color: #A91F21">
                            <i class="bi bi-geo-alt-fill fs-2"></i>
                        </div>
                        <div class="about-contact-details">
                            <h6 class="box-title" style="color: #A91F21">Our Address</h6>
                            <p class="about-contact-details-text">{{ $setting->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid">
                        <div class="about-contact-icon" style="background-color: #A91F21">
                            <i class="bi bi-telephone fs-2"></i>
                        </div>
                        <div class="about-contact-details align-self-center">
                            <h6 class="box-title" style="color: #A91F21">Phone Number</h6>
                            <p class="about-contact-details-text" ><a style="color: #005EB4" href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></p>
                            @if ($setting->phone_no_2)
                                <p class="about-contact-details-text"><a style="color: #005EB4" href="tel:{{ $setting->phone_no_2 }}">{{ $setting->phone_no_2 }}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid py-4">
                        <div class="about-contact-icon" style="background-color: #A91F21">
                            <i class="bi bi-envelope fs-2"></i>
                        </div>
                        <div class="about-contact-details align-self-center">
                            <h6 class="box-title" style="color: #A91F21">Email Address</h6>
                            <p class="about-contact-details-text "><a style="color: #005EB4"
                                    href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @include('front.partials.contact-us.contact-us-form')
    <div class="container-fluid">
        <div class="contact-map style2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21162580.825045206!2d-3.8238462276836356!3d43.986437565005104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb5e660a528f3%3A0xd772403b68ccd580!2sMuhammadiyah%20House%20of%20Wisdom!5e0!3m2!1sen!2s!4v1750139460168!5m2!1sen!2s"
                allowfullscreen="" loading="lazy"></iframe>
            <div class="contact-icon">
                <img src="assets/img/icon/location-dot3.svg" alt="">
            </div>
        </div>
    </div>
@endsection
@section('js')

    @include('front.partials.contact-us.contact-us-script')

@endsection
