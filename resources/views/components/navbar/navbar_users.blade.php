<div class="header-wrapper pt-3 pb-3 shadow-none bg-pink">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 navbar pt-0 pb-0">
                <a href="/">
                    <h1 class="ls-3 fw-700 poppins font-xs text-white mb-0 bg-primary rounded-xxl p-2 px-3">Hallo Bahagia
                    </h1>
                    <span class="d-block fw-700 font-xsssss ls-1 text-grey-600 open-font text-center">Menuju indonesia bahagia seutuhnya</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav nav-menu float-none text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('homeUser')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('blogUser')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('forum')}}">Forum</a>
                        </li>

                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Tentang<i class="ti-angle-down"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('about')}}">Tentang</a>
                                <a class="dropdown-item" href="{{route('termCondition')}}">Syarat dan Ketentuan</a>
                                <a class="dropdown-item" href="{{route('privacy')}}">Kebijakan Privasi</a>
                                
                            </div>
                        </li>
                        

                        @auth 
                        <li class="nav-item dropdown d-block d-sm-none"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{auth()->user()->name}}<i class="ti-angle-down"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('profile')}}">Profile saya</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item d-block d-sm-none">
                            <div>
                                <a href="{{route('login')}}" class="bg-dark fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                                <a href="{{route('register')}}" class="bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>
                            </div>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 text-right d-none d-lg-block">
                @auth 
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('profile')}}">Profil saya</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        </ul>
                    </div>
                @else
                    <a href="{{route('login')}}" class="bg-dark fw-500 text-white font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                    <a href="{{route('register')}}" class="bg-current fw-500 font-xssss lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>
                @endauth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                
            </div>
        </div>
    </div>
</div>