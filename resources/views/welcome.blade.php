<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MagAbroad</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
        @vite('resources/css/open-iconic-bootstrap.min.css')
        @vite('resources/css/animate.css')
        @vite('resources/css/owl.carousel.min.css')
        @vite('resources/css/owl.theme.default.min.css')
        @vite('resources/css/magnific-popup.css')
        @vite('resources/css/ionicons.min.css')
        @vite('resources/css/bootstrap-datepicker.css')
        @vite('resources/css/jquery.timepicker.css')
        @vite('resources/css/flaticon.css')
        @vite('resources/css/icomoon.css')
        @vite('resources/css/app.css')
    </head>
    
    <body>
        <div id="app"></div>
        @vite('resources/js/app.js')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        {{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
        {{-- <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script> --}}
        <script src="{{ asset('js/scrollax.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        {{-- <script src="{{ asset('js/google-map.js') }}"></script> --}}
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lfjp74qAAAAAPuRUKEGtIN5-6wm_MQNbj6JoULa"></script> -->
    </body>
</html>
