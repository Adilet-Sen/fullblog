<!doctype html>
<html lang="en">
<head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="/font/css/bootstrap.css">
    <link rel="stylesheet" href="/font/css/animate.css">
    <link rel="stylesheet" href="/font/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/font/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/font/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/font/fonts/flaticon/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="/font/css/style.css">
</head>
<body>

<div class="wrap">

    <header role="banner">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-9 social">
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-instagram"></span></a>
                        <a href="#"><span class="fa fa-youtube-play"></span></a>
                    </div>

                    <div class="justify-content-start">
                        @if(Auth::check())
                            <a href="/profile" class="btn btn-secondary mr-2" data-toggle="tooltip" data-placement="bottom" title="Profile"><span class="fa fa-user-o"></span></a>
                            <a href="/logout" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Logout"><span class="fa fa-sign-out"></span></a>
                        @else
                            <a href="/login" class="btn btn-secondary mr-2" data-toggle="tooltip" data-placement="bottom" title="Login"><span class="fa fa-sign-in"></span></a>
                            <a href="/register" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Register"><span class="fa fa-registered"></span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
       @include('errors.error-alert')
        <div class="container logo-wrap">
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                    <h1 class="site-logo"><a href="{{url('/')}}">MyBlog</a></h1>
                </div>
            </div>
        </div>

        @include('pages.navbar')
    </header>
    <!-- END header -->

    @yield('content')

    @include('pages.footer')
    <!-- END footer -->

</div>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="/font/js/jquery-3.2.1.min.js"></script>
<script src="/font/js/jquery-migrate-3.0.0.js"></script>
<script src="/font/js/popper.min.js"></script>
<script src="/font/js/bootstrap.min.js"></script>
<script src="/font/js/owl.carousel.min.js"></script>
<script src="/font/js/jquery.waypoints.min.js"></script>
<script src="/font/js/jquery.stellar.min.js"></script>


<script src="/font/js/main.js"></script>
</body>
</html>
