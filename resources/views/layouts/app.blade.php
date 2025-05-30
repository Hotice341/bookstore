<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="DexignZone" />
        <meta name="robots" content="" />
        <meta name="description" content="Bookland-Book Store Ecommerce Website"/>
        <meta property="og:title" content="Bookland-Book Store Ecommerce Website"/>
        <meta property="og:description" content="Bookland-Book Store Ecommerce Website"/>
        <meta property="og:image" content="social-image.png"/>
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}"/>

        <!-- PAGE TITLE HERE -->
        <title>Bookland Book Store Ecommerce Website</title>

        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

        <!-- GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="page-wraper">
            <div id="loading-area" class="preloader-wrapper-1">
                <div class="preloader-inner">
                    <div class="preloader-shade"></div>
                    <div class="preloader-wrap"></div>
                    <div class="preloader-wrap wrap2"></div>
                    <div class="preloader-wrap wrap3"></div>
                    <div class="preloader-wrap wrap4"></div>
                    <div class="preloader-wrap wrap5"></div>
                </div>
            </div>

            <!-- Header -->
            @include('snippets.header')
            <!-- Header End -->

            <!-- Main Content -->
            @yield('content')
            <!-- Main Content End -->

            <!-- Footer -->
            @include('snippets.footer')
            <!-- Footer End -->

            <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
        </div>

        <!-- JAVASCRIPT FILES ========================================= -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script><!-- JQUERY MIN JS -->
        <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script><!-- WOW JS -->
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP MIN JS -->
        <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script><!-- BOOTSTRAP SELECT MIN JS -->
        <script src="{{ asset('assets/vendor/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
        <script src="{{ asset('assets/vendor/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- SWIPER JS -->
        <script src="{{ asset('assets/js/dz.carousel.js') }}"></script><!-- DZ CAROUSEL JS -->
        <script src="{{ asset('assets/js/dz.ajax.js') }}"></script><!-- AJAX -->
        <script src="{{ asset('assets/js/custom.js') }}"></script><!-- CUSTOM JS -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
        <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

        <!-- custom js -->
        <script src="{{ asset('assets/custom/js/custom.js') }}"></script>

        @include('snippets.messages')
    </body>
</html>
