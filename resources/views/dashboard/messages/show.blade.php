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
                                          
                                         
                                             <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> الاسم  :</label>
                                                    <input type="text" disabled name="url" value="{{ $message->name }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> البريد الاكتروني  :</label>
                                                    <input type="text" disabled name="url" value="{{ $message->email }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">   عنوان الرسالة   :</label>
                                                    <input type="text" disabled name="url" value="{{ $message->subject }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> المادة التعليمية     :</label>
                                                    <input type="text" disabled name="url" value="{{ $message->educational_material }}" class="form-control" value="" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="email"> الموضوع       :</label>
                                                    <textarea name="" disabled class="form-control" id="" cols="30" rows="5">{{ $message->message }}</textarea>
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
