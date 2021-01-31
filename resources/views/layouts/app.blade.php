<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kansas  - Lorem ipsum dolor</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css')  }}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/pe-icon-7-stroke.css')  }}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/font-awesome.min.css')  }}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick.min.css')  }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css')  }}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/nice-select.css')  }}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/jqueryui.min.css')  }}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{asset('css/style.css?v=').time()}}">

    @yield('custom_styles')

</head>
<body>
@inject('cart', 'App\Models\Cart')
@php
    $cartlists = $cart->getCartData();
@endphp
<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        {{--<div class="header-top bdr-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="welcome-message">
                            <p>Welcome to Corano Jewellery online store</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="header-top-settings">
                            <ul class="nav align-items-center justify-content-end">
                                <li class="curreny-wrap">
                                    $ Currency
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="dropdown-list curreny-list">
                                        <li><a href="#">$ USD</a></li>
                                        <li><a href="#">€ EURO</a></li>
                                    </ul>
                                </li>
                                <li class="language">
                                    <img src="{{ asset('img/icon/en.png')  }}" alt="flag"> English
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="dropdown-list">
                                        <li><a href="#"><img src="{{ asset('img/icon/en.png')  }}" alt="flag"> english</a></li>
                                        <li><a href="#"><img src="{{ asset('img/icon/fr.png')  }}" alt="flag"> french</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/logo/logo.png')  }}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="active"><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="index.html">Home version 01</a></li>
                                                <li><a href="index-2.html">Home version 02</a></li>
                                                <li><a href="index-3.html">Home version 03</a></li>
                                                <li><a href="index-4.html">Home version 04</a></li>
                                                <li><a href="index-5.html">Home version 05</a></li>
                                                <li><a href="index-6.html">Home version 06</a></li>
                                            </ul>
                                        </li>
                                        <li class="position-static"><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><span>column 01</span>
                                                    <ul>
                                                        <li><a href="shop.html">shop grid left
                                                                sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">shop grid right
                                                                sidebar</a></li>
                                                        <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><span>column 02</span>
                                                    <ul>
                                                        <li><a href="product-details.html">product details</a></li>
                                                        <li><a href="product-details-affiliate.html">product
                                                                details
                                                                affiliate</a></li>
                                                        <li><a href="product-details-variable.html">product details
                                                                variable</a></li>
                                                        <li><a href="product-details-group.html">product details
                                                                group</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><span>column 03</span>
                                                    <ul>
                                                        <li><a href="cart.html">cart</a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                        <li><a href="compare.html">compare</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><span>column 04</span>
                                                    <ul>
                                                        <li><a href="my-account.html">my-account</a></li>
                                                        <li><a href="login-register.html">login-register</a></li>
                                                        <li><a href="about-us.html">about us</a></li>
                                                        <li><a href="contact-us.html">contact us</a></li>
                                                    </ul>
                                                </li>
                                                <li class="megamenu-banners d-none d-lg-block">
                                                    <a href="product-details.html">
                                                        <img src="{{ asset('img/banner/img1-static-menu.jpg')  }}" alt="">
                                                    </a>
                                                </li>
                                                <li class="megamenu-banners d-none d-lg-block">
                                                    <a href="product-details.html">
                                                        <img src="{{ asset('img/banner/img2-static-menu.jpg')  }}" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/products') }}">shop</a>
<!--                                            <ul class="dropdown">
                                                <li><a href="#">shop grid layout <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop.html">shop grid left sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                                        <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                                        <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">shop list layout <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                                        <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">products details <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">product details</a></li>
                                                        <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                                        <li><a href="product-details-variable.html">product details variable</a></li>
                                                        <li><a href="product-details-group.html">product details group</a></li>
                                                    </ul>
                                                </li>
                                            </ul>-->
                                        </li>
                                        <li><a href="blog-left-sidebar.html">Blog <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                                <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                                <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                <li><a href="blog-details-video.html">blog details video</a></li>
                                                <li><a href="blog-details-image.html">blog details image</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                    <input type="text" placeholder="Search entire store hire" class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            @auth
                                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                                <li><a href="{{ route('orders') }}">Orders</a></li>
                                                <li><a href="{{ route('my-profile') }}">My Profile</a></li>
                                                <form action="{{ url('/logout') }}" method="post">
                                                    @csrf
                                                    <li>
                                                    <button type="submit">Logout</button>
                                                    </li>
                                                </form>
                                            @endauth
                                            @guest
                                                    <li><a href="{{ route('login') }}">login</a></li>
                                                    <li><a href="{{ route('register') }}">register</a></li>
                                            @endguest

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">0</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="minicart-btn" data-turbolinks="false">
                                            <i class="pe-7s-shopbag"></i>
                                            <div class="notification">{{ $cartlists->count() }}</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img src="{{ asset('img/logo/logo.png')  }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="{{ url('/cart') }}">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification">{{ $cartlists->count() }}</div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home version 01</a></li>
                                    <li><a href="index-2.html">Home version 02</a></li>
                                    <li><a href="index-3.html">Home version 03</a></li>
                                    <li><a href="index-4.html">Home version 04</a></li>
                                    <li><a href="index-5.html">Home version 05</a></li>
                                    <li><a href="index-6.html">Home version 06</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">pages</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title menu-item-has-children"><a href="#">column 01</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left
                                                    sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right
                                                    sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-details-affiliate.html">product
                                                    details
                                                    affiliate</a></li>
                                            <li><a href="product-details-variable.html">product details
                                                    variable</a></li>
                                            <li><a href="product-details-group.html">product details
                                                    group</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
                                        <ul class="dropdown">
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="compare.html">compare</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 04</a>
                                        <ul class="dropdown">
                                            <li><a href="my-account.html">my-account</a></li>
                                            <li><a href="login-register.html">login-register</a></li>
                                            <li><a href="about-us.html">about us</a></li>
                                            <li><a href="contact-us.html">contact us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="{{ url('/products') }}">shop</a>
<!--                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="#">shop grid layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                            <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                            <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">shop list layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                            <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">products details</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                            <li><a href="product-details-variable.html">product details variable</a></li>
                                            <li><a href="product-details-group.html">product details group</a></li>
                                        </ul>
                                    </li>
                                </ul>-->
                            </li>
                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                    <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                    <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                    <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                    <li><a href="blog-details-audio.html">blog details audio</a></li>
                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                    <li><a href="blog-details-image.html">blog details image</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Currency
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="currency">
                                    <a class="dropdown-item" href="#">$ USD</a>
                                    <a class="dropdown-item" href="#">$ EURO</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
<!--                                    <a class="dropdown-item" href="my-account.html">my account</a>
                                    <a class="dropdown-item" href="login-register.html"> login</a>
                                    <a class="dropdown-item" href="login-register.html">register</a>-->

                                    @auth
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('orders') }}">Orders</a>
                                        <a class="dropdown-item" href="{{ route('my-profile') }}">My Profile</a>
                                        <form action="{{ url('/logout') }}" method="post">
                                            @csrf

                                            <button type="submit">Logout</button>

                                        </form>
                                    @endauth
                                    @guest
                                        <a class="dropdown-item" href="{{ route('login') }}">login</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">register</a>
                                    @endguest

                                </div>



                            </div>
                        </li>
                    </ul>
                </div>

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>
<!-- end Header Area -->

