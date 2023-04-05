<section id="featured-services" class="featured-services">
    <div class="container">

        <div class="row gy-4">

            @foreach (App\Models\Fteure::get() as $item)
                
            <div class="col-xl-3 col-md-6  d-flex justify-content-center" data-aos="zoom-out">
                <div class="service-item position-relative">
                    <div class="icon"><i class="{{ $item->image }}"></i></div>
                    <h4><a  class="stretched-link">{{ $item->title }}</a></h4>
                    <p>{!! $item->body !!}</p>
                </div>
            </div>
            @endforeach

            <!-- End Service Item -->

          
            <!-- End Service Item -->

        </div>

    </div>
</section>