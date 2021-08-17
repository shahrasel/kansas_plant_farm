@extends('layouts.app')
@section('custom_styles')
    <style>
        .slick-arrow-style button.slick-arrow {
            top: 45% !important;
        }
    </style>
@endsection
@section('content')
    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                @foreach($billboard_image_lists as $billboard_image_list)
                    <div class="hero-single-slide">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('img/billboard/') }}/{{ $billboard_image_list->image }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="hero-slider-content slide-1">
                                            <h2 class="slide-title">{{ $billboard_image_list->heading }}</h2>
                                            <h4 class="slide-desc">{{ $billboard_image_list->subheading }}</h4>
                                            <a href="{{ $billboard_image_list->button_url }}" class="btn btn-hero">{{ $billboard_image_list->button_text }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- single slider item start -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
<!--                                <i class="pe-7s-plane"></i>-->
                                <img src="{{ asset('plants_images/thousand_small.png') }}">
                            </div>
                            <div class="policy-content">
                                <h6>Thousands of Plants</h6>
                                <p>Over 500 Varieties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
<!--                                <i class="pe-7s-help2"></i>-->
                                <img src="{{ asset('plants_images/locally_grown.png') }}">
                            </div>
                            <div class="policy-content">
                                <h6>Locally Grown</h6>
                                <p>Pesticide Free</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
<!--                                <i class="pe-7s-back"></i>-->
                                <img src="{{ asset('plants_images/curbside.png') }}">
                            </div>
                            <div class="policy-content">
                                <h6>Curbside Pickup</h6>
                                <p>Handoff with Care</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
<!--                                <i class="pe-7s-credit"></i>-->
                                <img src="{{ asset('plants_images/transport.png') }}">
                            </div>
                            <div class="policy-content">
                                <h6>See Upcoming Events</h6>
                                <p><a style="color: #7fbc03" href="{{ url('/upcoming-events')  }}">Click Here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="product-area section-padding" style="padding-top: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{ $settings_info->home_description }}
                    </div>
                </div>
            </div>
        </section>

        <!-- service policy area end -->
        @if(!empty($featured_lists))
            <section class="product-area section-padding" style="padding-top: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 style="color: #fff">Featured Plants</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        @foreach($featured_lists as $product)
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="{{ url('/plants') }}/{{ $product->slug }}">
                                                        @if(!empty(($product->getImage($product))))
                                                            <img class="pri-img" src="{{ url($product->getImage($product)) }}" alt="product">
                                                            <img class="sec-img" src="{{ url($product->getImage($product)) }}" alt="product">
                                                        @else
                                                            <img class="pri-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                            <img class="sec-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                        @endif
                                                    </a>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <div class="product-identity">
                                                        <p class="manufacturer-name" style="line-height: 20px"><a href="{{ url('/plants') }}/{{ $product->slug }}">
                                                                @if(!empty($product->other_product_service_name))
                                                                    {{ $product->other_product_service_name }}@if(!empty($product->patent_trademark_names))<br/>{{ $product->patent_trademark_names }} @endif</a>
                                                            @else
                                                                {{ $product->botanical_name }} <br/> <i>{{ $product->common_name }}</i>@if(!empty($product->patent_trademark_names))<br/>{{ $product->patent_trademark_names }} @endif</a>
                                                                @endif

                                                        </p>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="price-regular">
                                                        @if(!empty($product->getProductPrice($product)))
                                                                ${{ $product->getProductPrice($product) }}
                                                            @endif
                                                    </span>
                                                        <span class="price-old">
                                                        @if(!empty($product->retail_list_price_a))
                                                                <del>${{ number_format($product->retail_list_price_a,2) }}</del>
                                                            @endif
                                                    </span>
                                                    </div>

                                                    <div class="manufacturer-name details_tag" style="margin-top: 20px;line-height: 30px;">
                                                        @if($product->perennial == 'YES')
                                                            <a href="{{ url("/plants?category=perennial") }}">Perennial</a>
                                                        @endif
                                                        @if($product->shrub == 'YES')
                                                            <a  href="{{ url("/plants?category=shrub") }}">Shrub</a>
                                                        @endif
                                                        @if($product->vine == 'YES')
                                                            <a  href="{{ url("/plants?category=vine") }}">Vine</a>
                                                        @endif
                                                        @if($product->grass_bamboo == 'YES')
                                                            <a  href="{{ url("/plants?category=grass_bamboo") }}">Grass/Bamboo</a>
                                                        @endif
                                                        @if($product->hardy_tropical == 'YES')
                                                            <a  href="{{ url("/plants?category=hardy_tropical") }}">Hardy Tropical</a>
                                                        @endif
                                                        @if($product->water_plant == 'YES')
                                                            <a  href="{{ url("/plants?category=water_plant") }}">Water Plant</a>
                                                        @endif
                                                        @if($product->annual == 'YES')
                                                            <a  href="{{ url("/plants?category=annual") }}">Annual</a>
                                                        @endif
                                                        @if($product->house_deck_plant == 'YES')
                                                            <a  href="{{ url("/plants?category=house_deck_plant") }}">House / Deck Plant</a>
                                                        @endif
                                                        @if($product->cactus_succulent == 'YES')
                                                            <a  href="{{ url("/plants?category=cactus_succulent") }}">Cactus / Succulent</a>
                                                        @endif
                                                        @if($product->small_tree == 'YES')
                                                            <a  href="{{ url("/plants?category=small_tree") }}">Small Tree</a>
                                                        @endif
                                                        @if($product->large_tree == 'YES')
                                                            <a  href="{{ url("/plants?category=large_tree") }}">Large_tree</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        <!-- product item end -->
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <h2 class="title home">Shop by Season</h2>
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="{{ $settings_info->spring_plant_link }}">
                                <img src="{{ asset('plants_images/shop_by_season_1.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">BEAUTIFUL</h5>-->
                                <h2 class="banner-text2">Spring <span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="{{ $settings_info->summer_plant_link }}">
                                <img src="{{ asset('plants_images/shop_by_season_2.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">EARRINGS</h5>-->
                                <h2 class="banner-text2">Summer <span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="{{ $settings_info->fall_plant_link }}">
                                <img src="{{ asset('plants_images/shop_by_season_3.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">NEW ARRIVALLS</h5>-->
                                <h2 class="banner-text2">Fall <span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="{{ $settings_info->winter_plant_link }}">
                                <img src="{{ asset('plants_images/shop_by_season_4.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">NEW DESIGN</h5>-->
                                <h2 class="banner-text2">Winter <span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 style="color: #fff">Shop by Color</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->red_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/red.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/red.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Red</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->

                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->orange_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/orange.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/orange.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Orange</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->yellow_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/yellow.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/yellow.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Yellow</a></p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->green_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/green.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/green.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Green</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->blue_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/blue.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/blue.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Blue</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->lavendar_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/lavendar.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/lavendar.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Lavendar</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->purple_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/purple.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/purple.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Purple</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->pink_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/pink.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/pink.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Pink</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->magenta_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/magenta.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/magenta.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">Magenta</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ $settings_info->white_plant_link }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/white.png')  }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/white.png')  }}" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name white_text"><a href="product-details.html">White</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->
    </main>
@endsection
