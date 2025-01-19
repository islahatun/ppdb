<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $params?->nama_sekolah }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/styles/bootstrap4/bootstrap.min.css') !!}">
    <link href="{!! asset('assets/home/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/plugins/OwlCarousel2-2.2.1/animate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/styles/main_styles.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/home/styles/responsive.css') !!}">
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="container-fluid">
                    <div class="logo">
                        <img src="{!! asset('storage/' . $params?->logo) !!}" width="100" height="100" alt="">
                        <span>{{ $params?->nama_sekolah }}</span>

                    </div>
                </div>

                <!-- Main Navigation -->
                <nav class="container-fluid">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="#"></a></li>
                            <li class="main_nav_item"><a href="#"></a></li>
                            <li class="main_nav_item"><a href="courses.html"></a></li>
                            <li class="main_nav_item"><a href="elements.html"></a></li>
                            <li class="main_nav_item"><a href="#"></a></li>
                            <li class="main_nav_item"><a href="#"></a></li>
                            <li class="main_nav_item"><a href="courses.html"></a></li>
                            <li class="main_nav_item"><a href="elements.html"></a></li>
                            <li class="main_nav_item"><a href="/registration">Registration</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
                {{-- <img src="{!! asset('assets/home/images/phone-call.svg') !!}" alt=""> --}}
                <span>{{ $params?->nama_sekolah }}</span>
            </div>

            <!-- Hamburger -->
            <div class="hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

        </header>

        <!-- Menu -->
        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="main_nav_list">
                        <li class="main_nav_item"><a href="#">home</a></li>
                        <li class="main_nav_item"><a href="#">about us</a></li>
                        <li class="main_nav_item"><a href="courses.html">Info</a></li>
                        <li class="main_nav_item"><a href="elements.html">Blog</a></li>
                        <li class="main_nav_item"><a href="/registration">Registration</a></li>
                    </ul>

                    <!-- Menu Social -->

                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
                </div>

            </div>

        </div>
