@extends('layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
@endsection
@section('custom_event_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
@endsection
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding pt-4" >
            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">About Us</h1>


                        <div style="margin-bottom: 30px;">
                            @if(!empty($imageLists->about_us_images))
                                @if(count(json_decode($imageLists->about_us_images))>0)
                                    <section class="slider">
                                <div id="slider" class="flexslider">
                                    <ul class="slides">
                                        @foreach(json_decode($imageLists->about_us_images) as $image)
                                            <li>
                                                <img src="img/aboutus/large/{{ $imageLists->id }}/{{ $image }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        @foreach(json_decode($imageLists->about_us_images) as $image)
                                            <li>
                                                <img src="img/aboutus/thumb/{{ $imageLists->id }}/{{ $image }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                                @endif
                            @endif
                            <section class="py-3">
                                <h3 class="py-2 text-center" style="color: yellow">WHO WE ARE</h3>
                                <p>Kansas Plant Farm is a private backyard family-owned nursery and display garden. Nestled on an acre of land in the central west Lawrence, the nursery was established in 2005 by Ryan Domnick. Surrounding the front and East side of the residence are display gardens with many types of plants ranging from hardy tropicals, edibles, native plants, butterfly plants, and many other unusual plants. We primarily grow plants available for on-line purchase and curbside pickup. We have occasional "Open to the Public" days, Special Plant Sales, Shopping appointments, Display garden tours, and Educational garden walks. We are open on a seasonal basis so please check our website.</p>
                            </section>

                            <section class="py-3">
                                <h3 class="py-2 text-center" style="color: yellow">ABOUT OUR FOUNDER</h3>
                                <p><img src="{{ asset('img/ryan_image.png') }}" class="float-left mr-2 mb-2">Plantman Ryan Domnick has over 30 years experience in the horticulture industry. Starting with a cactus collection when he was six years old, the passion grew. During his teen years he worked at a retail nursery learning plants, watering and helping customers with plant questions. Ryan has a five year degree in landscape architecture and horticulture from Oklahoma State University. To pay for college, he started a landscape company during the summers and part time during school. In the year 2000, he moved to Lawrence Kansas and started a landscape company in 2001. By 2004, he had created a private nursery and 1 acre display gardens. Through his many years of traveling to different parts of the United States and Mexico, he has gained a vast horticultural knowledge of plants not just from Kansas but from many different climates. That has become and useful predictive tool as to whether a plant will do well in Kansas, knowing what climate it does thrive in and comparing it to our climate here. The plant nursery expanded in 2020 to 2 acres and over 500 varieties. While the plant gardens are a sanctuary for relaxation, a main purpose is testing experimental new and uncommon plants. In 2021, Ryan created a new website with a vast library of plant pictures and information along with online purchasing. Ryan’s areas of interest and expertise are native plants, bee and butterfly plants, hardy tropicals, ornamental edibles, winter interest plants and dry shade plants. In 2022, Ryan plans to occasionally open the nursery and display gardens for private tours, educational events and shopping appointments.</p>
                            </section>

                            <section class="py-3">
                                <h3 class="py-2 text-center" style="color: yellow">VISITING OUR PRIVATE BACKYARD NURSERY</h3>
                                <p>We are not open to the public except during published open hours, advertised plant sales and certain days in which we are open by appointment only for private shopping. To keep our prices reasonable, we have limited hours and staff and can only help a couple person at a time so if we get a rush of other customers, please be patient. We sell specialty plants that are not commonly found at the big box stores and cannot handle big crowds of shoppers at one time in our quiet neighborhood setting. </p>
                                <p>When visiting, please park in our parking areas or in the cul-de-sac along the street. Please don't block in other cars or driveway entrances. Please be courteous and conscious of any loud noises you may be creating that might disturb the neighborhood. Pets are ok if on leash and not barking. It is very easy to get lost in the plants so children are ok if they stay with you and are not running freely or climbing on anything. Please do not let your car alarm go off while visiting. We do have a public port-a-potty restroom. Masks are optional and social distancing is an easy option in our open outdoor environment. If it starts raining hard, lightning or other unpredictable weather, we may close without notice as we do not have a public indoor covered area.</p>
                            </section>

                            <section class="py-3">
                                <h3 class="py-2 text-center" style="color: yellow">BUYING PLANTS</h3>
                                <p>We grow thousands of locally grown specialty plants. We also grow perennials, shrubs, trees,  grasses, bamboos, edible plants, cold-hardy tropical plants, xeriscape plants, butterfly plants, native plants, house plants, patio plants, cacti-succulents, dry-shade plants and unusual/rare plants. Most of our plants are 99% organically grown and pesticides are not needed or rarely used. Our plants are grown in a natural topsoil mix to promote faster establishment when planted in your landscape.  We do not really have an exact published availability list but most items are available most of the time. Our website is updated periodically and most items you purchase on-line will be available. If an item is accidently over purchased or sold out, you will be refunded on that portion. Many items are not priced in the farm but during your shopping appointment, we are able to quote prices. You may also download our price list or be furnished with a copy when visiting. Please check our website for days we are open to the public.</p>
                                <p>Most payments are completed on-line thru out payment gateway. Gift cards are available for shopping appointments. At the nursery, we accept cash, check, or gift cards (credit cards in the very near future). Payment is due at time of delivery or before you leave the nursery with your plants. We are exploring the option to add delivery and shipping but not at this time.</p>
                            </section>
                        </div>


            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection
@section('javascript')
    <script  src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function(){

                @if(!empty($imageLists->about_us_images))
                    @if(count(json_decode($imageLists->about_us_images))>0)
                        $('#carousel').flexslider({
                            animation: "slide",
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: 210,
                            itemMargin: 5,
                            asNavFor: '#slider'
                        });

                        $('#slider').flexslider({
                            animation: "slide",
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            sync: "#carousel",
                            start: function(slider){
                                $('body').removeClass('loading');
                            }
                        });
                    @endif
                @endif

        });
    </script>
@endsection
