<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
@php
    $cartlists = $cart->getCartData()
@endphp

@yield('content')

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<!-- footer area start -->
<footer class="footer-widget-area">
    <div class="footer-bottom">
        <div class="container">
            <div class="row d-block" style="margin: 70px auto 70px auto">
                <h6><b>PLEASE NOTE:</b></h6>
                <p>
                    Estimate is good for 30 days. Prices and availability are subjected to change. Backorders may occasionally occur. All prices are for pickup at our nursery by appointment. Delivery maybe available for an extra charge. We guarantee that our plants are healthy and in prime condition at the time of acquisition.



                </p>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
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
@yield('javascript');
<!--<script src="http://unpkg.com/turbolinks" data-turbolinks-suppress-warning></script>-->
</body>

</html>