{{--{{ checkDevice() }}--}}

@yield('content')



<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<!-- footer area start -->
<footer class="footer-widget-area">
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="widget-title">
                            <div class="widget-logo">
                                <a href="index.html">
                                    <img src="{{ asset('img/logo/logo.png') }}" alt="brand logo">
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <p>We are a team of designers and developers that create high quality wordpress, shopify, Opencart </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Contact Us</h6>
                        <div class="widget-body">
                            <address class="contact-block">
                                <ul>
                                    <li><i class="pe-7s-home"></i> 4710-4890 Breckinridge USA</li>
                                    <li><i class="pe-7s-mail"></i> <a href="mailto:demo@plazathemes.com">demo@yourdomain.com </a></li>
                                    <li><i class="pe-7s-call"></i> <a href="tel:(012)800456789987">(012) 800 456 789-987</a></li>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Information</h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li><a href="#">about us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">privet policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">contact us</a></li>
                                <li><a href="#">site map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Follow Us</h6>
                        <div class="widget-body social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-20">
                <div class="col-md-6">
                    <div class="newsletter-wrapper">
                        <h6 class="widget-title-text">Signup for newsletter</h6>
                        <form class="newsletter-inner" id="mc-form">
                            <input type="email" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address">
                            <button class="news-btn" id="mc-submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-payment">
                        <img src="{{ asset('img/payment.png') }}" alt="payment method">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>Powered By <a href="#">Corano</a>. Store 1 © 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- Quick view modal start -->
