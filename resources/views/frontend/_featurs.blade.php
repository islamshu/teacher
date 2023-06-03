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
<section id="statistics" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="statistic">
            <h3>المدارس المسجلة</h3>
            <p class="number" data-target="{{ App\Models\Teacher::where('type','school')->count() }}">0</p>
            {{-- <p class="description">Registered users</p> --}}
          </div>
        </div>
        <div class="col-md-4">
          <div class="statistic">
            <h3>عدد الباحثين عن العمل</h3>
            <p class="number" data-target="{{ App\Models\Teacher::where('type','teacher')->count() }}">0</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="statistic">
            <h3>عدد الباحثين الذين تم تعينهم </h3>
            <p class="number" data-target="{{ App\Models\Teacher::where('type','teacher')->where('status','1')->count() }}">0</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
