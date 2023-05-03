@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="container " style="margin-top: 10%;margin-bottom: 10%;text-align: right">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img src="{{ asset('uploads/' . $user->image) }}" alt="{{ $user->name }}"
                            class="img-fluid rounded-circle mb-2" style="max-width: 100px;">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @include('dashboard.parts._error')
                @include('dashboard.parts._success')
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">الملف الشخصي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">طلباتي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">انشاء وظيفة</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> الملف الشخصي</h5>


                                    <form method="POST" action="{{ route('company_update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">الاسم</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $user->name) }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">البريد الاكتروني</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="avatar">الصورة الشخصية</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="avatar"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="avatar">Choose file</label>
                                            </div>
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary"> تعديل الملف الشخصي</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> طلباتي </h5>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>اسم الوظيفة</th>
                                                <th>تاريخ بدء التقديم</th>
                                                <th>تاريخ تهاية التقديم</th>
                                                <th>التخصص</th>
                                                <th> عدد المتقدمين</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (App\Models\Job::where('user_id',auth('teacher')->id())->get() as $key=> $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->start_at }}</td>
                                                    <td>{{ $item->end_at }}</td>
                                                    <td>{{ 'رياضيات' }}</td>
                                                    <td><a href="{{ route('teachersjob',$item->id) }}"> {{ $item->orders->count() }}</a></td>

                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الوظيفة</th>
                                                <th>تاريخ بدء التقديم</th>
                                                <th>تاريخ تهاية التقديم</th>
                                                <th>التخصص</th>
                                                <th> عدد المتقدمين</th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> طلب وظيفة </h5>


                                    <form method="POST" action="{{ route('send_job_request') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">اسم الوظيفة</label>
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">شروط الوظيفة </label>
                                            <textarea required name="description" class="form-control @error('description') is-invalid @enderror" id=""
                                                cols="30" rows="3">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="educational_material">التخصص المطلوب   </label>
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
                                                <!-- يمكن إضافة المزيد من المواد التعليمية -->
                                            </select>
                                            @error('educational_material')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">تاريخ بدء الطلبات </label>
                                            <input type="date" name="start_date" id="start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                value="{{ old('start_date') }}" required>

                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">تاريخ انتهاء الطلبات </label>
                                            <input type="date" name="end_date" id="end_date"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                value="{{ old('end_date') }}" required>

                                            @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary"> ارسال طلب </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
