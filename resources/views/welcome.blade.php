<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>X and C Building Construction</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('construction/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('construction/plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('construction/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('construction/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('construction/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('construction/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('construction/css/style.css') }}">

</head>

<body>
    <div class="body-inner">


        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-one">
            <div class="bg-white">
                <div class="container">
                    <div class="logo-area">
                        <div class="row align-items-center">
                            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                                <a class="d-block d-flex" href="/">
                                    <div class="w-50">
                                        <img loading="lazy" src="{{ asset('assets/img/favicon.png') }}"
                                            class="w-100 h-100" alt="Constra">
                                    </div>
                                    <div class="w-100">
                                        <p style="font-weight: 700; font-size: 20px; margin-top: 1rem;">X and C Building
                                            Construction</p>
                                        {{-- <input type="text" value="{{$password}}"> --}}
                                    </div>
                                </a>
                            </div><!-- logo end -->

                            <div class="col-lg-9 header-right">
                                <ul class="top-info-box">
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Contact Us</p>
                                                <p class="info-box-subtitle">+63 917-7700-019</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info-box">
                                            <div class="info-box-content">
                                                <p class="info-box-title">Email Us</p>
                                                <p class="info-box-subtitle">jakedoydora@rocketmail.com</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-- Ul end -->
                            </div><!-- header right end -->
                        </div><!-- logo area end -->

                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        <div class="banner-carousel banner-carousel-1 mb-0">
            <div class="banner-carousel-item"
                style="background-image:url({{ asset('construction/images/slider-main/bg3xyconstruction.jpg') }})">
                <div class="slider-content text-right" style="background-color: #000000ab;">
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-12">
                                {{-- <h2 class="slide-title fw-bold" data-animation-in="slideInDown">Welcome!</h2> --}}
                                {{-- <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe sustainability</h3> --}}
                                {{-- <p class="slider-description lead" data-animation-in="slideInRight">
                                    To Become the Leading Construction company, while delivering Projects that
                                    consistently
                                    exceed international standards and provide exceptional customer satisfaction. To
                                    deliver excellent value
                                    and innovative construction solutions to meet our client’s requirements. Using
                                    Modern principles and
                                    sophisticated technologies, X and C Building Construction envisions being the
                                    primary preferences at all
                                    times both nationally and globally, for their renowned excellence, quality,
                                    performance and reliability in all types of constructions.
                                </p> --}}
                                <div data-animation-in="slideInLeft">
                                    <a href="{{ route('login') }}" class="slider btn btn-primary border"
                                        aria-label="learn-more-about-us">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- initialize jQuery Library -->
        <script src="{{ asset('construction/plugins/jQuery/jquery.min.js') }}"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{ asset('construction/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ asset('construction/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ asset('construction/plugins/slick/slick-animation.min.js') }}"></script>
        <!-- Color box -->
        <script src="{{ asset('construction/plugins/colorbox/jquery.colorbox.js') }}"></script>
        <!-- shuffle -->
        <script src="{{ asset('construction/plugins/shuffle/shuffle.min.js') }}" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ asset('plugins/google-map/map.js') }}" defer></script>

        <!-- Template custom -->
        <script src="{{ asset('construction/js/script.js') }}"></script>

    </div><!-- Body inner end -->
</body>

</html>
