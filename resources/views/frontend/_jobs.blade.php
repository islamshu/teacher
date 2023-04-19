<section id="jobs" class="jobs">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>الوظائف</h2>
      </div>

      <div class="row gy-5">

        @foreach (App\Models\Job::with('school')->where('start_at','<',now())->where('end_at','>',now())->take(4)->get() as $item)

        <div class="col-xl-3 col-md-4">
        
          <div class="card" style="width: auto;text-align:center">
            <img class="card-img-top" src="{{ asset('uploads/'.$item->school->image) }}" width="300" height="200" alt="Card image cap">
            <div id="overlay">
                <div class="text"> {{ $item->school->name }}</div>
              </div>
            <div class="card-body">
              <p class="card-text">  عنوان الوظيفة : {{ $item->title }} </p>
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
        </div>
        @endforeach


      </div>

    </div>
  </section>