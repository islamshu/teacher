<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ get_general_value('title') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('uploads/'.get_general_value('icon')) }}" rel="icon">
    <link href="{{ asset('uploads/'.get_general_value('icon')) }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">


   
    <!-- Required CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Required JavaScript -->


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css?version='  . config('app.app_version')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css?version='  . config('app.app_version')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/aos/aos.css?version='  . config('app.app_version')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css?version='  . config('app.app_version')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css?version='  . config('app.app_version')) }}" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('frontend/css/variables.css?version='  . config('app.app_version')) }}" rel="stylesheet">
    <!-- <link href="{{ asset('frontend/css/variables-blue.cs') }}s" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-green.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-orange.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-purple.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-red.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-pink.css') }}" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/main.css?version='  . config('app.app_version')) }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz - v2.4.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @yield('css')
</head>

<body>