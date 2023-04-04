@php
    $about = App\Models\Aboutpage::first();
@endphp


<section id="cta" class="cta">
    <div class="container" data-aos="zoom-out">

        <div class="row g-5">

            <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                <h3>{{ $about->title }}</h3>
                <p> {!! $about->body !!}</p>
            </div>

            <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                <div class="img">
                    <img src="{{ asset('uploads/' . $about->image) }}" alt="" class="img-fluid">
                </div>
            </div>

        </div>

    </div>
</section>
