<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>
        jahajbari
    </title>

    <meta name="description" content="{{ config('settings.site_seo_description') }}" />
    <meta name="keywords" content="{{ config('settings.site_seo_keywords') }}" />

    <meta name="author" content="spacingtech_webify">

    @yield('meta_blog')


    <!-- favicon -->
    {{-- dynamic favicon --}}
    @if (config('settings.favicon_logo') != '')
        <link rel="shortcut icon" type="image/favicon"
            href="{{ asset('/uploads/settings') }}/{{ config('settings.favicon_logo') }}">
    @else
        <link rel="shortcut icon" type="image/favicon" href="{{ asset('/frontend_assets/image/fevicon.png') }}">
    @endif


    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/bootstrap.min.css') }}">
    <!-- simple-line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/simple-line-icons.css') }}">
    <!-- font-awesome icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/font-awesome.min.css') }}">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/themify-icons.css') }}">
    <!-- ion icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/ionicons.min.css') }}">
    <!-- owl slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/owl.theme.default.min.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/swiper.min.css') }}">
    <!-- animation -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/animate.css') }}">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/style7.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/responsive7.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('/frontend_assets/css/responsive.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .overlay-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .overlay.active {
            display: flex;
            opacity: 1;
        }

        .loader {
            width: 16px;
            height: 16px;
            box-shadow: 0 30px, 0 -30px;
            border-radius: 4px;
            background: currentColor;
            display: block;
            margin: -50px auto 0;
            position: relative;
            color: #FFF;
            transform: translateY(30px);
            box-sizing: border-box;
            animation: animloader 2s ease infinite;
        }

        .loader::after,
        .loader::before {
            content: '';
            box-sizing: border-box;
            width: 16px;
            height: 16px;
            box-shadow: 0 30px, 0 -30px;
            border-radius: 4px;
            background: currentColor;
            color: #FFF;
            position: absolute;
            left: 30px;
            top: 0;
            animation: animloader 2s 0.2s ease infinite;
        }

        .loader::before {
            animation-delay: 0.4s;
            left: 60px;
        }

        @keyframes animloader {
            0% {
                top: 0;
                color: white;
            }

            50% {
                top: 30px;
                color: rgba(255, 255, 255, 0.2);
            }

            100% {
                top: 0;
                color: white;
            }
        }
    </style>
</head>

<body class="home-7">


    <div class="overlay-container d-none">
        <div class="overlay">
            <span class="loader"></span>
        </div>
    </div>

    <!-- header start -->
    @include('frontend.header')
    <!--header end-->


    @yield('content')


    <!-- footer start -->
    @include('frontend.footer')
    <!-- footer end -->


    <!-- newsletter pop-up start -->


    <div class="vegist-popup animated modal fadeIn" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="popup">

                </div>
            </div>
        </div>
    </div>

    <!-- newsletter pop-up end -->
    <!-- back to top start -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>
    <!-- jquery -->
    <script src="{{ asset('/frontend_assets/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('/frontend_assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('/frontend_assets/js/bootstrap.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('/frontend_assets/js/popper.min.js') }}"></script>
    <!-- fontawesome -->
    <script src="{{ asset('/frontend_assets/js/fontawesome.min.js') }}"></script>
    <!-- owl carousal -->
    <script src="{{ asset('/frontend_assets/js/owl.carousel.min.js') }}"></script>
    <!-- swiper -->
    <script src="{{ asset('/frontend_assets/js/swiper.min.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('/frontend_assets/js/custom.js') }}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @include('frontend.global_scripts')


    @stack('scripts')
</body>


</html>
