<section id="team" class="team">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2> الباحثين عن عمل</h2>

        </div>


        <div class="row gy-5">
            @foreach (App\Models\Teacher::orderby('id', 'desc')->where('type', 'teacher')->where('is_paid', 1)->take(6)->get() as $item)
                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                          <div class="flip-card-front">
                            <img src="{{ asset('uploads/' . $item->image) }}" alt="Avatar" style="width:400px;height:400px;">
                            
                          </div>
                          
                          <div class="flip-card-back">
                            
                            <h4 >{{ $item->name }}</h4>
                            <span><button class="btn btn-{{ get_status_class_teacher($item->status) }}">{{ get_status_teacher($item->status) }}</button></span>
                            <br>
                            
                            <span>{{ $item->country }}</span><br>
                            <span> الوظيفة : {{ $item->job }} </span><br>
                            @if($item->job == 'معلم')
                            <span> التخصص : {{ $item->educational_material }} </span><br>
                            @endif

                            <span>{{ $item->export_number }} : سنوات الخبرة</span><br>
                            <div class="social">
                                <a @if(check_login() != 1) class="loginalert" @else target="_blank" href="https://wa.me/{{ $item->teacher->whataspp_number }}" @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                      </svg>
                                </a>
                               
                                <a  @if(check_login() != 1) class="loginalert" @else href="{{ asset('uploads/' . $item->teacher->cv) }}" target="_blank" @endif >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                                      </svg>
                                      
                                    </a>
                                       
                                        @if(school_login() ==1) <a href="{{ route('chat_user', encrypt($item->teacher->id)) }}" target="_blank" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                                <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                                <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                                              </svg>
                                        </a>@endif
    
                            </div>
                          </div>
                        </div>
                      </div>
                    
                </div>
            @endforeach
            <!-- End Team Member -->




        </div>

    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('teachers') }}" class="btn btn-info mt-3"> مشاهدة الجميع</a>

    </div>


</section>
