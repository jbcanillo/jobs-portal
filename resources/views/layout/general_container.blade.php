<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <meta charset="utf-8">
            <meta name="_token" content="{{ csrf_token() }}">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/landing_page/images/icon.png') }}">
            <link rel="icon" type="image/png" href="{{ asset('template/landing_page/images/icon.png') }}">
            <title>{{ config('app.name') }}</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400i|Source+Sans+Pro:300,400,600,700" rel="stylesheet">
            <!-- CSS -->
            <!-- Bootstrap CDN -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/themefisher-fonts.css') }}" >
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/font-awesome.min.css') }}">
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/owl.carousel.css') }}">
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/animate.css') }}">
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/style.css') }}">
            <!-- Responsive Stylesheet -->
            <link rel="stylesheet" href="{{ asset('template/landing_page/css/responsive.css') }}">
    </head>
    <body id='body'>
        <div id="preloader">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!-- 
        Header start
        ==================== -->
        <div class="container">
            <nav class="navbar navbar-fixed-top  navigation " id="top-nav">
                <a class="navbar-brand" href="./">
                    <img src="{{ asset('template/landing_page/images/logo-small.png') }}" alt="">
                </a>

                @yield('content')

            </nav>
        </div>
        @yield('content2')
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <a href="#"><i class="tf-ion-social-facebook" style="font-size:30px"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                            <a href="#"><i class="tf-ion-social-twitter" style="font-size:30px"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                            <a href="#"><i class="tf-ion-social-linkedin-outline" style="font-size:30px"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp
                        </div>
                        <div class="block">
                            <p>Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                | {{ config('app.name') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            <!-- Js -->
            <script src="{{ asset('template/landing_page/js/vendor/jquery-2.1.1.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
            <script src="{{ asset('template/landing_page/js/vendor/modernizr-2.6.2.min.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/jquery.lwtCountdown-1.0.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/owl.carousel.min.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/jquery.form.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/jquery.nav.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/wow.min.js') }}"></script>
            <script src="{{ asset('template/landing_page/js/main.js') }}"></script>
    </body>
</html>