<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    {{-- @if(auth()->user()->type  != 'famous' || auth()->user()->famous == null) --}}
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="nav-item  ">
        <a href="{{ route('sliders.index') }}">
            <i class="fa fa-image"></i>
            <span class="menu-title">سلايدر  </span></a>
    </li>
    <li class="nav-item  ">
      <a href="{{ route('how_it_works.index') }}">
          <i class="fa fa-h-square"></i>
          <span class="menu-title">كيفية عمل العمل  </span></a>
  </li>
  
    </ul>
  </div>
</div>