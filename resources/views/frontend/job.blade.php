@extends('layouts.index')
@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8">

          <article class="blog-details">

            <div class="post-img">
              <img src="{{ asset('uploads/'.$job->school->image) }}" height="500" width="600" alt="" >
            </div>

            <h2 class="title">مدرسة : {{ $job->school->name }}</h2>
            <h2 class="title">الوظيفة : {{ $job->title }}</h2>
            <h2 class="title">التخصص المطلوب : {{ $job->educational_material }}</h2>
            <button @if(check_login() != 1) class="loginalert btn btn-info" @else data-trash-id="{{$job->id}}" class="send-request btn btn-info" @endif class="card-link">انضم للوظيفة</button>


            <div class="meta-top">

              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="{{ $job->end_at }}"> ينتهي التسجيل في : {{ $job->end_at }}</time></a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
                <h4>شروط الوظيفة</h4>
                <p>
                    {!! $job->description !!}
                </p>


            </div><!-- End post content -->

           <!-- End blog comments -->

        </div>

        <div class="col-lg-4">

          <div class="sidebar">

           <!-- End sidebar search formn-->
<!-- End sidebar categories-->
            @foreach ($jobs as $item)
                
<div class="card" style="width: auto;text-align:center">
    <img class="card-img-top" src="{{ asset('uploads/'.$item->school->image) }}" width="300" height="200" alt="Card image cap">
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
      <button @if(check_login() != 1) class="loginalert btn btn-info" @else data-trash-id="{{$item->id}}" class="send-request btn btn-info" @endif class="card-link">انضم للوظيفة</a>
    </div>
  </div>
  @endforeach

  <!-- End sidebar recent posts-->

            <!-- End sidebar tags-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section>
@endsection