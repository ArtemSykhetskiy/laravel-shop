<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('site/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">

</head>
<body>

<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="{{route('home.search')}}" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" placeholder="Search" name="search">
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="{{route('home')}}" class="js-logo-clone">Shoppers</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <li><a href="{{route('profile.user')}}"><span class="icon icon-person"></span></a></li>
                                <li>
                                    <a href="{{route('wishlist')}}" class="site-cart">
                                        <span class="icon icon-heart-o"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('cart')}}" class="site-cart">
                                        <span class="icon icon-shopping_cart"></span>
                                        <span class="count">{{Cart::instance('cart')->content()->count()}}</span>
                                    </a>
                                </li>
                                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <div class="container">
                <ul class="site-menu js-clone-nav d-none d-md-block">
                    <li><a href="{{route('home')}}">Home</a> </li>
                    <li><a href="{{route('products')}}">Shop</a></li>
                    <li><a href="{{route('categories')}}">Categories</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
