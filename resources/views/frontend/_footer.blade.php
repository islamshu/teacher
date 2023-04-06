<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{{ get_general_value('title') }}</h3>
                        <p>
                         
                            <strong>رقم الهاتف:</strong>{{ get_general_value('phone_number') }}<br>
                            <strong>البريد الاكتروني:</strong> {{ get_general_value('email') }}<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 footer-links">
                    <h4> روابط سريعة</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">الرئيسية</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/#services">الخدمات</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/#team">المعلمين</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/#contact">تواصل معنا</a></li>
                    </ul>
                </div>

               

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>اشترك بالرسائل البريدية </h4>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>


<!-- Vendor JS Files -->
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js?version=' . config('app.app_version') ) }}"></script>
<script src="{{ asset('frontend/vendor/aos/aos.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/php-email-form/validate.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/js/main.js?version=' . config('app.app_version')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

    
    
    
    
<script>
    function teacherForm() {
        $.ajax({
            type: 'POST',
            url: $('#teacher-form').attr('action'),
            data: new FormData($('#teacher-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: ' تم التسجيل بنجاح!',
                    text: 'You have successfully registered.'
                }).then((result) => {
                    // refresh the page
                    location.reload();
                });
            },
            error: function(response) {
                // If form submission fails, display validation errors in the modal
                $('.invalid-feedback').empty();
                $('form').find('.is-invalid').removeClass('is-invalid');
                var errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    var input = $('#teacher-form').find('[name="' + field + '"]');
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').html(messages[0]);
                });
            }
        });
    }
    
    function LoginForm() {
        $('#error-id').empty();
        $.ajax({
            type: 'POST',
            url: $('#login-form').attr('action'),
            data: new FormData($('#login-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: ' تم تسجيل الدخول بنجاح!',
                    text: 'You have successfully registered.'
                }).then((result) => {
                    // refresh the page
                    location.reload();
                });
            },
            error: function(response) {
                // If form submission fails, display validation errors in the modal
               $('<p>' + response.responseJSON.errors + '</p>').appendTo('#error-id');
            }
        });
    }
    function contacntForm() {
        $.ajax({
            type: 'POST',
            url: $('#contact-form').attr('action'),
            data: new FormData($('#contact-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'تم الارسال بنجاح!'
                })
                $("#contact-form").trigger('reset');

            },
            error: function(response) {
                $('.invalid-feedback').empty();
                $('form').find('.is-invalid').removeClass('is-invalid');
                var errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    var input = $('#contact-form').find('[name="' + field + '"]');
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').html(messages[0]);
                });                // If form submission fails, display validation errors in the modal
            //    $('<p>' + response.responseJSON.errors + '</p>').appendTo('#error-id');
            }
        });
    }
    

   
$( "#submit-form" ).submit(function( event ) {
    event.preventDefault();

        $.ajax({
            type: 'POST',
            url: "{{ route('company_register') }}",
            data: new FormData($('#submit-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: ' تم تسجيل الدخول بنجاح!',
                    text: 'You have successfully registered.'
                }).then((result) => {
                    // refresh the page
                    location.reload();
                });
            },
            error: function(response) {
                // If form submission fails, display validation errors in the modal
                $('.invalid-feedback').empty();
                $('form').find('.is-invalid').removeClass('is-invalid');
                var errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    var input = $('#submit-form').find('[name="' + field + '"]');
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').html(messages[0]);
                });
            }
        });
    });
    $('.loginalert').click(function(){
        Swal.fire({
                    icon: 'error',
                    title: 'يجب تسجيل الدخول اولا !!',
                })
    });

    
    
</script>

</body>

</html>
