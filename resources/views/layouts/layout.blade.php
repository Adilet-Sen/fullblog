<!doctype html>
<html lang="en">
<head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="/font/css/bootstrap.css">
    <link rel="stylesheet" href="/font/css/animate.css">
    <link rel="stylesheet" href="/font/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/font/fonts/ioniconsfont/css/ionicons.min.css">
    <link rel="stylesheet" href="/font/fonts/fontawesomefont/css/font-awesome.min.css">
    <link rel="stylesheet" href="/font/fonts/flaticon/font/flaticon.css">

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

                    <div class="col-3 search-top">
                        @if(Auth::check())
                            <a href="/profile" class="btn btn-light btn-sm rounded">Profile</a>
                            <a href="/logout" class="btn btn-danger">Logout</a>
                        @else
                            <a href="/login" class="btn btn-light btn-sm rounded">Login</a>
                            <a href="/register" class="btn btn-success btn-sm rounded">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container logo-wrap">
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                    <h1 class="site-logo"><a href="/">MyBlog</a></h1>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md  navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/it">IT</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/category" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Travel</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="/category/travel/asia">Asia</a>
                                <a class="dropdown-item" href="/category/travel/europe">Europe</a>
                                <a class="dropdown-item" href="/category/travel/dubai">Dubai</a>
                                <a class="dropdown-item" href="/category/travel/africa">Africa</a>
                                <a class="dropdown-item" href="/category/travel/south-america">South America</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown05">
                                <a class="dropdown-item" href="/category/lifestyle">Lifestyle</a>
                                <a class="dropdown-item" href="/category/food">Food</a>
                                <a class="dropdown-item" href="/category/travel">Travel</a>
                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
