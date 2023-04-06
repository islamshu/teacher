<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ asset('frontend/img/logo.png') }}" alt=""> -->
            <h1>{{ get_general_value('title') }}<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar d-flex justify-content-center">
            <ul>

                <li><a class="nav-link scrollto " href="/">الرئيسية</a></li>
                @if(check_login() != 1)
                <li><a class="nav-link scrollto " data-bs-toggle="modal" data-bs-target="#companyModal"> تسجيل المدارس</a></li>
                <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#tacherModal"> تسجيل المعلمين</a></li>

                <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">تسجيل دخول</a></li>

                @endif
                <li><a class="nav-link scrollto" href="/#team">المعلمين</a></li>

                <li><a class="nav-link scrollto" href="/#services">الخدمات</a></li>

                <li  @if(check_login() == 1) style="margin-right: 350px" @endif><a class="nav-link scrollto" href="/#contact">تواصل معنا</a></li>
            
                @if(check_login() == 1)

                <li><a class="nav-link scrollto" href="{{ route('dashboard') }}">الملف الشخصي</a></li>

               
                <li><a class="nav-link scrollto" href="{{ route('logout_user') }}">تسجيل خروج</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->

        {{-- <button class="btn-getstarted scrollto dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action 1</a>
            <a class="dropdown-item" href="#">Action 2</a>
            <a class="dropdown-item" href="#">Action 3</a>
        </div> --}}
        
        


    </div>
</header>

