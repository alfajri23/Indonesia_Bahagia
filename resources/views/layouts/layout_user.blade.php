<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>{{isset($title) ? $title : 'Hallo bahagia';}}</title>

    <!-- Additional CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{asset('css/user/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/templatemo-eduwell-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/lightbox.css')}}"> --}}

    <link rel="stylesheet" href="{{ asset('css/user/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/feather.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/user/owl/owl.carousel.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/templete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/skin/skin-1.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/user/style2.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user/aos.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($favicon)}}">

  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  @include('components.navbar.navbar_users')
  <!-- ***** Header Area End ***** -->

  {{-- <div class="banner-wrapper layer-after app-shape bg-antiquewhite">
    <div class="container"> --}}
      @yield('content')
    {{-- </div>
  </div> --}}

  {{-- @include('components.floating_button.floating_button') --}}


  @include('components.footer.footer_user')

    <script src="{{ asset('js/user/plugin.js') }}"></script>
    <script src="{{ asset('js/user/aos.min.js') }}"></script>
    <script src="{{ asset('js/user/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('js/user/dz.carousel.js') }}"></script>

    {{-- <script src="{{ asset('js/user/isotope.min.js')}}"></script>
    <script src="{{ asset('js/user/owl-carousel.js')}}"></script>
    <script src="{{ asset('js/user/lightbox.js')}}"></script>
    <script src="{{ asset('js/user/tabs.js')}}"></script>
    <script src="{{ asset('js/user/video.js')}}"></script>
    <script src="{{ asset('js/user/slick-slider.js')}}"></script>
    <script src="{{ asset('js/user/custom.js')}}"></script> --}}
    
</body>

</html>