<section id="team" class="team">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2> المعلمين</h2>

        </div>


        <div class="row gy-5">
            @foreach (App\Models\Teacher::orderby('id', 'desc')->where('type', 'teacher')->where('is_paid', 1)->take(6)->get() as $item)
                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset('uploads/' . $item->image) }}" height="100"
                                class="img-fluid imge_hight" alt="">
                        </div>
                        <div class="member-info">
                            <div class="social">
                                <a
                                    @if (check_login() != 1) class="loginalert" @else target="_blank" href="https://wa.me/{{ $item->whataspp_number }}" @endif><i
                                        class="bi bi-whatsapp"></i></a>
                                <a
                                    @if (check_login() != 1) class="loginalert" @else href="{{ asset('uploads/' . $item->cv) }}" target="_blank" @endif><i
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

                            <span>{{ $item->export_number }} : سنوات الخبرة</span>
                            <span><button class="btn btn-{{ get_status_class_teacher($item->status) }}">{{ get_status_teacher($item->status) }}</button></span>

                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Team Member -->




        </div>

    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ route('teachers') }}" class="btn btn-info mt-3"> مشاهدة الجميع</a>

    </div>


</section>
