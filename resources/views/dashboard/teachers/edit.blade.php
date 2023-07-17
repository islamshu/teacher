@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i>تعديل المدرس : {{ $teacher->name }}</a>
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

                                    <form action="{{ route('teachers.update',$teacher->id)}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الصورة :</label>
                                                    <input type="file" class="form-control image"    name="image"  id="">
                                                </div>
                                                <div class="form-group">
                                                    <img src="{{ asset('uploads/'.$teacher->image) }}" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>
                                            </div>
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الاسم  :</label>
                                                    <input type="text"  required name="name" value="{{ $teacher->name}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> البريد الاكتروني  :</label>
                                                    <input type="email"  required name="email" value="{{ $teacher->email}}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> رقم الواتس اب   :</label>
                                                    <input type="text"  required name="whataspp_number" value="{{ $teacher->whataspp_number }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الدولة     :</label>
                                                    <select id="country" class="form-control" required name="country">
                                                        <option value="" >اختر دولتك</option>
                                                        <option value="الجزائر" @if ($teacher->country == 'الجزائر') selected @endif>الجزائر</option>
                                                        <option value="البحرين" @if ($teacher->country == 'البحرين') selected @endif>البحرين</option>
                                                        <option value="جزر القمر" @if ($teacher->country == 'جزر القمر') selected @endif>جزر القمر</option>
                                                        <option value="جيبوتي" @if ($teacher->country == 'جيبوتي') selected @endif>جيبوتي</option>
                                                        <option value="مصر" @if ($teacher->country == 'مصر') selected @endif>مصر</option>
                                                        <option value="العراق" @if ($teacher->country == 'العراق') selected @endif>العراق</option>
                                                        <option value="الأردن" @if ($teacher->country == 'الأردن') selected @endif>الأردن</option>
                                                        <option value="الكويت" @if ($teacher->country == 'الكويت') selected @endif>الكويت</option>
                                                        <option value="لبنان" @if ($teacher->country == 'لبنان') selected @endif>لبنان</option>
                                                        <option value="ليبيا" @if ($teacher->country == 'ليبيا') selected @endif>ليبيا</option>
                                                        <option value="موريتانيا" @if ($teacher->country == 'موريتانيا') selected @endif>موريتانيا</option>
                                                        <option value="المغرب" @if ($teacher->country == 'المغرب') selected @endif>المغرب</option>
                                                        <option value="عُمان" @if ($teacher->country == 'عُمان') selected @endif>عُمان</option>
                                                        <option value="فلسطين" @if ($teacher->country == 'فلسطين') selected @endif>فلسطين</option>
                                                        <option value="قطر" @if ($teacher->country == 'قطر') selected @endif>قطر</option>
                                                        <option value="المملكة العربية السعودية" @if ($teacher->country == 'المملكة العربية السعودية') selected @endif>
                                                            المملكة العربية السعودية</option>
                                                        <option value="الصومال" @if ($teacher->country == 'الصومال') selected @endif>الصومال</option>
                                                        <option value="السودان" @if ($teacher->country == 'السودان') selected @endif>السودان</option>
                                                        <option value="سوريا" @if ($teacher->country == 'سوريا') selected @endif>السودان</option>
                                                        <option value="تونس" @if ($teacher->country == 'تونس') selected @endif>السودان</option>
                                                        <option value="الإمارات العربية المتحدة" @if ($teacher->country == 'الإمارات العربية المتحدة') selected @endif>
                                                            السودان</option>
                                                        <option value="اليمن" @if ($teacher->country == 'اليمن') selected @endif>السودان</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> عدد سنوات الخبرة      :</label>
                                                    <input type="number"  required name="years_of_experience" value="{{ $teacher->export_number }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">الوظيفة</label>
                                                    <select id="job"  name="job" class="form-control job_profile">
                                                        <option value="">يرجى الاختيار</option>
                                                        <option value="منسقة مدرسة"  @if($teacher->job == 'منسقة مدرسة') selected @endif @>منسق/ة مدرسة</option>
                                                        <option value="مشرفة تربوية"  @if($teacher->job == 'مشرفة تربوية') selected @endif>مشرف/ة تربوية</option>
                                                        <option value="مساعد أو مساعدة مدير مدرسة"  @if($teacher->job == 'مساعد أو مساعدة مدير مدرسة') selected @endif>مساعد/ة مدير مدرسة</option>
                                                        <option value="معلم مجال أول ( لغة عربية أو تربية اسلامية )" @if($teacher->job == 'معلم مجال أول ( لغة عربية أو تربية اسلامية )') selected @endif>معلم/ة مجال أول ( لغة عربية أو تربية اسلامية ) </option>
                                                        <option value="معلمة مجال ثاني ( علوم أو رياضيات )"  @if($teacher->job == 'معلمة مجال ثاني ( علوم أو رياضيات )') selected @endif>معلم/ة مجال ثاني ( علوم أو رياضيات )</option>
                                                        <option value="معلم تقنية معلومات" @if($teacher->job == 'معلم تقنية معلومات') selected @endif>معلم/ة تقنية معلومات </option>
                                                        <option value="أخصائية اجتماعية"  @if($teacher->job == 'أخصائية اجتماعية') selected @endif>أخصائي/ية اجتماعية</option>
                                                        <option value="أخصائية نفسية"  @if($teacher->job == 'أخصائية نفسية') selected @endif>أخصائي/ية نفسية</option>
                                                        <option value="معلم" @if($teacher->job == 'معلم') selected @endif>معلم/ة</option>
                            
                                                        
                                                        <!-- يمكن إضافة المزيد من المواد التعليمية -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="educational_material_div" @if($teacher->job != 'معلم') style="display: none" @endif>
                                                <div class="form-group">
                                                    <label for="email"> التخصص      :</label>
                                                    <select id="educational_material_profile" @if($teacher->job == 'معلم' ) required @endif name="educational_material" class="form-control">
                                                        <option value="">يرجى الاختيار</option>
                                                        <option value="رياض الأطفال" @if ($teacher->educational_material == 'رياض الأطفال') selected @endif>رياض الأطفال</option>
                        
                                                        <option value="الرياضيات" @if ($teacher->educational_material == 'الرياضيات') selected @endif>الرياضيات</option>
                                                        <option value="اللغة العربية" @if ($teacher->educational_material == 'اللغة العربية') selected @endif>اللغة العربية
                                                        </option>
                                                        <option value="اللغة الإنجليزية" @if ($teacher->educational_material == 'اللغة الإنجليزية') selected @endif>اللغة
                                                            الإنجليزية</option>
                                                        <option value="العلوم" @if ($teacher->educational_material == 'العلوم') selected @endif>العلوم</option>
                                                        <option value="التاريخ" @if ($teacher->educational_material == 'التاريخ') selected @endif>التاريخ</option>
                                                        <option value="الجغرافيا" @if ($teacher->educational_material == 'الجغرافيا') selected @endif>الجغرافيا</option>
                                                        <option value="الفلسفة" @if ($teacher->educational_material == 'الفلسفة') selected @endif>الفلسفة</option>
                                                        <option value="الاجتماعيات" @if ($teacher->educational_material == 'الاجتماعيات') selected @endif>الاجتماعيات
                                                        </option>
                                                        <option value="الاقتصاد" @if ($teacher->educational_material == 'الاقتصاد') selected @endif>الاقتصاد</option>
                                                        <option value="التربية الاسلامية" @if ($teacher->educational_material == 'التربية الاسلامية') selected @endif>التربية
                                                            الدينية</option>
                                                        <option value="التربية الفنية" @if ($teacher->educational_material == 'التربية الفنية') selected @endif>التربية
                                                            الفنية</option>
                                                        <option value="التربية المدنية" @if ($teacher->educational_material == 'التربية المدنية') selected @endif>التربية
                                                            المدنية</option>
                                                        <option value="التربية الرياضية" @if ($teacher->educational_material == 'التربية الرياضية') selected @endif>التربية
                                                            الرياضية</option>
                                                        <option value="الإعلام والاتصال" @if ($teacher->educational_material == 'الإعلام والاتصال') selected @endif>الإعلام
                                                            والاتصال</option>
                                                        <option value="اللغة الفرنسية" @if ($teacher->educational_material == 'اللغة الفرنسية') selected @endif>اللغة
                                                            الفرنسية</option>
                                                        <option value="اللغة الألمانية" @if ($teacher->educational_material == 'اللغة الألمانية') selected @endif>اللغة
                                                            الألمانية</option>
                                                        <option value="اللغة الإسبانية" @if ($teacher->educational_material == 'اللغة الإسبانية') selected @endif>اللغة
                                                            الإسبانية</option>
                                                            <option value="مصادر تعلم" @if ($teacher->educational_material == 'مصادر تعلم') selected @endif>مصادر تعلم
                                                            </option>
                                                            <option value="صعوبات التعلم" @if ($teacher->educational_material == 'صعوبات التعلم') selected @endif>
                                                                صعوبات التعلم</option>
                                                            <option value="الاجتماعيات" @if ($teacher->educational_material == 'الاجتماعيات') selected @endif>
                                                                الاجتماعيات</option>
                                                            <option value="التربية الموسيقية" @if ($teacher->educational_material == 'التربية الموسيقية') selected @endif>
                                                                التربية الموسيقية</option>
                                                            <option value="كيمياء" @if ($teacher->educational_material == 'كيمياء') selected @endif>كيمياء
                                                            </option>
                                                            <option value="فيزياء" @if ($teacher->educational_material == 'فيزياء') selected @endif>فيزياء
                                                            </option>
                                                            <option value="أحياء" @if ($teacher->educational_material == 'أحياء') selected @endif>أحياء
                                                            </option>
                        
                        
                                                        <!-- يمكن إضافة المزيد من المواد التعليمية -->
                                                    </select>
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> CV       :</label>
                                                    <br>
                                                    <input type="file"  name="cv" class="form-control" >
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
            $('#educational_material_profile').attr('required', true);
            $("#educational_material_div").css("display", "block")


        } else {
            $("#educational_material_div").css("display", "none")
            $('#educational_material_profile').attr('required', false);
        }
    });
    </script>
@endsection
