<footer class="footer-wrapper bg-title footer-layout2 shape-mockup-wrap">
    <div class="widget-area pb-0 pt-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="home-travel.html"><img src="{{ asset($setting->footer_logo) }}"
                                        alt="MHOW"></a>
                            </div>
                            <p class="about-text">MHOW. Building stronger communities through care, wisdom, and
                                collective action.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 ps-5">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Address</h3>
                        <div class="th-widget-contact">
                            <div class="info-box_text">
                                <div class="icon align-self-center">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="details align-self-center">
                                    <p><a href="tel:{{ $setting->phone_no }}"
                                            class="info-box_link">{{ $setting->phone_no }}</a></p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="icon align-self-center">
                                    <i class="fas fa-envelope""></i>
                                </div>
                                <div class="details align-self-center">
                                    <p><a href="mailto:{{ $setting->email }}"
                                            class="info-box_link">{{ $setting->email }}</a></p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="icon align-self-center"><i class="fas fa-map-marker""></i></div>
                                <div class="details align-self-center">
                                    <p>{{ $setting->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-5">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Join Our Newsletter</h3>
                        <p class="hijrah-newsletter-subtitle">
                            Stay connected with the spirit of Hijrah.
                        </p>

                        <!-- Form -->
                        <form>
                            <div class="row mt-2">
                                <div class="col-md-8"><input type="email" id="newsLetterInput" class="form-control"
                                        placeholder="Enter your email address" required style="background: white; color: black; border-radius: 10px;">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn hijrah-newsletter-btn">Subscribe</button>
                                </div>
                            </div>
                        </form>
                        <div class="th-social mt-3">
                            @if ($setting->fb_link)
                                <a href="{{ $setting->fb_link }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif

                            @if ($setting->yt_link)
                                <a href="{{ $setting->yt_link }}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif

                            @if ($setting->pinterest_link)
                                <a href="{{ $setting->pinterest_link }}">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            @endif

                            @if ($setting->insta_link)
                                <a href="{{ $setting->insta_link }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif

                            @if ($setting->whatsapp_link)
                                <a href="{{ $setting->whatsapp_link }}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif

                            @if ($setting->tiktok_link)
                                <a href="{{ $setting->tiktok_link }}">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

<!--********************************
   Code End  Here
 ******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
