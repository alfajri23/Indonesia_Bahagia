<header class="header-area header-sticky background-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a class="navbar-brand" href="#">Navbar</a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{route('homeUser')}}" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="{{route('blogUser')}}">Blog</a></li>

                        {{-- <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                        <li class="has-sub">
                            <a href="javascript:void(0)">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="our-services.html">Our Services</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="scroll-to-section"><a href="#testimonials">Testimonials</a></li> --}}

                        @auth 
                        <li class="has-sub">
                            <a class="" href="javascript:void(0)">{{auth()->user()->name}}</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('profile')}}">Profile saya</a></li>
                                <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="scroll-to-section"><a href="{{route('login')}}">Login</a></li>
                        @endauth
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>