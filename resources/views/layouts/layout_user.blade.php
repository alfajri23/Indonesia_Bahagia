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
    <link rel="stylesheet" href="{{asset('css/user/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/templatemo-eduwell-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/lightbox.css')}}">

    <script src="{{ asset('js/app.js') }}" defer></script>
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  @include('components.navbar.navbar_user')
  <!-- ***** Header Area End ***** -->

  @yield('content')
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <script src="{{ asset('js/user/isotope.min.js')}}"></script>
    <script src="{{ asset('js/user/owl-carousel.js')}}"></script>
    <script src="{{ asset('js/user/lightbox.js')}}"></script>
    <script src="{{ asset('js/user/tabs.js')}}"></script>
    <script src="{{ asset('js/user/video.js')}}"></script>
    <script src="{{ asset('js/user/slick-slider.js')}}"></script>
    <script src="{{ asset('js/user/custom.js')}}"></script>
    {{-- <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script> --}}
</body>

</html>