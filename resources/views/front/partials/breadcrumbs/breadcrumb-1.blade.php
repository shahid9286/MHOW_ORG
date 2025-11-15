<section class="breadcrumb-banner position-relative text-white text-center" style="background-image: url('{{ asset($image ?? 'assets/core/BreadCrumb.webp') }}')">
    <div class="bg-overlay"></div>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="breadcrumb-title">{{ $title ?? 'Page Title' }}</h1>
        <p class="breadcrumb-subtitle">{!! $subtitle ?? '' !!}</p>
    </div>
</section>
