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
                                                    <img src="{{ asset('uploads/'.$school->image) }}" style="width: 100px"
                                                        class="img-thumbnail image-preview" alt="">
                                                </div>
                                            </div>
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الاسم  :</label>
                                                    <input type="text" disabled name="url" value="{{ $school->name }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> البريد الاكتروني  :</label>
                                                    <input type="text" disabled name="url" value="{{ $school->email }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                       
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> السجل التجاري       :</label>
                                                    <br>
                                                    <a target="_blank" href="{{ asset('uploads/'.$school->commercialRegister) }}">انقر لرؤية السجل التجاري</a>
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
