@php
    $about = App\Models\Aboutpage::first();
@endphp


<section id="cta" class="cta" style="margin-top: 5%">
    <div class="container" data-aos="zoom-out">
        <div class="section-header">
            <h2> من نحن</h2>
        </div>
        <div class="row g-5">

            {{-- <div class="col-lg-4 col-md-4 content d-flex flex-column justify-content-center order-last order-md-first">
                <h3>{!! $about->title !!}</h3>
                <p> {!! $about->body !!}</p>
            </div> --}}
            {{-- col-lg-8 col-md-8 order-first order-md-last d-flex align-items-center --}}
            <div class="">
                <div class="img">
                    <img src="{{ asset('uploads/' . $about->image) }}" alt="" class="img-fluid image_mobile">
                </div>
            </div>

        </div>

    </div>
</section>
