@extends('layouts.index')
@section('content')
<section id="team" class="team" style="margin-top: 8%">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>المعلمين المقدمين للوظيفة : {{ $job->title }} </h2>

        </div>

        <div class="row gy-5">
            @foreach ($job->teachers as $item)
                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset('uploads/' . $item->teacher->image) }}" class="img-fluid imge_hight" alt="">
                        </div>
                        <div class="member-info">
                            <div class="social">
                                <a @if(check_login() != 1) class="loginalert" @else target="_blank" href="https://wa.me/{{ $item->teacher->whataspp_number }}" @endif><i
                                    class="bi bi-whatsapp"></i></a>
                                <a @if(check_login() != 1) class="loginalert" @else href="{{ asset('uploads/' . $item->teacher->cv) }}" target="_blank" @endif><i
                                        class="bi bi-file-person-fill"></i></a>
                                        @if(school_login() ==1) <a href="{{ route('chat_user', encrypt($item->teacher->id)) }}" target="_blank" ><i
                                            class="bi bi-chat-dots"></i></a>@endif

                            </div>
                            <h4>{{ $item->teacher->name }}</h4>
                        <span>{{ $item->teacher->country }}</span>
                        <span> التخصص : {{ $item->teacher->educational_material }}   </span>
                        <span>  {{ $item->teacher->export_number }} :  سنوات الخبرة</span>
                        <span><button class="btn btn-{{ get_status_class_teacher($item->teacher->status) }}">{{ get_status_teacher($item->teacher->status) }}</button></span>


                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- End Team Member -->




        </div>

    </div>
</section>
</div>
@endsection