@extends('layouts.index')
@section('content')
    <div class="container " style="margin-top: 8%">
        <h1>الباحثين عن عمل</h1>
        <form method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="country"> الدولة:</label>
                        <select id="country" class="form-control" name="country">
                            <option value="" @if (!$request->has('country')) selected @endif>اختر دولتك</option>
                            <option value="الجزائر" @if ($request->country == 'الجزائر') selected @endif>الجزائر</option>
                            <option value="البحرين" @if ($request->country == 'البحرين') selected @endif>البحرين</option>
                            <option value="جزر القمر" @if ($request->country == 'جزر القمر') selected @endif>جزر القمر</option>
                            <option value="جيبوتي" @if ($request->country == 'جيبوتي') selected @endif>جيبوتي</option>
                            <option value="مصر" @if ($request->country == 'مصر') selected @endif>مصر</option>
                            <option value="العراق" @if ($request->country == 'العراق') selected @endif>العراق</option>
                            <option value="الأردن" @if ($request->country == 'الأردن') selected @endif>الأردن</option>
                            <option value="الكويت" @if ($request->country == 'الكويت') selected @endif>الكويت</option>
                            <option value="لبنان" @if ($request->country == 'لبنان') selected @endif>لبنان</option>
                            <option value="ليبيا" @if ($request->country == 'ليبيا') selected @endif>ليبيا</option>
                            <option value="موريتانيا" @if ($request->country == 'موريتانيا') selected @endif>موريتانيا</option>
                            <option value="المغرب" @if ($request->country == 'المغرب') selected @endif>المغرب</option>
                            <option value="عُمان" @if ($request->country == 'عُمان') selected @endif>عُمان</option>
                            <option value="فلسطين" @if ($request->country == 'فلسطين') selected @endif>فلسطين</option>
                            <option value="قطر" @if ($request->country == 'قطر') selected @endif>قطر</option>
                            <option value="المملكة العربية السعودية" @if ($request->country == 'المملكة العربية السعودية') selected @endif>
                                المملكة العربية السعودية</option>
                            <option value="الصومال" @if ($request->country == 'الصومال') selected @endif>الصومال</option>
                            <option value="السودان" @if ($request->country == 'السودان') selected @endif>السودان</option>
                            <option value="سوريا" @if ($request->country == 'سوريا') selected @endif>السودان</option>
                            <option value="تونس" @if ($request->country == 'تونس') selected @endif>السودان</option>
                            <option value="الإمارات العربية المتحدة" @if ($request->country == 'الإمارات العربية المتحدة') selected @endif>
                                السودان</option>
                            <option value="اليمن" @if ($request->country == 'اليمن') selected @endif>السودان</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="education_level">الوظيفة   :</label>
                        <select name="job"  class="form-control job_fillter" id="">
                        <option value="">اختر الوظيفة</option>
                        <option value="منسقة مدرسة"  @if($request->job == 'منسقة مدرسة') selected @endif @>منسق/ة مدرسة</option>
                        <option value="مشرفة تربوية"  @if($request->job == 'مشرفة تربوية') selected @endif>مشرف/ة تربوية</option>
                        <option value="مساعد أو مساعدة مدير مدرسة"  @if($request->job == 'مساعد أو مساعدة مدير مدرسة') selected @endif>مساعد/ة مدير مدرسة</option>
                        <option value="معلم مجال أول ( لغة عربية أو تربية اسلامية )" @if($request->job == 'معلم مجال أول ( لغة عربية أو تربية اسلامية )') selected @endif>معلم/ة مجال أول ( لغة عربية أو تربية اسلامية ) </option>
                        <option value="معلمة مجال ثاني ( علوم أو رياضيات )"  @if($request->job == 'معلمة مجال ثاني ( علوم أو رياضيات )') selected @endif>معلم/ة مجال ثاني ( علوم أو رياضيات )</option>
                        <option value="معلم تقنية معلومات" @if($request->job == 'معلم تقنية معلومات') selected @endif>معلم/ة تقنية معلومات </option>
                        <option value="أخصائية اجتماعية"  @if($request->job == 'أخصائية اجتماعية') selected @endif>أخصائي/ية اجتماعية</option>
                        <option value="أخصائية نفسية"  @if($request->job == 'أخصائية نفسية') selected @endif>أخصائي/ية نفسية</option>
                        <option value="معلم" @if($request->job == 'معلم') selected @endif>معلم/ة</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-3 educational_material_fillter" style="display: none" >
                    <div class="form-group">
                        <label for="educational_material_fillter"> التخصص :</label>
                        <select id="educational_material_fillter" name="educational_material" class="form-control educational_material_input">
                            <option value="">يرجى الاختيار</option>
                            <option value="رياض الأطفال" @if ($request->educational_material == 'رياض الأطفال') selected @endif>رياض الأطفال</option>

                            <option value="الرياضيات" @if ($request->educational_material == 'الرياضيات') selected @endif>الرياضيات</option>
                            <option value="اللغة العربية" @if ($request->educational_material == 'اللغة العربية') selected @endif>اللغة العربية
                            </option>
                            <option value="اللغة الإنجليزية" @if ($request->educational_material == 'اللغة الإنجليزية') selected @endif>اللغة
                                الإنجليزية</option>
                            <option value="العلوم" @if ($request->educational_material == 'العلوم') selected @endif>العلوم</option>
                            <option value="التاريخ" @if ($request->educational_material == 'التاريخ') selected @endif>التاريخ</option>
                            <option value="الجغرافيا" @if ($request->educational_material == 'الجغرافيا') selected @endif>الجغرافيا</option>
                            <option value="الفلسفة" @if ($request->educational_material == 'الفلسفة') selected @endif>الفلسفة</option>
                            <option value="الاجتماعيات" @if ($request->educational_material == 'الاجتماعيات') selected @endif>الاجتماعيات
                            </option>
                            <option value="الاقتصاد" @if ($request->educational_material == 'الاقتصاد') selected @endif>الاقتصاد</option>
                            <option value="التربية الدينية" @if ($request->educational_material == 'التربية الدينية') selected @endif>التربية
                                الدينية</option>
                            <option value="التربية الفنية" @if ($request->educational_material == 'التربية الفنية') selected @endif>التربية
                                الفنية</option>
                            <option value="التربية المدنية" @if ($request->educational_material == 'التربية المدنية') selected @endif>التربية
                                المدنية</option>
                            <option value="التربية الرياضية" @if ($request->educational_material == 'التربية الرياضية') selected @endif>التربية
                                الرياضية</option>
                            <option value="الإعلام والاتصال" @if ($request->educational_material == 'الإعلام والاتصال') selected @endif>الإعلام
                                والاتصال</option>
                            <option value="اللغة الفرنسية" @if ($request->educational_material == 'اللغة الفرنسية') selected @endif>اللغة
                                الفرنسية</option>
                            <option value="اللغة الألمانية" @if ($request->educational_material == 'اللغة الألمانية') selected @endif>اللغة
                                الألمانية</option>
                            <option value="اللغة الإسبانية" @if ($request->educational_material == 'اللغة الإسبانية') selected @endif>اللغة
                                الإسبانية</option>
                                <option value="مصادر تعلم" @if ($request->educational_material == 'مصادر تعلم') selected @endif>مصادر تعلم
                                </option>
                            <!-- يمكن إضافة المزيد من المواد التعليمية -->
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="education_level">سنوات الخبرة :</label>
                        <input type="number" name="years_experince" value="{{ $request->years_experince }}" class="form-control" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="education_level">حالة المدرس  :</label>
                        <select name="status" class="form-control" id="">
                        <option value="">اختر الحالة</option>
                        <option value="1" @if($request->status == 1) selected @endif>متاح</option>
                        <option value="2" @if($request->status == 2) selected @endif>في محادثة مع مدرسة</option>
                        <option value="3" @if($request->status == 3) selected @endif>تم تعينه</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top: 30px">
                    <button type="submit" class="btn btn-warning">ابحث</button>
                </div>
        </form>

    </div>
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>الباحثين عن عمل </h2>

            </div>

            <div class="row gy-5">
                @foreach ($teachers as $item)
                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('uploads/' . $item->image) }}" class="img-fluid imge_hight" alt="">
                            </div>
                            <div class="member-info">
                                <div class="social">
                                    @if($item->status != 3)
                                    <a @if(check_login() != 1) class="loginalert" @else target="_blank" href="https://wa.me/{{ $item->whataspp_number }}" @endif><i
                                        class="bi bi-whatsapp"></i></a>
                                        @endif
                                    <a @if(check_login() != 1) class="loginalert" @else href="{{ asset('uploads/' . $item->cv) }}" target="_blank" @endif><i
                                            class="bi bi-file-person-fill"></i></a>
                                            @if(school_login() ==1) <a href="{{ route('chat_user', encrypt($item->id)) }}" target="_blank" ><i
                                                class="bi bi-chat-dots"></i></a>@endif
    
                                </div>
                                <h4>{{ $item->name }}</h4>
                            <span>{{ $item->country }}</span>
                            <span> الوظيفة : {{ $item->job }} </span>
                            @if($item->job == 'معلم')
                            <span> التخصص : {{ $item->educational_material }} </span>
                            @endif
                            <span>  {{ $item->export_number }} :  سنوات الخبرة</span>
                            <span><button class="btn btn-{{ get_status_class_teacher($item->status) }}">{{ get_status_teacher($item->status) }}</button></span>


                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $teachers->links('frontend.paginateion') }}
                </div>
                <!-- End Team Member -->




            </div>

        </div>
    </section>
    </div>
@endsection
