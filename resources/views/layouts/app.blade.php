<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kansas Plant Farm - Buy from over 500 varieties of plants in Lawrence, KS</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Kansas Plant Farm is a private backyard family-owned nursery and display garden. Nestled on an acre of land in the central west Lawrence, the nursery was established in 2005 by Ryan Domnick. Surrounding the front and East side of the residence are display gardens with many types of plants ranging from hardy tropicals, edibles, native plants, butterfly plants, and many other unusual plants. We primarily grow plants available for on-line purchase and curbside pickup. We hold occasional Open to the Public Plant Sales, appointment sales, display garden tours, and Educational garden walks. We are open on a seasonal basis so please check our website.">
    <meta name="keywords" content="kansas nursery, kansas nurseries, lawrence nursery, lawrence nurseries, plants for sale, kansas plant farm, nursery near me">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('custom_meta')
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
    <link href="{{ asset('css/admin/css/jquery-ui.min.css')  }}" rel="stylesheet">


    @yield('custom_styles')
    @yield('custom_event_js')

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SDRM07GHXH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SDRM07GHXH');
    </script>
</head>
<body>
@inject('cart', 'App\Models\Cart')
@inject('product', 'App\Models\Product')
@inject('product_wishlist', 'App\Models\Wishlist')
@inject('news_feed_user', 'App\Models\NewsfeedUser')
@php
    $cartlists = $cart->getCartData()
@endphp

<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('plants_images/logo_top.png')  }}" alt="Brand Logo">
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
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/') }}/plants">Plants</a></li>
                                        <li><a href="{{ url('/') }}/garden-ideas">Garden Ideas</a></li>
                                        <li><a href="{{ url('/') }}/upcoming-events">Upcoming Events</a></li>
                                        <li><a href="{{ url('/') }}/about-us">About Us</a></li>
                                        <li><a href="{{ url('/') }}/contact-us">Contact Us</a></li>

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
                                <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox" id="search_store_form" data-url="{{ url('/plants') }}">
                                    <input type="search" placeholder="Search by Plant Name" class="header-search-field" id="search_store">
                                    <button class="header-search-btn" type="submit"><i class="pe-7s-search"></i></button>
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
                                                <li><a href="{{ route('orders') }}">Order History</a></li>
                                                <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
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
                                        <a href="{{ route('wishlist') }}">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">{{ $product_wishlist->wishlistCount() }}</div>
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
                <div class="col-12 mb-2">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('plants_images/logo_top.png')  }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap mr-3">
                                <a href="{{ route('my-profile') }}">
                                    <i class="pe-7s-user"></i>
                                </a>
                            </div>
                            <div class="mini-cart-wrap mr-3">
                                <a href="{{ route('wishlist') }}">
                                    <i class="pe-7s-like"></i>
                                    <div class="notification">{{ $product_wishlist->wishlistCount() }}</div>
                                </a>
                            </div>
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
                <div class="col-12">
<!--                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox" id="search_store_form3">
                        <input id="search_store" type="text" class="header-search-field ui-autocomplete-input" placeholder="Search by Plant Name">
                    </form>-->
                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox" id="search_store_form3" data-url="{{ url('/plants') }}">
                        <input type="search" placeholder="Search by Plant Name" class="header-search-field" id="search_store3">
                        <button class="header-search-btn" type="submit"><i class="pe-7s-search"></i></button>
                    </form>
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
                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox" id="search_store_form2">
<!--                        <input type="text" placeholder="Search by Plant Name" id="">-->

                        <input type="search" placeholder="Search by Plant Name" class="header-search-field" id="search_store2">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/') }}/plants">Plants</a></li>
                            <li><a href="{{ url('/') }}/garden-ideas">Garden Ideas</a></li>
                            <li><a href="{{ url('/') }}/upcoming-events">Upcoming Events</a></li>
                            <li><a href="{{ url('/') }}/about-us">About Us</a></li>
                            <li><a href="{{ url('/') }}/contact-us">Contact Us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    @auth
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('orders') }}">Order History</a>
                                        <a class="dropdown-item" href="{{ route('wishlist') }}">My Wishlist</a>
                                        <a class="dropdown-item" href="{{ route('my-profile') }}">My Profile</a>
                                        <form action="{{ url('/logout') }}" method="post">
                                            @csrf

                                            <button class="dropdown-item" type="submit">Logout</button>

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
                            <li><i class="pe-7s-home"></i>
                                <a href="https://goo.gl/maps/m18PLV9WTRMq6rB16" target="_blank">1210 Lakeview Ct Lawrence, KS  66049</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="mailto:kansasplantfarm@gmail.com">kansasplantfarm@gmail.com</a>
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
    <div class="footer-top section-padding" style="padding-bottom: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="widget-title">
                            <div class="widget-logo text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('plants_images/logo_bottom.png') }}" alt="brand logo">
                                </a>
                            </div>
                        </div>
