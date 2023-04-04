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
<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel">Company Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="150" height="150"
                            alt="Company Logo">
                    </div>
                </div>
                <form id="submit-form" method="post" 
                    enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="companyEmail" name="companyEmail" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="commercialRegister" class="form-label">Commercial Register</label>
                        <input type="file" class="form-control" id="commercialRegister" name="commercialRegister"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="companyPassword" name="companyPassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3" style="text-align: center">

                        <button type="submit"  class="btn btn-success" style="width: 40%">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="150" height="150"
                            alt="Company Logo">
                    </div>
                </div>
                <form id="login-form" method="post"  action="{{ route('login_user') }}"
                enctype="multipart/form-data" onsubmit="LoginForm(); return false;">
                @csrf                    
                    
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="emailUser" class="form-control" id="emailUser" name="emailUser" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordUser" name="passwordUser"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    
                    <div class="mb-3" style="text-align: center">

                        <button type="submit"  class="btn btn-success" style="width: 40%">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tacherModal" tabindex="-1" aria-labelledby="tacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tacherModalLabel">Teacher Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="150" height="150"
                            alt="Company Logo">
                    </div>
                </div>
                <form id="teacher-form" method="post" action="{{ route('teacher_register') }}"
                    enctype="multipart/form-data" onsubmit="teacherForm(); return false;">
                    @csrf
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Teacher Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Teacher Name</label>
                        <input type="text" class="form-control" id="teacherName" name="teacherName" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="teacherEmail" name="teacherEmail" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="companyPassword" name="teachePassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="teacheConformPassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="country"> Country:</label>
                        <select id="country" class="form-control" required name="country">
                            <option value="">اختر دولتك</option>
                            <option value="الجزائر">الجزائر</option>
                            <option value="البحرين">البحرين</option>
                            <option value="جزر القمر">جزر القمر</option>
                            <option value="جيبوتي">جيبوتي</option>
                            <option value="مصر">مصر</option>
                            <option value="العراق">العراق</option>
                            <option value="الأردن">الأردن</option>
                            <option value="الكويت">الكويت</option>
                            <option value="لبنان">لبنان</option>
                            <option value="ليبيا">ليبيا</option>
                            <option value="موريتانيا">موريتانيا</option>
                            <option value="المغرب">المغرب</option>
                            <option value="عُمان">عُمان</option>
                            <option value="فلسطين">فلسطين</option>
                            <option value="قطر">قطر</option>
                            <option value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                            <option value="الصومال">الصومال</option>
                            <option value="السودان">السودان</option>
                            <option value="سوريا">سوريا</option>
                            <option value="تونس">تونس</option>
                            <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                            <option value="اليمن">اليمن</option>
                        </select>
                        
                        
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="education_level">اختر مستوى التعليم:</label>
                        <select id="education_level" name="education_level" class="form-control">
                            <option value="">اختر مستوى التعليم</option>
                            <optgroup label="المرحلة الابتدائية">
                              <option value="الصف الأول الابتدائي">الصف الأول الابتدائي</option>
                              <option value="الصف الثاني الابتدائي">الصف الثاني الابتدائي</option>
                              <option value="الصف الثالث الابتدائي">الصف الثالث الابتدائي</option>
                              <option value="الصف الرابع الابتدائي">الصف الرابع الابتدائي</option>
                              <option value="الصف الخامس الابتدائي">الصف الخامس الابتدائي</option>
                              <option value="الصف السادس الابتدائي">الصف السادس الابتدائي</option>
                            </optgroup>
                            <optgroup label="المرحلة المتوسطة">
                              <option value="الصف الأول المتوسط">الصف الأول المتوسط</option>
                              <option value="الصف الثاني المتوسط">الصف الثاني المتوسط</option>
                              <option value="الصف الثالث المتوسط">الصف الثالث المتوسط</option>
                            </optgroup>
                            <optgroup label="المرحلة الثانوية">
                              <option value="الصف الأول الثانوي">الصف الأول الثانوي</option>
                              <option value="الصف الثاني الثانوي">الصف الثاني الثانوي</option>
                              <option value="الصف الثالث الثانوي">الصف الثالث الثانوي</option>
                            </optgroup>
                            <!-- Add more options as needed -->
                          </select>
                                                 
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="educational_material">اختر مادة تعليمية:</label>
                        <select id="educational_material" name="educational_material" class="form-control">
                          <option value="">يرجى الاختيار</option>
                          <option value="الرياضيات">الرياضيات</option>
                          <option value="اللغة العربية">اللغة العربية</option>
                          <option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
                          <option value="العلوم">العلوم</option>
                          <option value="التاريخ">التاريخ</option>
                          <option value="الجغرافيا">الجغرافيا</option>
                          <option value="الفلسفة">الفلسفة</option>
                          <option value="الاجتماعيات">الاجتماعيات</option>
                          <option value="الاقتصاد">الاقتصاد</option>
                          <option value="التربية الدينية">التربية الدينية</option>
                          <option value="التربية الفنية">التربية الفنية</option>
                          <option value="التربية المدنية">التربية المدنية</option>
                          <option value="التربية الرياضية">التربية الرياضية</option>
                          <option value="الإعلام والاتصال">الإعلام والاتصال</option>
                          <option value="اللغة الفرنسية">اللغة الفرنسية</option>
                          <option value="اللغة الألمانية">اللغة الألمانية</option>
                          <option value="اللغة الإسبانية">اللغة الإسبانية</option>
                          <!-- يمكن إضافة المزيد من المواد التعليمية -->
                        </select>                     
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="country"> CV:</label>
                        <input type="file" class="form-control" id="cv" name="cv"
                        required>                        
                        <div class="invalid-feedback">
                        </div>
                    </div>

         


                    
                    
                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<main id="main">

    <!-- ======= Featured Services Section ======= -->
    @include('frontend._featurs')
    <!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    @include('frontend._about')
    <!-- End About Section -->


    <!-- ======= Services Section ======= -->
    @include('frontend._service')
    <!-- End Services Section -->



    <!-- ======= Team Section ======= -->
    @include('frontend._teacher')<!-- End Team Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-header">
                <h2>Contact Us</h2>
                <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                    dolores adipisci aliquam.</p>
            </div>

        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4">

                    <div class="info">
                        <h3>Get in touch</h3>
                        
                        
                        
                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>{{ get_general_value('address') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ get_general_value('email') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>{{ get_general_value('phone_number') }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('frontend._footer')
