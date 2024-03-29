<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{!! get_general_value('title') !!}</h3>
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="230" height="200"
                            alt="">
                        {{-- <p>

                            <strong>رقم الهاتف:</strong>{{ get_general_value('phone_number') }}<br>
                            <strong>البريد الاكتروني:</strong> {{ get_general_value('email') }}<br>
                        </p> --}}
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
@yield('script')


<!-- Vendor JS Files -->
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js?version=' . config('app.app_version')) }}">
</script>
<script src="{{ asset('frontend/vendor/aos/aos.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js?version=' . config('app.app_version')) }}">
</script>
<script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js?version=' . config('app.app_version')) }}">
</script>
<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/vendor/php-email-form/validate.js?version=' . config('app.app_version')) }}"></script>
<script src="{{ asset('frontend/js/main.js?version=' . config('app.app_version')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html, {
        size: 'small'
    });
});
</script>

<script>
    $('.delete-confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        
                Swal.fire({
                title: `هل متأكد من حذف العنصر ؟`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
    <script>
            $("#storestable").on("change", ".js-switch", function() {
                        let status = $(this).prop('checked') === true ? 1 : 0;
                        let userId = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '{{ route('job.update.status') }}',
                            data: {
                                'status': status,
                                'job_id': userId
                            },
                            success: function(data) {
                                console.log(data.message);
                            }
                        });
                    });
    </script>
<script>
    function teacherForm() {
        $("#loading").show();

        $.ajax({
            type: 'POST',
            url: $('#teacher-form').attr('action'),
            data: new FormData($('#teacher-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loading").hide();
                Swal.fire({
                title: 'تم تسجيلك بنجاح ',
                text: 'لتظهر بياناتك للمدارس ولتتمتع بجميع خدمات منصة مدارسنا يتوجب عليك دفع مبلغ 5 ريال',
                showDenyButton: true,
                confirmButtonText: 'الدفع الآن',
                denyButtonText: `الدفع لاحقا`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    location.replace(response['url']);
                } else if (result.isDenied) {
                    location.reload()
                }
                })
                
            },
            error: function(response) {
                $("#loading").hide();

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
        $("#loading").show();

        $.ajax({
            type: 'POST',
            url: $('#login-form').attr('action'),
            data: new FormData($('#login-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loading").hide();

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
                $("#loading").hide();

                // If form submission fails, display validation errors in the modal
                $('<p>' + response.responseJSON.errors + '</p>').appendTo('#error-id');
            }
        });
    }
    function forgitForm() {
        $('#error_forget-id').empty();
        $("#loading").show();

        $.ajax({
            type: 'POST',
            url: $('#forget-form').attr('action'),
            data: new FormData($('#forget-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loading").hide();

                if(response.success =="false"){
                    Swal.fire({
                    icon: 'error',
                    title: response.message 
                })
                    }else{
                        Swal.fire({
                    icon: 'success',
                    title: response.message 
                })
                    }
            },
            error: function(response) {
                $("#loading").hide();

                // If form submission fails, display validation errors in the modal
                $('<p>' + response.responseJSON.errors + '</p>').appendTo('#error_forget-id');
            }
        });
    }
    

    function contacntForm() {
        $("#loading").show();

        $.ajax({
            type: 'POST',
            url: $('#contact-form').attr('action'),
            data: new FormData($('#contact-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loading").hide();

                Swal.fire({
                    icon: 'success',
                    title: 'تم الارسال بنجاح!'
                })
                $("#contact-form").trigger('reset');

            },
            error: function(response) {
                $("#loading").hide();

                $('.invalid-feedback').empty();
                $('form').find('.is-invalid').removeClass('is-invalid');
                var errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    var input = $('#contact-form').find('[name="' + field + '"]');
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').html(messages[0]);
                }); // If form submission fails, display validation errors in the modal
                //    $('<p>' + response.responseJSON.errors + '</p>').appendTo('#error-id');
            }
        });
    }



    $("#submit-form").submit(function(event) {
        event.preventDefault();
        $("#loading").show();

        $.ajax({
            type: 'POST',
            url: "{{ route('company_register') }}",
            data: new FormData($('#submit-form')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loading").hide();

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
                $("#loading").hide();

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
    $('.loginalert').click(function() {
        Swal.fire({
            icon: 'error',
            title: 'يجب تسجيل الدخول اولا !!',
        })
    });
    $('#job').change(function() {
        var tec_val = $(this).val();
        if (tec_val == 'معلم') {
            $('#educational_material').attr('required', true);
            $("#educational_material_div").css("display", "block")


        } else {
            $("#educational_material_div").css("display", "none")
            $('#educational_material').attr('required', false);
        }
    });
    $('.job_profile').change(function() {
        var tec_val = $(this).val();
        if (tec_val == 'معلم') {
            $('#educational_material_profile').attr('required', true);
            $("#educational_material_profile_div").css("display", "block");
        } else {
            $('#educational_material_profile').attr('required', false);
            $("#educational_material_profile_div").css("display", "none");
        }
    });

    $('.job_fillter').change(function() {
        var tec_val = $(this).val();
        if (tec_val == 'معلم') {
            $(".educational_material_fillter").css("display", "block");
        } else {
            $(".educational_material_fillter").css("display", "none");
        }
    });
    


    $(document).on('click', '.send-request', function(e) {
        $("#loading").show();

        var trash_id = $(this).attr('data-trash-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('add_request_job') }}",
            data: {
                "job_id": trash_id
            },
            // processData: false,
            // contentType: false,
            success: function(response) {
                $("#loading").hide();

                if (response['success'] == 'true') {
                    Swal.fire({
                        icon: 'success',
                        title: response['message']
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: response['message'],
                    });
                }


            },

        });
    });

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = passwordInput.nextElementSibling;

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.add("hide");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("hide");
        }
    }
</script>
<script>
    function startCounting() {
  const statisticElements = document.querySelectorAll('.statistic');

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const targetNumber = parseInt(entry.target.querySelector('.number').getAttribute('data-target'));
        const counterElement = entry.target.querySelector('.number');

        let currentNumber = 0;

        const interval = setInterval(() => {
          currentNumber += 5;
          counterElement.textContent = currentNumber.toLocaleString();

          if (currentNumber >= targetNumber) {
            counterElement.textContent = targetNumber.toLocaleString();
            clearInterval(interval);
          }
        }, 10);

        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  statisticElements.forEach(statistic => {
    observer.observe(statistic);
  });
}

document.addEventListener('DOMContentLoaded', startCounting);

</script>

</body>

</html>
