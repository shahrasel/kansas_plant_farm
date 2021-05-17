@extends('layouts.app')

@section('content')
    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('plants_images/billboard_1.png') }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title">BEST SELLERS</h2>
                                        <h4 class="slide-desc">2021 Top Selling Plants.</h4>
                                        <a href="{{ url('/') }}/plants?category=best-sellers&min_zone=&max_zone=" class="btn btn-hero">See All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <h6>By Appointment Only</h6>
                                <p>Click Here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <h2 class="title home">Shop by Season</h2>
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('plants_images/shop_by_season_1.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">BEAUTIFUL</h5>-->
                                <h2 class="banner-text2">Spring<span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
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
                            <a href="#">
                                <img src="{{ asset('plants_images/shop_by_season_3.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">NEW ARRIVALLS</h5>-->
                                <h2 class="banner-text2">Fall<span>Plants</span></h2>
                                <a href="shop.html" class="btn btn-text shop">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('plants_images/shop_by_season_4.png')  }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
<!--                                <h5 class="banner-text1">NEW DESIGN</h5>-->
                                <h2 class="banner-text2">Winter<span>Plants</span></h2>
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
                                                <a href="product-details.html">
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
                                                <a href="product-details.html">
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
                                                <a href="product-details.html">
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
                                                <a href="product-details.html">
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
