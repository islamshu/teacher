@extends('layouts.index')
@section('content')
    <div class="container " style="margin-top: 8%">
        <h1>الوظائف</h1>
        <form method="get">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="educational_material"> التخصص :</label>
                        <select id="educational_material" name="educational_material" class="form-control">
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
                            <!-- يمكن إضافة المزيد من المواد التعليمية -->
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
                <h2>الوظائف </h2>

            </div>

            <div class="row gy-5">
                @foreach ($jobs as $item)
                <div class="col-xl-3 col-md-4">
        
                    <div class="card" style="width: auto;text-align:center">
                      <a href="{{ route('job',encrypt($item->id)) }}"><img class="card-img-top" src="{{ asset('uploads/'.$item->school->image) }}" width="300" height="200" alt="Card image cap"></a>
                      <div id="overlay">
                          <div class="text"> {{ $item->school->name }}</div>
                        </div>
                      <div class="card-body">
                     <a href="{{ route('job',encrypt($item->id)) }}">  <p class="card-text">  عنوان الوظيفة : {{ $item->title }} </p></a> 
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"> التخصص  : {{ $item->educational_material }}</li>
                        <li class="list-group-item"> ينتهي الطلب في : {{ $item->end_at }}</li>
                        <li class="list-group-item"> عدد المتقدمين حاليا : {{ $item->orders->count() }} متقدم</li>
                      </ul>
                      <div class="card-body">
                        @if($item->end_at < now())
                        <span style="color:red"> انتهى وقت التقديم للوظيفة </span>
                        @else
                        <button @if(check_login() != 1) class="loginalert btn btn-info" @else data-trash-id="{{$item->id}}" class="send-request btn btn-info" @endif class="card-link">انضم للوظيفة</a>
                        @endif    
                        </div>
                    </div>
                  </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $jobs->links('frontend.paginateion') }}
                </div>
                <!-- End Team Member -->




            </div>

        </div>
    </section>
    </div>
@endsection