<!--                        <div class="widget-body">
                            <p>Kansas Plant Farm offers the highest quality of plants with over 500 varieties.</p>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-xs-center">
                    <div class="widget-item">
                        <h6 class="widget-title">Contact Us</h6>
                        <div class="widget-body">
                            <address class="contact-block">
                                <ul>
                                    <li><i class="pe-7s-home"></i>
                                        <a href="https://goo.gl/maps/m18PLV9WTRMq6rB16" target="_blank">1210 Lakeview Ct <br/><span style="padding-left: 27px;">Lawrence, KS  66049</span></a>
                                    </li>
                                    <li><i class="pe-7s-mail"></i> <a href="mailto:kansasplantfarm@gmail.com">kansasplantfarm@gmail.com </a></li>
<!--                                    <li><i class="pe-7s-call"></i> <a href="tel:(012)800456789987">(012) 800 456 789-987</a></li>-->
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-xs-center">
                    <div class="widget-item">
                        <h6 class="widget-title">Quick Menu</h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/') }}/plants">Plants</a></li>
                                <li><a href="{{ url('/') }}/garden-ideas">Garden Ideas</a></li>
                                <li><a href="{{ url('/') }}/upcoming-events">Upcoming Events</a></li>
                                <li><a href="{{ url('/') }}/about-us">About Us</a></li>
                                <li><a href="{{ url('/') }}/contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="widget-item">
                        <h6 class="widget-title">Follow Us</h6>
                        <div class="widget-body social-link">
                            @if(!empty($socialnetworkurl_info->facebook_link))
                                <a href="{{ $socialnetworkurl_info->facebook_link  }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if(!empty($socialnetworkurl_info->twitter_link))
                                <a href="{{ $socialnetworkurl_info->twitter_link  }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if(!empty($socialnetworkurl_info->instagram_link))
                                <a href="{{ $socialnetworkurl_info->instagram_link  }}" target="_blank"><i class="fa fa-instagram"></i></a>
                            @endif

                            @if(!empty($socialnetworkurl_info->youtube_link))
                                <a href="{{ $socialnetworkurl_info->youtube_link  }}" target="_blank"><i class="fa fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 text-center">Note: Shipping and Delivery are not available at this time. All prices are for pickup at nursery.</div>
            <div class="d-flex justify-content-center my-3">
                <div class="p-2"><a href="{{ route('terms-conditions') }}" style="color: #7fbc03">Terms & Conditions</a></div>
                <div class="p-2">|</div>
                <div class="p-2"><a href="{{ route('privacy-policy') }}" style="color: #7fbc03">Privacy Policy</a></div>
                <div class="p-2">|</div>
                <div class="p-2"><a href="{{ route('our-guarantee') }}" style="color: #7fbc03">Our Guarantee</a></div>
            </div>
            <div class="row align-items-center">

                <div class="col-md-12">
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
                        <p>Copyright © <a href="{{ url('/') }}">Kansas Plant Farm {{ date('Y') }}</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<div class="position-fixed schedule verticaltext px-3 py-2 text-dark font-weight-bold rounded-bottom" style="background-color: yellow">
    <a href="{{ url('/') }}/schedule-calendar" class="text-dark text-uppercase">Schedule an Appointment</a>
