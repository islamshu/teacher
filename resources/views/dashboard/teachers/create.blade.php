@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body card-dashboard">
                                    @include('dashboard.parts._error')
                                    @include('dashboard.parts._success')

                                    <br>

                                    <form action="{{ route('teachers.store')}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الصورة :</label>
                                                    <input type="file" class="form-control image"   required name="image"  id="">
                                                </div>
                                                <div class="form-group">
                                                    <img src="" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>
                                            </div>
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الاسم  :</label>
                                                    <input type="text"  required name="name" value="{{ old('name')}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> البريد الاكتروني  :</label>
                                                    <input type="email"  required name="email" value="{{ old('email')}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> رقم الواتس اب   :</label>
                                                    <input type="text"  required name="whataspp_number" value="{{ old('whataspp_number')}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الدولة     :</label>
                                                    <select id="country" class="form-control"  required name="country">
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
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> عدد سنوات الخبرة      :</label>
                                                    <input type="number"  required name="years_of_experience" value="{{ old('years_of_experience')}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">الوظيفة</label>
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
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="educational_material_div" style="display: none">
                                                <div class="form-group">
                                                    <label for="email"> التخصص      :</label>
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
                                                        <option value="التربية الدينية">التربية الدينية</option>
                                                        <option value="التربية الفنية">التربية الفنية</option>
                                                        <option value="التربية المدنية">التربية المدنية</option>
                                                        <option value="التربية الرياضية">التربية الرياضية</option>
                                                        <option value="الإعلام والاتصال">الإعلام والاتصال</option>
                                                        <option value="اللغة الفرنسية">اللغة الفرنسية</option>
                                                        <option value="اللغة الألمانية">اللغة الألمانية</option>
                                                        <option value="اللغة الإسبانية">اللغة الإسبانية</option>
                                                        <option value="مصادر تعلم">مصادر تعلم</option>
                            
                                                        
                                                        <!-- يمكن إضافة المزيد من المواد التعليمية -->
                                                    </select>                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> CV       :</label>
                                                    <br>
                                                    <input type="file" required name="cv" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password"> كلمة المرور   :</label>
                                                    <input type="password"  name="password"  class="form-control"  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="confirm_password"> تأكيد كلمة المرور     :</label>
                                                    <input type="password"  name="confirm_password"  class="form-control"  id="">
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                        <div class="col-md-6">
                                            <input type="submit" value="ارسال" class="btn btn-info" >
                                        </div>
                                    
                                    
                                        
                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
@section('script')
    <script>
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
    </script>
@endsection
