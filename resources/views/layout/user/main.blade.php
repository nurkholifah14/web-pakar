<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('tittle')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('user/assets/img/logo-klinik.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('user/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user/assets/css/style.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('user/font-awesome-pro-master/css/all.min.css') }}">
  

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<body>
    @include('layout.user.navbar')

    <main id="main">
        @yield('container')
    </main>

    @include('layout.user.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('user/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset ('user/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('user/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user/assets/js/main.js')}}"></script>
    <!--JS untukk diagnosa -->
    <script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>