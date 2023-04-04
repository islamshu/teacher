<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ asset('frontend/img/logo.png') }}" alt=""> -->
            <h1>{{ get_general_value('title') }}<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar d-flex justify-content-center">
            <ul>

                <li><a class="nav-link scrollto" href="">Home</a></li>

                @if(check_login() != 1)
                <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#companyModal">Register Company</a></li>
                <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#tacherModal">Register Teacher</a></li>

                <li><a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>

                @endif
                <li><a class="nav-link scrollto" href="#team">Teams</a></li>

                <li><a class="nav-link scrollto" href="#services">Services</a></li>

                <li style="margin-right: 350px"><a class="nav-link scrollto" href="#contact">Contact</a></li>
            
                @if(check_login() == 1)

                <li><a class="nav-link scrollto" href="{{ route('dashboard') }}">Profile</a></li>

               
                <li><a class="nav-link scrollto" href="{{ route('logout_user') }}">Logout</a></li>
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