    <div class="overflow-visible space" id="gallery-sec">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">Capturing Purpose in Frames</span>
                <h4 class="sec-title">Visual Stories of Impact</h2>
            </div>
            <div class="row gy-4">
                @foreach ($galleries as $gallery)
                    <div class="col-md-3 filter-item">
                        <div class="gallery-box style4">
                            <div class="gallery-img global-img">
                                <img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}"
                                    alt="gallery image">
                                <a href="{{ asset('assets/front/img/gallery/' . $gallery->image) }}"
                                    class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="overflow-hidden space" id="gallery-sec">
        <div class="container">
            <div class="filter-menu filter-menu-active">
                <button data-filter="*" class="tab-btn active" type="button">All</button>
                <button data-filter=".cat1" class="tab-btn" type="button">Maldives</button>
                <button data-filter=".cat2" class="tab-btn" type="button">Greece</button>
                <button data-filter=".cat3" class="tab-btn" type="button">London</button>
                <button data-filter=".cat4" class="tab-btn" type="button">Swizerland</button>
                <button data-filter=".cat5" class="tab-btn" type="button">Sydney</button>
                <button data-filter=".cat6" class="tab-btn" type="button">Dubai, UAE</button>
                <button data-filter=".cat7" class="tab-btn" type="button">Japan</button>
                <button data-filter=".cat8" class="tab-btn" type="button">Brazil</button>
            </div>
            <div class="row gy-4 gallery-row filter-active">
                <div class="col-md-6 col-xl-auto filter-item cat1 cat2 cat5 cat4 cat3">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_1.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_1.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat5 cat5 cat8 cat7">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_2.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_2.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat7 cat6">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_3.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_3.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat9 cat7 cat4">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_4.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_4.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat1 cat3 cat4 cat5">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_5.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_5.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat6 cat8 cat8">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_6.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_6.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat2 cat3">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_7.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_7.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat10 cat5">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_8.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_8.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item <br />
<b>Warning</b>:  Undefined array key 8 in <b>E:\web-dev\angfuzsoft\html\tourm-html\build\inc\sections\gallery-v4.php</b> on line <b>50</b><br />
">
                    <div class="gallery-box style4">
                        <div class="gallery-img global-img">
                            <img src="assets/img/gallery/gallery_7_9.jpg" alt="gallery image">
                            <a href="assets/img/gallery/gallery_7_9.jpg" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
