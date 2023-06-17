<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{!! strip_tags(get_general_value('title')) !!}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('uploads/' . get_general_value('icon')) }}" rel="icon">
    <link href="{{ asset('uploads/' . get_general_value('icon')) }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">



    <!-- Required CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Required JavaScript -->


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css?version=' . config('app.app_version')) }}"
        rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css?version=' . config('app.app_version')) }}"
        rel="stylesheet">
    <link href="{{ asset('frontend/vendor/aos/aos.css?version=' . config('app.app_version')) }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css?version=' . config('app.app_version')) }}"
        rel="stylesheet">
    <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css?version=' . config('app.app_version')) }}"
        rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('frontend/css/variables.css?version=' . config('app.app_version')) }}" rel="stylesheet">
    <!-- <link href="{{ asset('frontend/css/variables-blue.cs') }}s" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-green.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-orange.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-purple.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-red.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('frontend/css/variables-pink.css') }}" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/main.css?version=' . config('app.app_version')) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- =======================================================
  * Template Name: HeroBiz - v2.4.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        #loading {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10014;
            width: 100vw;
            height: 100vh;
            background-color: rgba(192, 192, 192, 0.5);
            background-image: url("https://i.stack.imgur.com/MnyxU.gif");
            background-repeat: no-repeat;
            background-position: center;
        }

        #overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: #8e9395;
        }

        .card:hover #overlay {
            opacity: 0.87;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            left: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>
    @yield('css')
</head>

<body>
