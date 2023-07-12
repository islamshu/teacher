@extends('layouts.index')

@section('content')
<div class="container " style="margin-top: 10%;margin-bottom: 10%;text-align: right">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img src="{{ asset('uploads/'.$user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle mb-2" style="max-width: 100px;">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> الملف الشخصي</h5>
                    @include('dashboard.parts._error')
                    @include('dashboard.parts._success')

                    <form method="POST" action="{{ route('teacher_update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الاكتروني</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="whataspp_number" class="form-label"> رقم الواتساب</label>
                            <input type="text" name="whataspp_number" id="whataspp_number" class="form-control @error('whataspp_number') is-invalid @enderror" value="{{ old('whataspp_number', $user->whataspp_number) }}" required>

                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar">الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">السيرة الذاتية</label>
                            <div class="custom-file">
                                <input type="file" name="cv" id="avatar" class="custom-file-input @error('cv') is-invalid @enderror" >
                                <label class="custom-file-label" for="cv">Choose file</label>
                            </div>
                            @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label for="country">الدولة</label>
                            <select id="country" class="form-control" required name="country">
                                <option value="" >اختر دولتك</option>
                                <option value="الجزائر" @if ($user->country == 'الجزائر') selected @endif>الجزائر</option>
                                <option value="البحرين" @if ($user->country == 'البحرين') selected @endif>البحرين</option>
                                <option value="جزر القمر" @if ($user->country == 'جزر القمر') selected @endif>جزر القمر</option>
                                <option value="جيبوتي" @if ($user->country == 'جيبوتي') selected @endif>جيبوتي</option>
                                <option value="مصر" @if ($user->country == 'مصر') selected @endif>مصر</option>
                                <option value="العراق" @if ($user->country == 'العراق') selected @endif>العراق</option>
                                <option value="الأردن" @if ($user->country == 'الأردن') selected @endif>الأردن</option>
                                <option value="الكويت" @if ($user->country == 'الكويت') selected @endif>الكويت</option>
                                <option value="لبنان" @if ($user->country == 'لبنان') selected @endif>لبنان</option>
                                <option value="ليبيا" @if ($user->country == 'ليبيا') selected @endif>ليبيا</option>
                                <option value="موريتانيا" @if ($user->country == 'موريتانيا') selected @endif>موريتانيا</option>
                                <option value="المغرب" @if ($user->country == 'المغرب') selected @endif>المغرب</option>
                                <option value="عُمان" @if ($user->country == 'عُمان') selected @endif>عُمان</option>
                                <option value="فلسطين" @if ($user->country == 'فلسطين') selected @endif>فلسطين</option>
                                <option value="قطر" @if ($user->country == 'قطر') selected @endif>قطر</option>
                                <option value="المملكة العربية السعودية" @if ($user->country == 'المملكة العربية السعودية') selected @endif>
                                    المملكة العربية السعودية</option>
                                <option value="الصومال" @if ($user->country == 'الصومال') selected @endif>الصومال</option>
                                <option value="السودان" @if ($user->country == 'السودان') selected @endif>السودان</option>
                                <option value="سوريا" @if ($user->country == 'سوريا') selected @endif>السودان</option>
                                <option value="تونس" @if ($user->country == 'تونس') selected @endif>السودان</option>
                                <option value="الإمارات العربية المتحدة" @if ($user->country == 'الإمارات العربية المتحدة') selected @endif>
                                    السودان</option>
                                <option value="اليمن" @if ($user->country == 'اليمن') selected @endif>السودان</option>
                            </select>
                             
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="job">الوظيفة  :</label>
                            <select id="job"  name="job" class="form-control job_profile">
                                <option value="">يرجى الاختيار</option>
                                <option value="منسقة مدرسة"  @if($user->job == 'منسقة مدرسة') selected @endif @>منسق/ة مدرسة</option>
                                <option value="مشرفة تربوية"  @if($user->job == 'مشرفة تربوية') selected @endif>مشرف/ة تربوية</option>
                                <option value="مساعد أو مساعدة مدير مدرسة"  @if($user->job == 'مساعد أو مساعدة مدير مدرسة') selected @endif>مساعد/ة مدير مدرسة</option>
                                <option value="معلم مجال أول ( لغة عربية أو تربية اسلامية )" @if($user->job == 'معلم مجال أول ( لغة عربية أو تربية اسلامية )') selected @endif>معلم/ة مجال أول ( لغة عربية أو تربية اسلامية ) </option>
                                <option value="معلمة مجال ثاني ( علوم أو رياضيات )"  @if($user->job == 'معلمة مجال ثاني ( علوم أو رياضيات )') selected @endif>معلم/ة مجال ثاني ( علوم أو رياضيات )</option>
                                <option value="معلم تقنية معلومات" @if($user->job == 'معلم تقنية معلومات') selected @endif>معلم/ة تقنية معلومات </option>
                                <option value="أخصائية اجتماعية"  @if($user->job == 'أخصائية اجتماعية') selected @endif>أخصائي/ية اجتماعية</option>
                                <option value="أخصائية نفسية"  @if($user->job == 'أخصائية نفسية') selected @endif>أخصائي/ية نفسية</option>
                                <option value="معلم" @if($user->job == 'معلم') selected @endif>معلم/ة</option>
    
                                
                                <!-- يمكن إضافة المزيد من المواد التعليمية -->
                            </select>
                            @error('job')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" id="educational_material_profile_div" @if($user->job != 'معلم' ) style="display: none" @endif>
                            <label for="country">التخصص </label>
                            <select id="educational_material_profile" @if($user->job == 'معلم' ) required @endif name="educational_material" class="form-control">
                                <option value="">يرجى الاختيار</option>
                                <option value="رياض الأطفال" @if ($user->educational_material == 'رياض الأطفال') selected @endif>رياض الأطفال</option>

                                <option value="الرياضيات" @if ($user->educational_material == 'الرياضيات') selected @endif>الرياضيات</option>
                                <option value="اللغة العربية" @if ($user->educational_material == 'اللغة العربية') selected @endif>اللغة العربية
                                </option>
                                <option value="اللغة الإنجليزية" @if ($user->educational_material == 'اللغة الإنجليزية') selected @endif>اللغة
                                    الإنجليزية</option>
                                <option value="العلوم" @if ($user->educational_material == 'العلوم') selected @endif>العلوم</option>
                                <option value="التاريخ" @if ($user->educational_material == 'التاريخ') selected @endif>التاريخ</option>
                                <option value="الجغرافيا" @if ($user->educational_material == 'الجغرافيا') selected @endif>الجغرافيا</option>
                                <option value="الفلسفة" @if ($user->educational_material == 'الفلسفة') selected @endif>الفلسفة</option>
                                <option value="الاجتماعيات" @if ($user->educational_material == 'الاجتماعيات') selected @endif>الاجتماعيات
                                </option>
                                <option value="الاقتصاد" @if ($user->educational_material == 'الاقتصاد') selected @endif>الاقتصاد</option>
                                <option value="التربية الدينية" @if ($user->educational_material == 'التربية الدينية') selected @endif>التربية
                                    الدينية</option>
                                <option value="التربية الفنية" @if ($user->educational_material == 'التربية الفنية') selected @endif>التربية
                                    الفنية</option>
                                <option value="التربية المدنية" @if ($user->educational_material == 'التربية المدنية') selected @endif>التربية
                                    المدنية</option>
                                <option value="التربية الرياضية" @if ($user->educational_material == 'التربية الرياضية') selected @endif>التربية
                                    الرياضية</option>
                                <option value="الإعلام والاتصال" @if ($user->educational_material == 'الإعلام والاتصال') selected @endif>الإعلام
                                    والاتصال</option>
                                <option value="اللغة الفرنسية" @if ($user->educational_material == 'اللغة الفرنسية') selected @endif>اللغة
                                    الفرنسية</option>
                                <option value="اللغة الألمانية" @if ($user->educational_material == 'اللغة الألمانية') selected @endif>اللغة
                                    الألمانية</option>
                                <option value="اللغة الإسبانية" @if ($user->educational_material == 'اللغة الإسبانية') selected @endif>اللغة
                                    الإسبانية</option>
                                    <option value="مصادر تعلم" @if ($user->educational_material == 'مصادر تعلم') selected @endif>مصادر تعلم
                                    </option>

                                <!-- يمكن إضافة المزيد من المواد التعليمية -->
                            </select>
                             
                            @error('educational_material')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="years_of_experience">عدد سنوات الخبرة </label>
                            <input type="number" name="years_of_experience" id="years_of_experience" class="form-control @error('years_of_experience') is-invalid @enderror" value="{{ old('years_of_experience', $user->export_number) }}" required>

                             
                            @error('years_of_experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">تأكيد كلمة المرور</label>
                            <input type="password" name="confirm-password" id="confirm-password"
                                class="form-control @error('confirm-password') is-invalid @enderror"
                                >
                            @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"> تحديث الملف الشخصي</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
