<section id="about" class="about">
    <div class="container" data-aos="fade-up">

    @php
        $about = App\Models\Aboutpage::first();
    @endphp
      <div class="section-header">
        <h2>About Us</h2>
      </div>

      <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-5">
          <div class="about-img">
            <img src="{{ asset('uploads/'.$about->image) }}" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-7">
          <h3 class="pt-0 pt-lg-5"></h3>

          <!-- Tabs -->
          <ul class="nav nav-pills mb-3">
            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1"></a></li>
            
          </ul><!-- End Tabs -->

          <!-- Tab Content -->
          <div class="tab-content">

            <div class="tab-pane fade show active" id="tab1">

              <p class="fst-italic">{{ $about->title }}</p>

              {!! $about->body !!}
            </div><!-- End Tab 1 Content -->


          </div>

        </div>

      </div>

    </div>
  </section>