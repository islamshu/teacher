<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel"> معلومات المدرسة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="230" height="200"
                            alt="Company Logo">
                    </div>
                </div>
                <form id="submit-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="companyName" class="form-label"> صورة المدرسة</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label"> اسم المدرسة</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label"> البريد الاكتروني</label>
                        <input type="email" class="form-control" id="companyEmail" name="companyEmail" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="commercialRegister" class="form-label"> السجل التجاري</label>
                        <input type="file" class="form-control" id="commercialRegister" name="commercialRegister"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">كلمة المرور</label>
                        <div class="password-wrapper">

                        <input type="password" class="form-control" id="companyPassword" name="companyPassword"
                            minlength="8" required
                            >
                            <span class="eye-icon" onclick="togglePasswordVisibility('companyPassword')"></span>
                        </div>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label"> تأكيد كلمة المرور</label>
                        <div class="password-wrapper">

                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            minlength="8" required>
                            <span class="eye-icon" onclick="togglePasswordVisibility('confirmPassword')"></span>
                        </div>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%"> تسجيل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgetModal" tabindex="-1" aria-labelledby="forgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgetModalLabel">استرجاع كلمة المرور  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="230" height="200"
                            alt="Company Logo">
                    </div>
                </div>
                <div id="error_forget-id" style="text-align: center;color: red;font-size: 20px;"></div>
                <form id="forget-form" method="post" action="{{ route('forget_user') }}" enctype="multipart/form-data"
                    onsubmit="forgitForm(); return false;">
                    @csrf

                    <div class="mb-3">
                        <label for="companyEmail" class="form-label"> البريد الاكتروني</label>
                        <input type="email" class="form-control" id="emailforget" name="emailforget" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  

                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%"> استرجاع كلمة المرور </button>
                    </div>
                    <a   data-bs-toggle="modal" data-bs-target="#loginModal" >الرجوع لتسجيل الدخول  </a>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">تسجيل دخول </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="230" height="200"
                            alt="Company Logo">
                    </div>
                </div>
                <div id="error-id" style="text-align: center;color: red;font-size: 20px;"></div>
                <form id="login-form" method="post" action="{{ route('login_user') }}" enctype="multipart/form-data"
                    onsubmit="LoginForm(); return false;">
                    @csrf

                    <div class="mb-3">
                        <label for="companyEmail" class="form-label"> البريد الاكتروني</label>
                        <input type="emailUser" class="form-control" id="emailUser" name="email" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="password-wrapper">

                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="8"
                            required>
                            <span style="margin-top:2%" class="eye-icon" onclick="togglePasswordVisibility('password')"></span>
                        </div>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%"> تسجيل دخول</button>
                    </div>
                    <a   data-bs-toggle="modal" data-bs-target="#forgetModal" >نسيت كلمة المرور</a>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="tacherModal" tabindex="-1" aria-labelledby="tacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tacherModalLabel"> معلومات المعلم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="230" height="200"
                            alt="Company Logo">
                    </div>
                </div>
                <div class="alert alert-warning ">
                    {!! str_replace('{amount}',' '. get_general_value('subscription_fee'). ' ريال عماني ', get_general_value('teacher_policy'))   !!}
                </div>
                <form id="teacher-form" method="post" action="{{ route('teacher_register') }}"
                    enctype="multipart/form-data" onsubmit="teacherForm(); return false;">
                    @csrf
                    <div class="mb-3">
                        <label for="companyName" class="form-label"> صورة الباحث عن عمل</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label"> اسم الباحث عن عمل</label>
                        <input type="text" class="form-control" id="teacherName" name="teacherName" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyEmail" class="form-label"> البريد الاكتروني</label>
                        <input type="email" class="form-control" id="teacherEmail" name="teacherEmail" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="password-wrapper">

                    <div class="mb-3">
                        <label for="companyPasswordd" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="companyPasswordd" name="teachePassword"
                            minlength="8" required>
                            <span style="margin-top:2%" class="eye-icon" onclick="togglePasswordVisibility('companyPasswordd')"></span>
                        </div>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="password-wrapper">

                    <div class="mb-3">
                        <label for="confirmPasswordd" class="form-label"> تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="confirmPasswordd"
                            name="teacheConformPassword" minlength="8" required>
                            <span style="margin-top:2%" class="eye-icon" onclick="togglePasswordVisibility('confirmPasswordd')"></span>
                        </div>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="whataspp_number" class="form-label"> رقم الواتساب</label>
                        <input type="string" class="form-control" id="whataspp_number" name="whataspp_number"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="country"> الدولة:</label>
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
                        <label for="education_level">عدد سنوات الخبرة  :</label>
                        
                        <input type="number" class="form-control" id="years_of_experience" name="years_of_experience"
                         required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="job">الوظيفة  :</label>
                        <select id="job" required name="job" class="form-control">
                            <option value="">يرجى الاختيار</option>
                            <option value="منسقة مدرسة">منسق/ة مدرسة</option>
                            <option value="مشرفة تربوية">مشرف/ة تربوية</option>
                            <option value="مساعد أو مساعدة مدير مدرسة"> مساعد/ة مدير مدرسة</option>
                            <option value="معلم مجال أول ( لغة عربية أو تربية اسلامية )">معلم/ة مجال أول ( لغة عربية أو تربية اسلامية ) </option>
                            <option value="معلم تقنية معلومات">معلم/ة تقنية معلومات </option>
                            <option value="معلمة مجال ثاني ( علوم أو رياضيات )">معلم/ة مجال ثاني ( علوم أو رياضيات )</option>
                            <option value="أخصائية اجتماعية">أخصائي/ية اجتماعية</option>
                            <option value="أخصائية نفسية">أخصائي/ية نفسية</option>
                            <option value="معلم">معلم/ة</option>

                            
                    

                            
                            <!-- يمكن إضافة المزيد من المواد التعليمية -->
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3" id="educational_material_div" style="display: none">
                        <label for="educational_material">التخصص  :</label>
                        <select id="educational_material" name="educational_material" class="form-control">
                            <option value="">يرجى الاختيار</option>
                            <option value="رياض الأطفال">رياض الأطفال</option>
                            <option value="الرياضيات">الرياضيات</option>
                            <option value="اللغة العربية">اللغة العربية</option>
                            <option value="اللغة الإنجليزية">اللغة الإنجليزية</option>
                            <option value="العلوم">العلوم</option>
                            <option value="التاريخ">التاريخ</option>
                            <option value="الجغرافيا">الجغرافيا</option>
                            <option value="الفلسفة">الفلسفة</option>
                            <option value="الاجتماعيات">الاجتماعيات</option>
                            <option value="الاقتصاد">الاقتصاد</option>
                            <option value="التربية الاسلامية">التربية الاسلامية</option>
                            <option value="التربية الفنية">التربية الفنية</option>
                            <option value="التربية المدنية">التربية المدنية</option>
                            <option value="التربية الرياضية">التربية الرياضية</option>
                            <option value="الإعلام والاتصال">الإعلام والاتصال</option>
                            <option value="اللغة الفرنسية">اللغة الفرنسية</option>
                            <option value="اللغة الألمانية">اللغة الألمانية</option>
                            <option value="اللغة الإسبانية">اللغة الإسبانية</option>
                            <option value="مصادر تعلم">مصادر تعلم</option>
                            <option value="صعوبات التعلم">صعوبات التعلم</option>
                            <option value="الاجتماعيات">الاجتماعيات</option>
                            <option value="التربية الموسيقية">التربية الموسيقية</option>
                            <option value="كيمياء">كيمياء</option>
                            <option value="فيزياء">فيزياء</option>
                            <option value="أحياء">أحياء</option>
                         
                            
                            <!-- يمكن إضافة المزيد من المواد التعليمية -->
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="country"> السيرة الذاية (ملف pdf):</label>
                        <input type="file" class="form-control" id="cv" name="cv" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>






                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%"> تسجيل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>