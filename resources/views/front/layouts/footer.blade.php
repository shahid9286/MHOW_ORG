<footer class="footer-wrapper footer-layout2 shape-mockup-wrap" style="background-color: #063A68;">
    <div class="widget-area pb-0 pt-5">
        <div class="container">
            <div class="row gy-4 justify-content-center justify-content-md-between text-center text-md-start">
                
                <!-- Logo + About -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo mb-3">
                                <a href="{{ route('front.index') }}">
                                    <img src="{{ asset($setting->footer_logo) }}" alt="MHOW" class="img-fluid" style="max-height: 70px;">
                                </a>
                            </div>
                            <p class="about-text text-light mb-3">
                                MHOW. Building stronger communities through care, wisdom, and collective action.
                            </p>
                            <div class="th-social d-flex justify-content-center justify-content-md-start flex-wrap gap-2" >
                                @if ($setting->fb_link)
                                    <a  href="{{ $setting->fb_link }}" class="text-light fs-5"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($setting->yt_link)
                                    <a href="{{ $setting->yt_link }}" class="text-light fs-5"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if ($setting->pinterest_link)
                                    <a href="{{ $setting->pinterest_link }}" class="text-light fs-5"><i class="fab fa-pinterest-p"></i></a>
                                @endif
                                @if ($setting->insta_link)
                                    <a href="{{ $setting->insta_link }}" class="text-light fs-5"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if ($setting->whatsapp_link)
                                    <a href="{{ $setting->whatsapp_link }}" class="text-light fs-5"><i class="fab fa-whatsapp"></i></a>
                                @endif
                                @if ($setting->tiktok_link)
                                    <a href="{{ $setting->tiktok_link }}" class="text-light fs-5"><i class="fab fa-tiktok"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Links -->
                <div class="col-6 col-md-6 col-lg-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title text-light mb-3">Other Links</h3>
                        <ul class="menu list-unstyled mb-0">
                            <li><a href="{{ route('front.events') }}" class="text-light d-block py-1">Events</a></li>
                            <li><a href="{{ route('front.projects') }}" class="text-light d-block py-1">Projects</a></li>
                            <li><a href="{{ route('front.charity.pages') }}" class="text-light d-block py-1">Charity Pages</a></li>
                            <li><a href="{{ route('front.landing.pages') }}" class="text-light d-block py-1">Landing Pages</a></li>
                            <li><a href="{{ route('front.blogs') }}" class="text-light d-block py-1">Blogs</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-6 col-md-6 col-lg-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title text-light mb-3">Quick Links</h3>
                        <ul class="menu list-unstyled mb-0">
                            <li><a href="{{ route('front.about') }}" class="text-light d-block py-1">About Us</a></li>
                            <li><a href="{{ route('front.contactus') }}" class="text-light d-block py-1">Contact Us</a></li>
                            <li><a href="{{ route('front.donate') }}" class="text-light d-block py-1">Donate Now</a></li>
                            <li><a href="{{ route('front.volunteer') }}" class="text-light d-block py-1">Volunteer</a></li>
                            <li><a href="{{ route('front.gallery') }}" class="text-light d-block py-1">Gallery</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-12 col-md-6 col-lg-auto">
                    <div class="widget footer-widget ">
                        <h3 class="widget_title text-light mb-3" >Address</h3>
                        <div class="d-flex justify-content-center">
                            <div class="th-widget-contact text-light ">
                                <div class="info-box_text d-flex align-items-start mb-2">
                                    <i class="fas fa-phone me-2 mt-1" style="color: #A91F21;"></i>
                                    <a href="tel:{{ $setting->phone_no }}" class="text-light">{{ $setting->phone_no }}</a>
                                </div>
                                <div class="info-box_text d-flex align-items-start mb-2">
                                    <i class="fas fa-envelope me-2 mt-1" style="color: #A91F21;"></i>
                                    <a href="mailto:{{ $setting->email }}" class="text-light">{{ $setting->email }}</a>
                                </div>
                                <div class="info-box_text d-flex align-items-start">
                                    <i class="fas fa-map-marker me-2 mt-1" style="color: #A91F21;"></i>
                                    <span class="text-start">{{ $setting->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="border-top mt-4 pt-3 text-center text-light" style="opacity: 0.8;">
                <small>&copy; {{ date('Y') }} MHOW. All Rights Reserved.</small>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
{{-- whatsapp button  --}}
<a href="{{ $setting->whatsapp_link }}" 
   class="whatsapp-float" 
   target="_blank" 
   title="Chat with us on WhatsApp">
   <i class="fab fa-whatsapp"></i>
</a>