<div class="modal" id="quick_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider">
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ asset('img/product/product-details-img1.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ asset('img/product/product-details-img2.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ asset('img/product/product-details-img3.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ asset('img/product/product-details-img4.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-large-img img-zoom">
                                    <img src="{{ asset('img/product/product-details-img5.jpg') }}" alt="product-details" />
                                </div>
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset('img/product/product-details-img1.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset('img/product/product-details-img2.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset('img/product/product-details-img3.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset('img/product/product-details-img4.jpg') }}" alt="product-details" />
                                </div>
                                <div class="pro-nav-thumb">
                                    <img src="{{ asset('img/product/product-details-img5.jpg') }}" alt="product-details" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des">
                                <div class="manufacturer-name">
                                    <a href="product-details.html">HasTech</a>
                                </div>
                                <h3 class="product-name">Handmade Golden Necklace</h3>
                                <div class="ratings d-flex">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <div class="pro-review">
                                        <span>1 Reviews</span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="price-regular">$70.00</span>
                                    <span class="price-old"><del>$90.00</del></span>
                                </div>
                                <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                <div class="product-countdown" data-countdown="2022/02/20"></div>
                                <div class="availability">
                                    <i class="fa fa-check-circle"></i>
                                    <span>200 in stock</span>
                                </div>
                                <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod tempor invidunt ut labore et dolore magna.</p>
                                <div class="quantity-cart-box d-flex align-items-center">
                                    <h6 class="option-title">qty:</h6>
                                    <div class="quantity">
                                        <div class="pro-qty"><input type="text" value="1"></div>
                                    </div>
                                    <div class="action_link">
                                        <a class="btn btn-cart2" href="#">Add to cart</a>
                                    </div>
                                </div>
                                <div class="useful-links">
                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                    <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                </div>
                                <div class="like-icon">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                    <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                    <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>
<!-- Quick view modal end -->



{{--{{ dd($cart->getCartData()) }}--}}
<!-- offcanvas mini cart start -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box" id="cart_div">
                @if(!$cartlists->isEmpty())
                    <div class="minicart-item-wrapper">
                        <ul>
                            @php
                                $i=0;
                            @endphp
                            @forelse($cartlists as $cartdata)
                                <li class="minicart-item">
                                    <div class="minicart-thumb">
                                        <a href="product-details.html">
                                            <img src="{{ asset('plants_images/5.jpg') }}" alt="product">
                                        </a>
                                    </div>
                                    <div class="minicart-content">
                                        <h3 class="product-name">
                                            <a href="product-details/{{ $cartdata->product->id }}">{{ $cartdata->product->common_name }}</a>
                                        </h3>
                                        <p>
                                            <span class="cart-quantity">{{ $cartdata->quantity }} <strong>&times;</strong></span>
                                            <span class="cart-price">${{ $cartdata->unit_price }}</span>
                                        </p>
                                    </div>
                                    <button class="minicart-remove" onclick="deleteCartItem({{ $cartdata->id }})"><i class="pe-7s-close"></i></button>
                                </li>
                                @php
                                    $i += $cartdata->quantity*$cartdata->unit_price;
                                @endphp
                            @empty
                                <p>No product is added to the cart!</p>
                            @endforelse
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                            </li>
    <!--                        <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>-->
                            <li>
                                <span>Sales Tax (8.25%)</span>
                                <span><strong>${{ number_format(8.25/100*$i, 2, '.', ',') }}</strong></span>
                            </li>
                            @php
                                $i += 8.25/100*$i;
                            @endphp

                            <li class="total">
                                <span>total</span>
                                <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                            </li>
                        </ul>
                    </div>
                <div class="minicart-button">
                    <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="{{ url('/checkout') }}"><i class="fa fa-share"></i> Checkout</a>
                </div>
                @else
                    <p>No product is added to the cart!</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->
@if(checkDevice() == 'phone')
    @if(Request::path() == 'products')
        <div id="calltextdiv" style="position: fixed; width: 101%; height: 50px; color: rgb(255, 255, 255); bottom: 0px; text-align: center; background-color: #7FBC03;display:block;z-index:100000000">
            <div style="background-position:right center; background-repeat:no-repeat;width:100%;float:left;height:49px;line-height:50px;background-position:98%;font-size:20px;border-right:1px solid #fff">
                <a style="color:#FFF" onclick="showFilterDiv()" id="filteranchor">Filter</a>
            </div>
        </div>
    @endif
@endif



<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{ asset('js/vendor/modernizr-3.6.0.min.js')  }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('js/vendor/jquery-3.3.1.min.js')  }}"></script>
<!-- Popper JS -->
<script src="{{ asset('js/vendor/popper.min.js')  }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/vendor/bootstrap.min.js')  }}"></script>
<!-- slick Slider JS -->
<script src="{{ asset('js/plugins/slick.min.js')  }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('js/plugins/countdown.min.js')  }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('js/plugins/nice-select.min.js')  }}"></script>
<!-- jquery UI JS -->
<script src="{{ asset('js/plugins/jqueryui.min.js')  }}"></script>
<!-- Image zoom JS -->
<script src="{{ asset('js/plugins/image-zoom.min.js')  }}"></script>
<!-- Imagesloaded JS -->
<script src="{{ asset('js/plugins/imagesloaded.pkgd.min.js')  }}"></script>
<!-- Instagram feed JS -->
<script src="{{ asset('js/plugins/instagramfeed.min.js')  }}"></script>
<!-- mailchimp active js -->
<script src="{{ asset('js/plugins/ajaxchimp.js')  }}"></script>
<!-- contact form dynamic js -->
<script src="{{ asset('js/plugins/ajax-mail.js')  }}"></script>
<!-- google map api -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>-->
<!-- google map active js -->
<!--<script src="{{ asset('js/plugins/google-map.js')  }}"></script>-->
<!-- Main JS -->
<script src="{{ asset('js/main.js')  }}"></script>
<script>
    function showFilterDiv() {
        jQuery("#filter_div").slideToggle("slow","swing", function(){
            if(jQuery("#filter_div").css('display') == 'none') {
                $('html, body').css({
                    overflow: 'auto',
                    height: 'auto'
                });
                $("#filteranchor").html("Filter");
            }
            else {
                $('html, body').css({
                    overflow: 'hidden',
                    height: '100%'
                });
                $("#filteranchor").html("Close Filter");
            }
        });
    }

    function sortFormSubmit() {
        jQuery("#sort_form").submit();
    }

    function hideAllPrice() {
        jQuery("#44_size_price").css('display','none');
        jQuery("#55gal_size_price").css('display','none');
        jQuery("#flat66_size_price").css('display','none');
    }

    function change_price() {
        if(jQuery("#size_select_box").val()=='44') {
            hideAllPrice();
            jQuery("#44_size_price").css('display','block');
        }
        else if(jQuery("#size_select_box").val()=='55') {
            hideAllPrice();
            jQuery("#55gal_size_price").css('display','block');
        }
        else if(jQuery("#size_select_box").val()=='66') {
            hideAllPrice();
            jQuery("#flat66_size_price").css('display','block');
        }
    }

    function deleteCartItem(id) {
        $.ajax({url: "../delete-cart-item?id="+id, success: function(result){
                $("#cart_div").html(result);
        }});
    }

    function wishlist_form_submit() {
        $.ajax({
            url: "{{ url('/add-to-wishlist') }}",
            type: "POST",
            data: $("#wishlist_form").serialize(),
            success: function(msg) {
                if(msg == 'Added to the wishlist successfully!') {
                    $("#like_active").addClass('like_active');
                    $("#wish_text").html('Added to wishlist');
                }
                else if(msg == 'Removed from the wishlist successfully!') {
                    $("#like_active").removeClass('like_active');
                    $("#wish_text").html('Add to wishlist');
                }
            }
        });
    }
</script>
@yield('javascript');
<!--<script src="http://unpkg.com/turbolinks" data-turbolinks-suppress-warning></script>-->
</body>

</html>
