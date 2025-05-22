<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="assets-dashboard/images/brand-logo.png" />
  <link href="assets-client/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets-client/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-client/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-client/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-client/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-client/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets-client/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-client/css/customer.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    @if (isset($user) && is_object($user))
    <div class="profile-img">
      <img src="{{ isset($user->img) && !empty($user->img) ? asset($user->img) : asset('assets-client/img/no-user.png') }}" alt="avt" class="img-fluid rounded-circle">

    </div>

    <a href="{{route('client.index')}}" class="logo d-flex align-items-center justify-content-center">
      <h1 class="sitename">{{ $user->hoTen }}</h1>
    </a>
    @endif
    <div class="social-links text-center">
      <a href="https://x.com/" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://www.skype.com/" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{route('client.index')}}" class="{{ request()->routeIs('client.index') ? 'active' : '' }}"><i class="bi bi-house navicon"></i>Trang Chủ</a></li>
        <li><a href="{{route('user.information')}}" class="{{ request()->routeIs('user.information') ? 'active' : '' }}"><i class="bi bi-person navicon"></i> Giới Thiệu</a></li>
        <li><a href="{{route('user.class')}}" class="{{ request()->routeIs('user.class') ? 'active' : '' }}"><i class="bi bi-people-fill navicon"></i>Lớp học</a></li>
        <li class="dropdown"><a href="#" class=""><i class="bi bi-menu-button navicon"></i> <span>Cài đặt</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="">
            <li><a href="{{ route('auth.logout') }}">Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </nav>

  </header>

  <main class="main">


    

    @include($templateView)

    

  </main>

  {{-- <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer> --}}

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets-client/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets-client/js/main.js') }}"></script>

</body>

</html>