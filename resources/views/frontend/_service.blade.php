<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2> خدماتنا</h2>
        </div>

        <div class="row gy-5">
            @foreach (App\Models\Service::orderby('id','desc')->get() as $item)
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="service-item">
                    <div class="img">
                        <img src="{{ asset('uploads/'.$item->image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="details position-relative">
                    
                        <a href="#" class="stretched-link">
                            <h3>{{ $item->title }}</h3>
                        </a>
                        {{-- <p>{{ $item->description }}</p> --}}
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Service Item -->


        </div>

    </div>
</section>