</div>

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
                                $tax_amount = 0;
                            @endphp
                            @forelse($cartlists as $cartdata)
                                <li class="minicart-item">
                                    <div class="minicart-thumb">
                                        <a href="{{ url('/plants') }}/{{ $cartdata->product->slug }}">
                                            @if(!empty(($cartdata->product->getImage($cartdata->product))))
                                                <img src="{{ url($cartdata->product->getImage($cartdata->product)) }}" alt="product">
                                            @else
                                                <img src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="minicart-content">
                                        <h3 class="product-name">
                                            <a href="{{ url('/plants') }}/{{ $cartdata->product->slug }}">
                                                @if(!empty($cartdata->product->other_product_service_name))
                                                    {{ $cartdata->product->other_product_service_name }}
                                                @else
                                                    {{ $cartdata->product->botanical_name }}<br>
                                                    {{ $cartdata->product->common_name }}
                                                @endif
                                            </a>
                                        </h3>
                                        <p>
                                            <span class="cart-quantity">{{ $cartdata->quantity }} <strong>&times;</strong></span>
                                            <span class="cart-price">${{ $cartdata->unit_price }}</span>
                                        </p>
                                    </div>
                                    <form method="post" data-url="{{ url('/delete-cart-item') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cartdata->id }}">
                                        <button class="minicart-remove" type="submit" ><i class="pe-7s-close"></i></button>
                                    </form>
                                </li>
                                @php
                                    $i += $cartdata->quantity*$cartdata->unit_price;
                                    if($cartdata->product->tax_free !='YES') {
                                        $tax_amount += 9.30/100*($cartdata->quantity*$cartdata->unit_price);
                                    }
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
                            <li>
                                <span>Sales Tax (9.30%)</span>
                                <span><strong>${{ number_format($tax_amount, 2, '.', ',') }}</strong></span>
                            </li>
                            @php
                                $i += $tax_amount;
                            @endphp

                            <li class="total">
                                <span>total</span>
                                <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-2 pb-4 text-center">Note: Shipping and Delivery are not available at this time. All prices are for pickup at nursery.</div>
                <div class="minicart-button">
                    <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="{{ url('/checkout') }}"><i class="fa fa-share"></i> Checkout</a>
                </div>
                @else
                    <h4 class="my-5 text-center" style="color: #ff0000">No product is added to the cart!</h4>
                @endif
            </div>
        </div>
    </div>
</div>



<div class="addto-cart-alert">
    Product has been added to the cart!
</div>

<div id="myModal" class="fodal fade">

    <div class="modal-content" id="modal_content">
        <span class="close cursor" id="close_modal" style="color: #0a0b0b;z-index: 10">&times;</span>
        <form id="sign_for_feed" data-url="{{ route('signup_newsfeed') }}" method="post">
            @csrf
            <div class="row position-relative" style="z-index: 1">
                <div class="col-lg-12">
                    <h4 class="text-center pt-2">GET NOTIFIED OF PLANT SALES & UPCOMING EVENTS!</h4>
                    <p class="text-center mt-2">Join Kansas Plant Farm's email list today!</p>
                </div>
                <div class="col-lg-12">
                    <div class="single-input-item mt-2">
                        <label for="last-name" class="required">Email</label>
                        <input type="email" id="email" name="email" required="">
                    </div>
                </div>
                <div class="col-lg-12  mt-0" style="text-align: center">
                    <div class="single-input-item" style="display: inline-block">
                        <button class="btn btn-sqr" type="submit">Sign Up</button>
                    </div>
                </div>
                <p class="mt-3">
                    Kansas Plant Farm respects your online time and privacy. We only send emails to those who have signed up to receive them, and we do not provide your email address to any third party.
                </p>

            </div>
        </form>
    </div>
</div>


<!-- offcanvas mini cart end -->
@if(checkDevice() == 'phone')
    @if(Request::path() == 'plants')
        <div id="calltextdiv" style="position: fixed; width: 101%; height: 50px; color: rgb(255, 255, 255); bottom: 0px; text-align: center; background-color: #7FBC03;display:block;z-index:100000000">
            <div style="background-position:right center; background-repeat:no-repeat;width:100%;float:left;height:49px;line-height:50px;background-position:98%;font-size:20px;border-right:1px solid #fff">
                <div id="filteranchor">
                    <a style="color:#FFF" onclick="showFilterDiv()">FILTER</a>
                </div>

                <div id="filterselanchor" style="display: none">
                    <div style="width: 58%;float: left">
                        <a style="color:#FFF;" onclick="submitMobileForm()">FILTER SELECTED</a>
                    </div>

                    <div style="width: 38%;float: right">
                        <a style="color:#FFF;" href="{{ url('/') }}/plants">RESET</a>
                    </div>
                    <div style="width: 4%;float: right">
                        |
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif





<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{ asset('js/vendor/modernizr-3.6.0.min.js')  }}"></script>
<!-- jQuery JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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

<script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js')  }}"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
            if (token) {
                if(document.getElementById('recaptcha'))
                    document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>

@if(\Illuminate\Support\Facades\Auth::check())
    @if($news_feed_user->checkIfexistsinNewsTable())
        <script type="text/javascript">var ifModalClosed = 1;</script>
    @else
        <script type="text/javascript">var ifModalClosed = 0;</script>
    @endif
@else
    <script type="text/javascript">var ifModalClosed = 0;</script>
@endif

<script type="text/javascript">var data = @json($product->getAllProductsNames());</script>
<script src="{{ asset('js/common.js') }}"></script>
@yield('javascript');
<!--<script src="http://unpkg.com/turbolinks" data-turbolinks-suppress-warning></script>-->
</body>

</html>
