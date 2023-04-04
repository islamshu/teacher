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

                                    <form >
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الصورة :</label>
                                                    <input type="file" class="form-control image"  disabled name="image"  id="">
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
                                                    <input type="text" disabled name="url" value="{{ $teacher->name }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> البريد الاكتروني  :</label>
                                                    <input type="text" disabled name="url" value="{{ $teacher->email }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> رقم الواتس اب   :</label>
                                                    <input type="text" disabled name="url" value="{{ $teacher->whataspp_number }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الدولة     :</label>
                                                    <input type="text" disabled name="url" value="{{ $teacher->country }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> المادة التعليمية     :</label>
                                                    <input type="text" disabled name="url" value="{{ $teacher->educational_material }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> المرحلة التعليمية      :</label>
                                                    <input type="text"  disabled name="url" value="{{ $teacher->education_level }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> CV       :</label>
                                                    <br>
                                                    <a target="_blank" href="{{ asset('uploads/'.$teacher->cv) }}">انقر لرؤية الcv</a>
                                                </div>
                                            </div>
                                          
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
