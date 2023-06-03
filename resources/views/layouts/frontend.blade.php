@include('frontend._head')

<!-- ======= Header ======= -->
@include('frontend._header')
<!-- End Header -->
<!-- Button to trigger modal -->



{{-- <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="{{asset('frontend/img/hero-carousel/hero-carousel-3.svg')}}" class="img-fluid animated">
      <h2>Welcome to <span>HeroBiz</span></h2>
      <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section> --}}
@include('frontend._slider')

<!-- Button trigger modal -->

<!-- Company Modal -->
@include('frontend._modal')







<main id="main">

    <!-- ======= Featured Services Section ======= -->
    @include('frontend._about')

    @include('frontend._featurs')
    <!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <!-- End About Section -->


    <!-- ======= Services Section ======= -->
    @include('frontend._service')
    <!-- End Services Section -->


    @include('frontend._jobs')

    <!-- ======= Team Section ======= -->
    @include('frontend._teacher')
    <!-- End Team Section -->


    <!-- ======= Contact Section ======= -->
    <section id="statistics" class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 ">
              <div class="statistic text-bg-primary">
                <h3>المدارس المسجلة</h3>
                <p class="number" data-target="{{ App\Models\Teacher::where('type','school')->count() }}">0</p>
                {{-- <p class="description">Registered users</p> --}}
              </div>
            </div>
            <div class="col-md-4">
              <div class="statistic text-bg-info">
                <h3>عدد الباحثين عن العمل</h3>
                <p class="number" data-target="{{ App\Models\Teacher::where('type','teacher')->count()  }}">0</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="statistic text-bg-success">
                <h3>عدد الباحثين الذين تم تعينهم </h3>
                <p class="number" data-target="{{ App\Models\Teacher::where('type','teacher')->where('status',3)->count()  }}">0</p>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-header">
                <h2> تواصل معنا<h2>
                
            </div>

        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3191473.47203604!2d55.665737401720854!3d20.103565777955033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3dd69f66a9d59bbf%3A0x3a064c7665b1a817!2z2LnZhdin2YY!5e0!3m2!1sar!2s!4v1682862127124!5m2!1sar!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4" style="text-align:center">

                    <div class="info">
                        <h3>خليك معنا دائما على تواصل</h3>



                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>العنوان:</h4>
                                <p>{{ get_general_value('address') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>البريد الاكتروني:</h4>
                                <p>{{ get_general_value('email') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>رقم الهاتف:</h4>
                                <p> {{ get_general_value('phone_number') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <form id="contact-form" class="php-email-form" method="post" action="{{ route('contact_us') }}"
                        enctype="multipart/form-data" onsubmit="contacntForm(); return false;">
                        @csrf
                        <div class="row">

                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder=" اسمك" >
                                        <div class="invalid-feedback">
                                        </div>
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder=" بريدك الاكتروني" >
                                        <div class="invalid-feedback">
                                        </div>
                                </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="العنوان" >
                                <div class="invalid-feedback">
                                </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="الموضوع" ></textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                       
                        <div class="text-center"><button type="submit"> ارسال رسالة</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('frontend._footer')
