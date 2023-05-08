<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- favicon -->
      <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
      <!-- jquery-ui css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.css')}}">
      <!-- fancybox box css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/fancybox/dist/jquery.fancybox.min.css')}}">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/fontawesome/css/all.min.css')}}">
      <!-- Elmentkit Icon CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/elementskit-icon-pack/assets/css/ekiticons.css')}}">
      <!-- slick slider css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/slick/slick.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/slick/slick-theme.css')}}">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css')}}">
      {{-- swiperjs  --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

      <title>Seylan Odyssey | I help you to enjoy your journey</title>
   </head>
   <body class="home">
      <div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="{{ asset('frontend/assets/images/loader1.gif')}}" alt="">
         </div>
      </div>

      <main>
        @yield('content')
    </main>


          <!-- JavaScript -->
          <script src="{{ asset('frontend/assets/vendors/jquery/jquery.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/waypoint/waypoints.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
          <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
          <script src="{{ asset('frontend/assets/vendors/masonry/masonry.pkgd.min.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/slick/slick.min.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/fancybox/dist/jquery.fancybox.min.js')}}"></script>
          <script src="{{ asset('frontend/assets/vendors/slick-nav/jquery.slicknav.js')}}"></script>
          <script src="{{ asset('frontend/assets/js/custom.min.js')}}"></script>
          <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

          <script>
            var swiper = new Swiper(".mySwiper", {
              spaceBetween: 30,
              effect: "fade",
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
            });
          </script>

          
       </body>
    </html>