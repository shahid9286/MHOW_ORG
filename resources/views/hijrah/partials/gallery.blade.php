<!-- 🌙 GALLERY SECTION -->
<section class="py-5 bg-light" id="gallery">
  <div class="container py-5">
    <!-- Title -->
    {{-- <div class="text-center mb-5" data-aos="fade-up">
      <h6 class="text-uppercase text-success fw-semibold mb-2">Gallery</h6>
      <h2 class="fw-bold text-dark mb-3">Moments from the <span class="text-success">Sacred Journey</span></h2>
      <p class="text-muted fs-5">Experience glimpses from our Umrah, Hijrah Walk, and gallery-1 project — where faith meets reflection and innovation.</p>
    </div> --}}

    <!-- Image Grid -->
    <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
      
      <!-- Image 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
           <img src="{{ asset('hijrah/img/static/gallery-1.png') }}" class="img-fluid rounded-4" alt="Umrah Experience">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
           
          </div>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
          <img src="{{ asset('hijrah/img/static/gallery-2.png') }}" class="img-fluid rounded-4" alt="gallery-1 Project">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
          
          </div>
        </div>
      </div>

      <!-- Image 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
           <img src="{{ asset('hijrah/img/static/gallery-3.png') }}" class="img-fluid rounded-4" alt="Hijrah Walk">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
           
          </div>
        </div>
      </div>

      <!-- Image 4 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
          <img src="{{ asset('hijrah/img/static/gallery-4.png') }}" class="img-fluid rounded-4" alt="Makkah Nights">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
       
          </div>
        </div>
      </div>

      <!-- Image 5 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
          <img src="{{ asset('hijrah/img/static/gallery-5.png') }}" class="img-fluid rounded-4" alt="Reflections">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
     
          </div>
        </div>
      </div>

      <!-- Image 6 -->
      <div class="col-md-4 col-sm-6">
        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
          <img src="{{ asset('hijrah/img/static/gallery-6.png') }}" class="img-fluid rounded-4" alt="Medinah Peace">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center text-white fw-bold fs-5" 
               style="background: rgba(0,0,0,0.4); opacity:0; transition:0.4s;">
      
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Hover Effect Script -->
<script>
  document.querySelectorAll('#gallery .position-relative').forEach(el => {
    el.addEventListener('mouseenter', () => el.querySelector('div').style.opacity = '1');
    el.addEventListener('mouseleave', () => el.querySelector('div').style.opacity = '0');
  });
</script>
