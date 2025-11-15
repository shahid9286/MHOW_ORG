@foreach ($page->introductionSections as $intro)
    <section class="mhow-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Right side content -->
                <div class="col-lg-7">
                    <small class="text-uppercase d-block mb-2 sub-title">{{ $intro->subtitle }}</small>
                    <h4 class="mb-3 sec-title heading">{{ $intro->title }}</h4>
                    <p class="mb-4">{!! $intro->description !!}</p>
                </div>
                <!-- Left side images -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="position-relative mhow-images">
                        <img src="{{ asset($intro->icon) }}" class="img-fluid rounded shadow mhow-img1" alt="Image 1">
                        <img src="{{ asset($intro->images) }}" class="img-fluid rounded shadow mhow-img2 position-absolute" alt="Image 2">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
