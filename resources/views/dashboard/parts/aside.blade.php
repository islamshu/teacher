<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        {{-- @if (auth()->user()->type != 'famous' || auth()->user()->famous == null) --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item  ">
                <a href="{{ route('sliders.index') }}">
                    <i class="fa fa-image"></i>
                    <span class="menu-title">سلايدر </span></a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('how_it_works.index') }}">
                    <i class="fa fa-h-square"></i>
                    <span class="menu-title">كيفية عمل العمل </span></a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('services.index') }}">
                    <i class="fa fa-h-square"></i>
                    <span class="menu-title"> الخدمات </span></a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('fteures.index') }}">
                    <i class="fa fa-h-square"></i>
                    <span class="menu-title"> الميزات </span></a>
            </li>
            <li class="nav-item  ">
              <a href="{{ route('aboutpage.index') }}">
                  <i class="fa fa-h-square"></i>
                  <span class="menu-title"> من نحن </span></a>
          </li>
          <li class="nav-item  ">
            <a href="{{ route('teachers.index') }}">
                <i class="fa fa-user"></i>
                <span class="menu-title"> المعلمين</span></a>
        </li>
        <li class="nav-item  ">
            <a href="{{ route('schools.index') }}">
                <i class="fa fa-user"></i>
                <span class="menu-title"> المدارس</span></a>
        </li>
        <li class="nav-item  ">
            <a href="{{ route('messages.index') }}">
                <i class="fa fa-user"></i>
                <span class="menu-title"> طلبات التواصل</span></a>
        </li>
        <li class="nav-item has-sub ">
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="menu-title">الاعدادات</span></a>
            <ul class="menu-content" style="">
                <li class="is-shown"><a class="menu-item" href="{{ route('setting') }}">البيانات الاساسية</a>
                </li>
                <li class="is-shown"><a class="menu-item" href="{{ route('socal') }}">  اعدادات السوشل ميديا   </a>
                </li>
                
  
                
  
                
             
      
      
            </ul>
        </li>

        </ul>
    </div>
</div>
