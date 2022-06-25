<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>EduWell - Education HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}


    <!-- Additional CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{asset('css/user/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/templatemo-eduwell-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/lightbox.css')}}"> --}}

    <link rel="stylesheet" href="{{ asset('css/user/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/owl/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/aos.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="{{ asset('js/app.js') }}" defer></script>
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  @include('components.navbar.navbar_users')
  <!-- ***** Header Area End ***** -->

  <div class="banner-wrapper layer-after app-shape">
    <div class="container">
      @yield('content')
    </div>
  </div>


  @include('components.footer.footer_user')

    <script src="{{ asset('js/user/plugin.js') }}"></script>
    <script src="{{ asset('js/user/aos.min.js') }}"></script>
    <script src="{{ asset('js/user/scripts.js') }}"></script>
    <script>
        AOS.init();
    </script>

    {{-- <script src="{{ asset('js/user/isotope.min.js')}}"></script>
    <script src="{{ asset('js/user/owl-carousel.js')}}"></script>
    <script src="{{ asset('js/user/lightbox.js')}}"></script>
    <script src="{{ asset('js/user/tabs.js')}}"></script>
    <script src="{{ asset('js/user/video.js')}}"></script>
    <script src="{{ asset('js/user/slick-slider.js')}}"></script>
    <script src="{{ asset('js/user/custom.js')}}"></script> --}}
    
</body>

</html>