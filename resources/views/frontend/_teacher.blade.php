<section id="team" class="team">

    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Teacher</h2>
            
        </div>


        <div class="row gy-5">
            @foreach (App\Models\Teacher::orderby('id','desc')->take(6)->get() as $item)
            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('uploads/'.$item->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{{ $item->name }}</h4>
                        <span>{{ $item->country }}</span>
                        <span>{{ $item->education_level }}</span>
                        <span>{{ $item->educational_material }}</span>

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