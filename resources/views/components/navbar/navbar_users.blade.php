<header class="site-header mo-left navstyle4 header border-bottom">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-md clearfix">
                <!-- website logo -->
                <div class="logo-header mostion logo-dark">
                    <a href="{{route('homeUser')}}">
                        <img src="{{asset($data)}}" alt="">
                    </a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                 <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
                    </div>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search ">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span id="quik-search-remove"><i class="ti-close"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="/">
                            <img src="{{asset($data)}}" alt="">
                        </a>
                    </div>
                    <ul class="nav navbar-nav">	
                        <li class="{{Request::segment('1') == '' ? 'active' : ''}}">
                            <a href="{{route('homeUser')}}">Home</a>
                        </li>

                        <li class="{{Request::segment('1') == 'blog' ? 'active' : ''}}">
                            <a href="{{route('blogUser')}}">Blog</a>
                        </li>

                        <li class="{{Request::segment('1') == 'forum' ? 'active' : ''}}">
                            <a href="{{route('forum')}}">Forum</a>
                        </li>

                        <li>
                            <a href="javascript:;">Tentang<i class="fas fa-chevron-down"></i></a>
                            <ul class="sub-menu right">
                                <li><a href="{{route('about')}}">Tentang</a></li>
                                <li><a href="{{route('termCondition')}}">Syarat dan Ketentuan</a></li>
                                <li><a href="{{route('privacy')}}">Kebijakan Privasi</a></li>
                            </ul>
                        </li>

                        @auth 
                        <li>
                            <a href="javascript:;">{{auth()->user()->name}}<i class="fas fa-chevron-down"></i></a>
                            <ul class="sub-menu right">
                                <li><a href="{{route('profile')}}">Profile saya</a></li>
                                <li><a href="{{route('changePassword')}}">Ubah password</a></li>
                                <li><a href="{{route('pembayaranRiwayat')}}">Riwayat transaksi</a></li>
                                <li><a href="{{route('eventRiwayat')}}">Event saya</a></li>
                                <li><a href="{{route('kelasRiwayat')}}">Kelas saya</a></li>
                                <li><a href="{{route('konsultasiRiwayat')}}">Konsultasi saya</a></li>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                               
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @else
                        <li class="">
                            <a href="{{route('login')}}">login</a>
                        </li>

                        <li class="">
                            <a href="{{route('register')}}">register</a>
                        </li>
                        @endauth
                    </ul>	

                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>