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
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="150" height="150"
                            alt="Company Logo">
                    </div>
                </div>
                <form id="submit-form" method="post" enctype="multipart/form-data">
                    @csrf
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
                    <div class="mb-3">
                        <label for="commercialRegister" class="form-label"> السجل التجاري</label>
                        <input type="file" class="form-control" id="commercialRegister" name="commercialRegister"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="companyPassword" name="companyPassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label"> تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            minlength="8" required>
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
                        <img src="{{ asset('uploads/' . get_general_value('image')) }}" width="150" height="150"
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

                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="8"
                            required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="mb-3" style="text-align: center">

                        <button type="submit" class="btn btn-success" style="width: 40%"> تسجيل دخول</button>
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
                <h5 class="modal-title" id="tacherModalLabel"> معلومات المعلم</h5>
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
                        <label for="companyName" class="form-label"> صورة المعلم</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label"> اسم المعلم</label>
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
                    <div class="mb-3">
                        <label for="companyPassword" class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" id="companyPassword" name="teachePassword"
                            minlength="8" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label"> تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="confirmPassword"
                            name="teacheConformPassword" minlength="8" required>
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
                        <label for="educational_material">التخصص  :</label>
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