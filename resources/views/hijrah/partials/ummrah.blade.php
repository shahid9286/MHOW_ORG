<!-- AOS Library (Add in <head> of your layout) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Sacred Umrah Experience Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- LEFT SIDE IMAGE -->
      <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
        <div class="position-relative m-1">
            <img src="{{ asset('hijrah/img/static/umrah.jpeg') }}" alt="Slide 2"
               class="img-fluid rounded-4 shadow-lg">
          {{-- <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" 
               style="background: rgba(0, 0, 0, 0.25);"></div> --}}
        </div>
      </div>

      <!-- RIGHT SIDE TEXT -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
        <h6 class="text-uppercase text-success fw-bold mb-2">
          The Sacred Journey 2025
        </h6>
        <h2 class="fw-bold text-dark mb-3">
          The Sacred Umrah Experience
        </h2>
        <p class="text-muted fs-5 mb-4">
          Perform your Umrah and relive the <strong>Hijrah Walk</strong> — 
          a 470km prophetic journey from Makkah to Madinah. 
          Experience a unique spiritual transformation through reflection, brotherhood, and devotion.
        </p>

        <!-- INCLUDES SECTION -->
        <div class="bg-white border-start border-4 border-warning rounded-3 shadow-sm p-4" data-aos="fade-up" data-aos-delay="200">
          <h5 class="fw-bold text-success mb-3">Includes:</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><i class="bi bi-star-fill text-warning me-2"></i> 5★ Hotels in Makkah & Madinah</li>
            <li class="mb-2"><i class="bi bi-person-hearts text-warning me-2"></i> Guided Umrah & spiritual mentorship</li>
            <li class="mb-2"><i class="bi bi-compass text-warning me-2"></i> Partial guided Hijrah Walk with support vehicles</li>
            <li class="mb-2"><i class="bi bi-book-half text-warning me-2"></i> Tazkiyah sessions with <b>Zafar Majid Dabbagh</b> </li>
            <li class="mb-2"><i class="bi bi-cup-hot text-warning me-2"></i> Full meals, logistics & daily reflections</li>
            <li class="mb-0"><i class="bi bi-camera-reels text-warning me-2"></i> Cinematic documentary of your journey</li>
          </ul>
        </div>

        <!-- CTA BUTTON -->
        {{-- <div class="mt-4" data-aos="zoom-in" data-aos-delay="400">
          <a href="#" class="btn btn-success btn-lg px-4 rounded-pill shadow-sm">
            Reserve Your Spot
          </a>
        </div> --}}
      </div>

    </div>
  </div>
</section>

<!-- Initialize AOS -->
<script>
  AOS.init();
</script>
