<!DOCTYPE html>
<html dir="ltr" lang="zh-TW">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
 ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/navigation.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Document Title
 ============================================= -->
    <title>Home - Shop | Canvas</title>

    <style>
        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Poppins', sans-serif;
        }

        .tp-video-play-button {
            display: none !important;
        }

        .tp-caption {
            white-space: nowrap;
        }
    </style>

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Top Bar
  ============================================= -->
        <div id="top-bar">
            <div class="container">

                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-auto">
                        <p class="mb-0 py-2 text-center text-md-start"><strong>Call:</strong> 1800-547-2145 |
                            <strong>Email:</strong> info@canvas.com
                        </p>
                    </div>

                    <div class="col-12 col-md-auto">

                        <!-- Top Links
      ============================================= -->
                        <div class="top-links on-click">
                            <ul class="top-links-container">
                                <li class="top-links-item"><a href="#">USD</a>
                                    <ul class="top-links-sub-menu">
                                        <li class="top-links-item"><a href="#">EUR</a></li>
                                        <li class="top-links-item"><a href="#">AUD</a></li>
                                        <li class="top-links-item"><a href="#">GBP</a></li>
                                    </ul>
                                </li>
                                <li class="top-links-item"><a href="#">TW</a>
                                    <ul class="top-links-sub-menu">
                                        <li class="top-links-item"><a href="#"><img
                                                    src="{{ asset('images/icons/flags/taiwan.png') }}" alt="Taiwan">
                                                TW</a></li>
                                        <!-- <li class="top-links-item"><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>
          <li class="top-links-item"><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>
          <li class="top-links-item"><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li> -->
                                    </ul>
                                </li>

                                @php
                                    if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass'])) {
                                        $login_email = $_COOKIE['login_email'];
                                        $login_pass = $_COOKIE['login_pass'];
                                        $is_remember = "checked='checked'";
                                    } else {
                                        $login_email = '';
                                        $login_pass = '';
                                        $is_remember = '';
                                    }
                                @endphp
                                @if (!Auth::check())
                                    <li class="top-links-item"><a href="">Login</a>
                                        <div class="top-links-section">
                                            <form method="POST" action="{{ route('post.login') }}" id="top-login"
                                                autocomplete="off">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input name="email" type="email" class="form-control"
                                                        placeholder="Email address" value="{{ $login_email }}"
                                                        required="email">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input name="password" type="password" class="form-control"
                                                        placeholder="Password" value="{{ $login_pass }}"
                                                        required="">
                                                    @if ($errors->has('password'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" type="checkbox" name="rememberme"
                                                        {{ $is_remember }} id="top-login-checkbox">
                                                    <label class="form-check-label" for="top-login-checkbox">Remember
                                                        Me</label>
                                                </div>
                                                <button class="btn btn-danger w-100" type="submit">Sign in</button>
                                            </form>
                                            <div style="min-height: 20px" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('register')}}">New around here? Sign up</a>
                                            <a class="dropdown-item" href="{{route('password.request')}}">Forgot password?</a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div><!-- .top-links end -->

                    </div>
                </div>

            </div>
        </div><!-- #top-bar end -->

        <!-- Header
  ============================================= -->
        <header id="header">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
      ============================================= -->
                        <div id="logo">
                            <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img
                                    src="{{ asset('images/logo.png') }}" alt="Canvas Logo"></a>
                            <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img
                                    src="{{ asset('images/logo@2x.png') }}" alt="Canvas Logo"></a>
                        </div><!-- #logo end -->

                        <div class="header-misc">

                            <!-- Top Search
       ============================================= -->
                            <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i
                                        class="icon-line-cross"></i></a>
                            </div><!-- #top-search end -->

                            <!-- Top Cart
       ============================================= -->
                            <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                                <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span
                                        class="top-cart-number">5</span></a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="top-cart-items">
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="{{ asset('images/shop/small/1.jpg') }}"
                                                        alt="Blue Round-Neck Tshirt" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#">Blue Round-Neck Tshirt with a Button</a>
                                                    <span class="top-cart-item-price d-block">$19.99</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 2</div>
                                            </div>
                                        </div>
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="{{ asset('images/shop/small/6.jpg') }}"
                                                        alt="Light Blue Denim Dress" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#">Light Blue Denim Dress</a>
                                                    <span class="top-cart-item-price d-block">$24.99</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-action">
                                        <span class="top-checkout-price">$114.95</span>
                                        <a href="#" class="button button-3d button-small m-0">View Cart</a>
                                    </div>
                                </div>
                            </div><!-- #top-cart end -->
                            @if (Auth::check())
                                <div class="dropdown mx-3 me-lg-0">
                                    <a href="#" class="btn btn-secondary btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i
                                            class="icon-user"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item text-start" href="#">Profile</a>
                                        <a class="dropdown-item text-start" href="#">Messages <span
                                                class="badge rounded-pill bg-secondary float-end"
                                                style="margin-top: 3px;">5</span></a>
                                        <a class="dropdown-item text-start" href="#">Settings</a>
                                        <div class="dropdown-divider"></div>
                                       
                                            <a class="dropdown-item text-start"
                                                href="{{route('logout')}}">Logout <i class="icon-signout"></i></a>
                                        </form>
                                    </ul>
                                </div>
                            @endif

                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
      ============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container">
                                <li class="menu-item current"><a class="menu-link" href="#">
                                        <div>Home</div>
                                    </a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item"><a class="menu-link" href="index-corporate.html">
                                                <div>Home - Corporate</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-corporate.html">
                                                        <div>Corporate - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-corporate-2.html">
                                                        <div>Corporate - Layout 2</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-corporate-3.html">
                                                        <div>Corporate - Layout 3</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-corporate-4.html">
                                                        <div>Corporate - Layout 4</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-portfolio.html">
                                                <div>Home - Portfolio</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-portfolio.html">
                                                        <div>Portfolio - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-portfolio-2.html">
                                                        <div>Portfolio - Layout 2</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-portfolio-3.html">
                                                        <div>Portfolio - Masonry</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-portfolio-4.html">
                                                        <div>Portfolio - AJAX</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-blog.html">
                                                <div>Home - Blog</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link" href="index-blog.html">
                                                        <div>Blog - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="index-blog-2.html">
                                                        <div>Blog - Layout 2</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="index-blog-3.html">
                                                        <div>Blog - Layout 3</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-shop.html">
                                                <div>Home - Shop</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link" href="index-shop.html">
                                                        <div>Shop - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="index-shop-2.html">
                                                        <div>Shop - Layout 2</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-magazine.html">
                                                <div>Home - Magazine</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-magazine.html">
                                                        <div>Magazine - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-magazine-2.html">
                                                        <div>Magazine - Layout 2</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-magazine-3.html">
                                                        <div>Magazine - Layout 3</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="landing.html">
                                                <div>Home - Landing Page</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link" href="landing.html">
                                                        <div>Landing Page - Layout 1</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="landing-2.html">
                                                        <div>Landing Page - Layout 2</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="landing-3.html">
                                                        <div>Landing Page - Layout 3</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="landing-4.html">
                                                        <div>Landing Page - Layout 4</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link" href="landing-5.html">
                                                        <div>Landing Page - Layout 5</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link"
                                                href="index-fullscreen-image.html">
                                                <div>Home - Full Screen</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-fullscreen-image.html">
                                                        <div>Full Screen - Image</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-fullscreen-slider.html">
                                                        <div>Full Screen - Slider</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-fullscreen-video.html">
                                                        <div>Full Screen - Video</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-onepage.html">
                                                <div>Home - One Page</div>
                                            </a>
                                            <ul class="sub-menu-container">
                                                <li class="menu-item"><a class="menu-link" href="index-onepage.html">
                                                        <div>One Page - Default</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-onepage-2.html">
                                                        <div>One Page - Submenu</div>
                                                    </a></li>
                                                <li class="menu-item"><a class="menu-link"
                                                        href="index-onepage-3.html">
                                                        <div>One Page - Dots Style</div>
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a class="menu-link" href="index-wedding.html">
                                                <div>Home - Wedding</div>
                                            </a></li>
                                        <li class="menu-item"><a class="menu-link" href="index-restaurant.html">
                                                <div>Home - Restaurant</div>
                                            </a></li>
                                        <li class="menu-item"><a class="menu-link" href="index-events.html">
                                                <div>Home - Events</div>
                                            </a></li>
                                        <li class="menu-item"><a class="menu-link" href="index-parallax.html">
                                                <div>Home - Parallax</div>
                                            </a></li>
                                        <li class="menu-item"><a class="menu-link" href="index-app-showcase.html">
                                                <div>Home - App Showcase</div>
                                            </a></li>
                                    </ul>
                                </li>
                                <!-- Mega Menu
        ============================================= -->
                                <li class="menu-item mega-menu"><a class="menu-link" href="#">
                                        <div>Men</div>
                                    </a>
                                    <div class="mega-menu-content mega-menu-style-2">
                                        <div class="container">
                                            <div class="row">
                                                <ul class="sub-menu-container mega-menu-column col-lg-3">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>Footwear</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Casual Shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Formal Shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sports shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Flip Flops</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Slippers</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sports Sandals</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Party Shoes</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul class="sub-menu-container mega-menu-column col-lg-3">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>Clothing</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Casual Shirts</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>T-Shirts</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Collared Tees</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Pants / Trousers</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Ethnic Wear</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Jeans</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sweamwear</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul class="sub-menu-container mega-menu-column col-lg-3">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>Accessories</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Bags &amp; Backpacks</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Watches</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sunglasses</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Wallets</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Caps &amp; Hats</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Jewellery</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Belts, Ties</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul class="sub-menu-container mega-menu-column col-lg-3">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>New Arrivals</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>T-Shirts</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Formal Shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Accessories</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Watches</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Perfumes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Belts, Ties</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Formal Shirts</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- .mega-menu end -->
                                <li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#">
                                        <div>Women</div>
                                    </a>
                                    <div class="mega-menu-content mega-menu-style-2">
                                        <div class="container">
                                            <div class="row">
                                                <ul class="sub-menu-container mega-menu-column col-lg-6">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>Footwear</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Casual Shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Formal Shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sports shoes</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Flip Flops</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Slippers</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sports Sandals</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Party Shoes</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <ul class="sub-menu-container mega-menu-column col-lg-6">
                                                    <li class="menu-item mega-menu-title"><a class="menu-link"
                                                            href="#">
                                                            <div>Clothing</div>
                                                        </a>
                                                        <ul class="sub-menu-container">
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Casual Shirts</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>T-Shirts</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Collared Tees</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Pants / Trousers</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Ethnic Wear</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Jeans</div>
                                                                </a></li>
                                                            <li class="menu-item"><a class="menu-link"
                                                                    href="#">
                                                                    <div>Sweamwear</div>
                                                                </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- .mega-menu end -->
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Accessories</div><span>Awesome Works</span>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Sale</div><span>Awesome Works</span>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Blog</div><span>Latest News</span>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Videos</div><span>Latest News</span>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="#">
                                        <div>Contact</div><span>Get In Touch</span>
                                    </a></li>
                            </ul>

                        </nav><!-- #primary-menu end -->

                        <form class="top-search-form" action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value=""
                                placeholder="Type &amp; Hit Enter.." autocomplete="off">
                        </form>

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->

        @yield('content')

        <!-- Footer
  ============================================= -->
        <footer id="footer" class="dark">
            <div class="container">

                <!-- Footer Widgets
    ============================================= -->
                <div class="footer-widgets-wrap">

                    <div class="row col-mb-50">
                        <div class="col-lg-8">

                            <div class="row col-mb-50">
                                <div class="col-md-4">

                                    <div class="widget clearfix">

                                        <img src="{{ asset('images/footer-widget-logo.png') }}" alt="Image"
                                            class="footer-logo">

                                        <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp;
                                            <strong>Flexible</strong> Design Standards.
                                        </p>

                                        <div
                                            style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                            <address>
                                                <strong>Headquarters:</strong><br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                            </address>
                                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547
                                            632521<br>
                                            <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
                                            <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="widget widget_links clearfix">

                                        <h4>Blogroll</h4>

                                        <ul>
                                            <li><a href="https://codex.wordpress.org/">Documentation</a></li>
                                            <li><a
                                                    href="https://wordpress.org/support/forum/requests-and-feedback">Feedback</a>
                                            </li>
                                            <li><a href="https://wordpress.org/extend/plugins/">Plugins</a></li>
                                            <li><a href="https://wordpress.org/support/">Support Forums</a></li>
                                            <li><a href="https://wordpress.org/extend/themes/">Themes</a></li>
                                            <li><a href="https://wordpress.org/news/">Canvas Blog</a></li>
                                            <li><a href="https://planet.wordpress.org/">Canvas Planet</a></li>
                                        </ul>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="widget clearfix">
                                        <h4>Recent Posts</h4>

                                        <div class="posts-sm row col-mb-30" id="post-list-footer">
                                            <div class="entry col-12">
                                                <div class="grid-inner row">
                                                    <div class="col">
                                                        <div class="entry-title">
                                                            <h4><a href="#">Lorem ipsum dolor sit amet,
                                                                    consectetur</a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li>10th July 2021</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="entry col-12">
                                                <div class="grid-inner row">
                                                    <div class="col">
                                                        <div class="entry-title">
                                                            <h4><a href="#">Elit Assumenda vel amet dolorum
                                                                    quasi</a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li>10th July 2021</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="entry col-12">
                                                <div class="grid-inner row">
                                                    <div class="col">
                                                        <div class="entry-title">
                                                            <h4><a href="#">Debitis nihil placeat, illum est
                                                                    nisi</a>
                                                            </h4>
                                                        </div>
                                                        <div class="entry-meta">
                                                            <ul>
                                                                <li>10th July 2021</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="row col-mb-50">
                                <div class="col-md-4 col-lg-12">
                                    <div class="widget clearfix" style="margin-bottom: -20px;">

                                        <div class="row">
                                            <div class="col-lg-6 bottommargin-sm">
                                                <div class="counter counter-small"><span data-from="50"
                                                        data-to="15065421" data-refresh-interval="80"
                                                        data-speed="3000" data-comma="true"></span></div>
                                                <h5 class="mb-0">Total Downloads</h5>
                                            </div>

                                            <div class="col-lg-6 bottommargin-sm">
                                                <div class="counter counter-small"><span data-from="100"
                                                        data-to="18465" data-refresh-interval="50" data-speed="2000"
                                                        data-comma="true"></span></div>
                                                <h5 class="mb-0">Clients</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-5 col-lg-12">
                                    <div class="widget subscribe-widget clearfix">
                                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing
                                            Offers &amp; Inside Scoops:</h5>
                                        <div class="widget-subscribe-form-result"></div>
                                        <form id="widget-subscribe-form" action="include/subscribe.php"
                                            method="post" class="mb-0">
                                            <div class="input-group mx-auto">
                                                <div class="input-group-text"><i class="icon-email2"></i></div>
                                                <input type="email" id="widget-subscribe-form-email"
                                                    name="widget-subscribe-form-email"
                                                    class="form-control required email"
                                                    placeholder="Enter your Email">
                                                <button class="btn btn-success" type="submit">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-12">
                                    <div class="widget clearfix" style="margin-bottom: -20px;">

                                        <div class="row">
                                            <div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
                                                <a href="#"
                                                    class="social-icon si-dark si-colored si-facebook mb-0"
                                                    style="margin-right: 10px;">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>
                                                <a href="#"><small
                                                        style="display: block; margin-top: 3px;"><strong>Like
                                                            us</strong><br>on Facebook</small></a>
                                            </div>
                                            <div class="col-6 col-md-12 col-lg-6 clearfix">
                                                <a href="#" class="social-icon si-dark si-colored si-rss mb-0"
                                                    style="margin-right: 10px;">
                                                    <i class="icon-rss"></i>
                                                    <i class="icon-rss"></i>
                                                </a>
                                                <a href="#"><small
                                                        style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to
                                                        RSS Feeds</small></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
   ============================================= -->
            <div id="copyrights">
                <div class="container">

                    <div class="row col-mb-30">

                        <div class="col-md-6 text-center text-md-start">
                            Copyrights &copy; 2020 All Rights Reserved by Canvas Inc.<br>
                            <div class="copyright-links"><a href="#">Terms of Use</a> / <a
                                    href="#">Privacy Policy</a>
                            </div>
                        </div>

                        <div class="col-md-6 text-center text-md-end">
                            <div class="d-flex justify-content-center justify-content-md-end">
                                <a href="#" class="social-icon si-small si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-vimeo">
                                    <i class="icon-vimeo"></i>
                                    <i class="icon-vimeo"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-github">
                                    <i class="icon-github"></i>
                                    <i class="icon-github"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-yahoo">
                                    <i class="icon-yahoo"></i>
                                    <i class="icon-yahoo"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                            </div>

                            <div class="clear"></div>

                            <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i
                                class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i
                                class="icon-skype2"></i> CanvasOnSkype
                        </div>

                    </div>

                </div>
            </div><!-- #copyrights end -->
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
 ============================================= -->

    <script src="{{ asset('js/plugins.min.js') }}"></script>

    <!-- Footer Scripts
 ============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script src="{{ asset('include/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>

    <script>
        var tpj = jQuery;
        tpj.noConflict();
        var $ = jQuery.noConflict();

        tpj(document).ready(function() {

            var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution({
                sliderType: "standard",
                jsFileLocation: "include/rs-plugin/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {},
                responsiveLevels: [1200, 992, 768, 480, 320],
                gridwidth: 1140,
                gridheight: 500,
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    disableFocusListener: false,
                },
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "ares",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: `<div class="tp-title-wrap">	<span class="tp-arr-titleholder">@{{ title }}</span> </div>`,
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                }
            });

            apiRevoSlider.on("revolution.slide.onloaded", function(e) {
                SEMICOLON.slider.sliderDimensions();
            });

        }); //ready
    </script>

</body>

</html>
