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
<script>
    jQuery( function() {
        jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
            },
            _renderMenu: function( ul, items ) {
                var that = this,
                    currentCategory = "";
                jQuery.each( items, function( index, item ) {
                    var li;
                    if ( item.category != currentCategory ) {
                        ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                        currentCategory = item.category;
                    }
                    li = that._renderItemData( ul, item );
                    if ( item.category ) {
                        li.attr( "aria-label", item.category + " : " + item.label );
                    }
                });
            }
        });
        var data = @json($product->getAllProductsNames());

        jQuery( "#search_store" ).catcomplete({
            delay: 0,
            source: data,
            select: function (event, ui) {
                var label = ui.item.label;
                var value = ui.item.value;
                //alert(ui.item.slug);

                jQuery("#search_store_form").attr('action',"{{ url('/plants') }}/"+ui.item.slug);
                jQuery("#search_store_form").submit();
            }
        });

        jQuery( "#search_store2" ).catcomplete({
            delay: 0,
            source: data,
            select: function (event, ui) {
                var label = ui.item.label;
                var value = ui.item.value;
                //alert(ui.item.slug);

                jQuery("#search_store_form2").attr('action',"{{ url('/plants') }}/"+ui.item.slug);
                jQuery("#search_store_form2").submit();
            }
        });

        jQuery.ui.autocomplete.filter = function (array, term) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
            return $.grep(array, function (value) {
                return matcher.test(value.label || value.value || value);
            });
        };
    } );

    function submitMobileForm() {
        $("#cat_form2").submit();
    }
    function showFilterDiv() {
        jQuery("#filter_div").slideToggle("slow","swing", function(){
            if(jQuery("#filter_div").css('display') == 'none') {
                $('html, body').css({
                    overflow: 'auto',
                    height: 'auto'
                });
                $("#filteranchor").css('display','block');
                $("#filterselanchor").css('display','none');
            }
            else {

                $('html, body').css({
                    overflow: 'hidden',
                    height: '100%'
                });
                $("#filteranchor").css('display','none');
                $("#filterselanchor").css('display','block');
            }
        });
    }



    function hideAllPrice() {
        jQuery("#44_size_price").css('display','none');
        jQuery("#55gal_size_price").css('display','none');
        jQuery("#flat66_size_price").css('display','none');
    }

    function change_price(id, user_type) {
        $.ajax({url: "../get-product-price?id="+id+"&user_type="+user_type+"&size="+jQuery('#size_select_box').val(), success: function(retval){
            var result = $.parseJSON(retval);
            if(user_type == 'contractor') {
                if(result['price'][0]) {
                    jQuery(".price-regular-ajax-contractor").html('$' + result['price'][0]);
                    jQuery("#unit_price_contractor").val(result['price'][0]);

                    if(parseInt(result['available'])>0) {
                        if(parseInt(result['available']) >= 10)
                            jQuery("#product_count").html('Currently '+parseInt(result['available'])+' in stock');
                        else
                            jQuery("#product_count").html('Only '+parseInt(result['available'])+' in stock');

                        jQuery("#max_item").val(result['available']);
                        jQuery("#pot_size").val(result['pot_size']);
                        jQuery("#quantity").val(1);

                    }
                }
            }
            else {
                if(result['price'][0]) {
                    jQuery(".price-regular-ajax").html('$' + result['price'][0]);
                    jQuery("#unit_price_user1").val(result['price'][0]);
                    jQuery("#unit_price_user2").val(result['price'][0]);
                }

                if(result['price'][1])
                    jQuery(".price-old-ajax").html('<del>$'+result['price'][1]+'</del>');

                //alert(parseInt(result['available']));
                if (isNaN(parseInt(result['available']))) {
                    jQuery("#product_count").html('THIS SIZE NOT AVAILABLE');
                    jQuery("#addtocart_btn").removeClass('d-flex');
                    jQuery("#addtocart_btn").addClass('d-none');
                }
                else {
                    if (parseInt(result['available']) > 0) {

                        if (parseInt(result['available']) >= 10)
                            jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');
                        else
                            jQuery("#product_count").html('This size ' + parseInt(result['available']) + ' in stock');

                        //jQuery("#addtocart_btn").css('display', 'block');
                        jQuery("#addtocart_btn").removeClass('d-none');
                        jQuery("#addtocart_btn").addClass('d-flex');
                        jQuery("#addtocart_btn").css('display','block');
                        jQuery("#max_item").val(result['available']);
                        jQuery("#pot_size").val(result['pot_size']);
                        jQuery("#quantity").val(1);

                    } else {
                        jQuery("#product_count").html('THIS SIZE NOT AVAILABLE');

                        jQuery("#addtocart_btn").removeClass('d-flex');
                        jQuery("#addtocart_btn").addClass('d-none');
                    }
                }
            }
        }});
    }

    function deleteCartItem(id) {
        $.ajax({url: "{{ url('/delete-cart-item') }}?id="+id, success: function(result){
                $("#cart_div").html(result);
        }});
    }

    function wishlist_form_submit(formid) {
        //alert(formid);
        $.ajax({
            url: "{{ url('/add-to-wishlist') }}",
            type: "POST",
            data: $("#wishlist_form_"+formid).serialize(),
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
