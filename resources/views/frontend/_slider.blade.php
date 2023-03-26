<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach (App\Models\Slider::where('status',1)->get() as $key=> $item)
            
      <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
    
      @endforeach

    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach (App\Models\Slider::where('status',1)->get() as $key=> $item)

      <div class="carousel-item mt-2 {{ $key == 0 ? 'active' : '' }}">
       <a href="{{ $item->url }}"> <img class="slider-image" src="{{ asset('uploads/'.$item->image) }}" alt="Slide 1" style="width: 100%"></a>
      </div>
      @endforeach
  
     
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>