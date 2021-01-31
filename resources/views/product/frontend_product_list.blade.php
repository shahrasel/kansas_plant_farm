@extends('layouts.app')

@section('content')
    <main>
        <!-- breadcrumb area start -->
        {{--<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop list left sidebar</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container" id="parent_container">
                <div class="row">
                    <!-- sidebar area start -->

                    @if(checkDevice() != 'phone')
                        <div class="col-lg-3 order-2 order-lg-1">
                            <aside class="sidebar-wrapper">
                                <!-- single sidebar start -->
                                <div class="sidebar-single">
                                    <h5 class="sidebar-title open">categories<i></i></h5>
                                    <div class="sidebar-body">
                                        <ul class="shop-categories">
                                            <li><a href="{{ url("/products") }}">All <span>({{ $total_product_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=perennial") }}">Perennial <span>({{ $perennial_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=shrub") }}">Shrub <span>({{ $shrub_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=vine") }}">Vine <span>({{ $vine_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=grass_bamboo") }}">Grass/Bamboo <span>({{ $grass_bamboo_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=hardy_tropical") }}">Hardy Tropical <span>({{ $hardy_tropical_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=water_plant") }}">Water Plant <span>({{ $water_plant_cat_count }})</span></a></li>

                                            <li><a href="{{ url("/products?category=annual") }}">Annual <span>({{ $annual_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=house_deck_plant") }}">House/Deck Plant <span>({{ $house_deck_plant_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=cactus_succulent") }}">Cactus/Succulent <span>({{ $cactus_succulent_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=small_tree") }}">Small Tree <span>({{ $small_tree_cat_count }})</span></a></li>
                                            <li><a href="{{ url("/products?category=large_tree") }}">Large Tree <span>({{ $large_tree_cat_count }})</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- single sidebar end -->

                                <!-- single sidebar start -->
                            <!--                            <div class="sidebar-single">
                                <h5 class="sidebar-title">price</h5>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form action="" class="d-flex align-items-center justify-content-between" method="post">
                                                @csrf
                                <div class="price-input">
                                    <label for="amount">Price: </label>
                                    <input type="text" id="amount" name="amount">
                                </div>
                                <button class="filter-btn" type="submit">filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>-->
                                <!-- single sidebar end -->

                                <!-- single sidebar start -->
                            {{--<div class="sidebar-single">
                                <h5 class="sidebar-title">Brand</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Studio (3)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Hastech (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Quickiin (15)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Graphic corner (10)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">devItems (12)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>--}}
                            <!-- single sidebar end -->

                                <!-- single sidebar start -->
                            {{--<div class="sidebar-single">
                                <h5 class="sidebar-title">color</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>--}}
                            <!-- single sidebar end -->

                                <!-- single sidebar start -->
                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">size<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck111">
                                                    <label class="custom-control-label" for="customCheck111">44"</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck222">
                                                    <label class="custom-control-label" for="customCheck222">55gal</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck333">
                                                    <label class="custom-control-label" for="customCheck333">flat of 66</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- single sidebar end -->
                            </aside>
                        </div>
                    @endif
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                {{--<p>Showing 1–16 of 21 results</p>--}}
        <p style="text-transform:none">Showing {{($product_paginate->currentpage()-1)*$product_paginate->perpage()+1}} to
            @if($product_paginate->total()>50)
                @if(app('request')->input('page'))
                    @if($product_paginate->lastPage() == app('request')->input('page')) {{$product_paginate->total()}}
                    @else {{ ($product_paginate->currentpage())*$product_paginate->perpage() }}
                    @endif
                @else
                    {{ ($product_paginate->currentpage())*$product_paginate->perpage() }}
                @endif
            @else
                @if(app('request')->input('page'))
                    @if($product_paginate->lastPage() == app('request')->input('page')) {{$product_paginate->total()}}
                    @else {{ ($product_paginate->currentpage()-1)*$product_paginate->perpage() }}
                    @endif
                @else
                    {{ $product_paginate->total() }}
                @endif
            @endif
                                                    of  {{$product_paginate->total()}} products
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <form action="" method="post" id="sort_form" onchange="sortFormSubmit()">
                                                    @csrf
                                                    <select class="nice-select" name="sortby">
                                                        <option value="">-- Select --</option>
                                                        <option value="name_asc">Name (A - Z)</option>
                                                        <option value="name_desc">Name (Z - A)</option>
                                                        <option value="price_asc">Price (Low - High)</option>
                                                        <option value="price_desc">Price (High - Low)</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->
                            @if ($product_paginate->hasPages())
                                <div class="paginatoin-area text-center mb-30">
                                    {{ $product_paginate->withQueryString()->links('pagination') }}
                                </div>
                            @endif

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                @foreach($products as $product)
                                    <div class="col-md-4 col-sm-6">


                                    <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details/{{ $product->id }}">
                                                    <img class="pri-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">
                                                    <img class="sec-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>{{ $product->tags }}</span>
                                                    </div>
                                                </div>
                                                <div class="button-group">
                                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details/{{ $product->id }}">{{ $product->common_name }} <br/> <i>{{ $product->botanical_name }}</i></a></p>
                                                </div>
                                                {{--<ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-darktan" href="#" title="Darktan"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-grey" href="#" title="Grey"></a>
                                                    </li>
                                                    <li>
                                                        <a class="c-brown" href="#" title="Brown"></a>
                                                    </li>
                                                </ul>
                                                <h6 class="product-name">
                                                    <a href="product-details.html">Perfect Diamond Jewelry</a>
                                                </h6>--}}
                                                <div class="price-box">
                                                    @if (Auth::check())
                                                        @if(Auth()->user()->usertype=='buyer')
                                                            <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                            <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                                        @else
                                                            <span class="price-regular">${{ $product->contractor_price_a }}</span>
                                                        @endif
                                                    @else
                                                        <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                        <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                                    @endif
                                                </div>

                                                <div class="manufacturer-name" style="margin-top: 20px;line-height: 30px;">
                                                    @if($product->perennial == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=perennial") }}">Perennial</a>
                                                    @endif
                                                    @if($product->shrub == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=shrub") }}">Shrub</a>
                                                    @endif
                                                    @if($product->vine == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=vine") }}">Vine</a>
                                                    @endif
                                                    @if($product->grass_bamboo == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=grass_bamboo") }}">Grass/Bamboo</a>
                                                    @endif
                                                    @if($product->hardy_tropical == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=hardy_tropical") }}">Hardy Tropical</a>
                                                    @endif
                                                    @if($product->water_plant == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=water_plant") }}">Water Plant</a>
                                                    @endif
                                                    @if($product->annual == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=annual") }}">Annual</a>
                                                    @endif
                                                    @if($product->house_deck_plant == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=house_deck_plant") }}">House/Deck Plant</a>
                                                    @endif
                                                    @if($product->cactus_succulent == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=cactus_succulent") }}">Cactus/Succulent</a>
                                                    @endif
                                                    @if($product->small_tree == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=small_tree") }}">Small Tree</a>
                                                    @endif
                                                    @if($product->large_tree == 'YES')
                                                            <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=large_tree") }}">Large_tree</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="product-details/{{ $product->id }}">
                                                <img class="pri-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">
                                                <img class="sec-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>{{ $product->tags }}</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <h5 class="product-name" style="padding-top: 0px;">
                                                <a href="product-details/{{ $product->id }}">{{ $product->common_name }} <br/> <i>{{ $product->botanical_name }}</i></a>
                                            </h5>
                                            <div class="price-box">
                                                @if (Auth::check())
                                                    @if(Auth()->user()->usertype=='buyer')
                                                        <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                        <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                                    @else
                                                        <span class="price-regular">${{ $product->contractor_price_a }}</span>
                                                    @endif
                                                @else
                                                    <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                    <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                                @endif
                                            </div>
                                            <div class="manufacturer-name" style="margin-top: 20px;">
                                                @if($product->perennial == 'YES')
                                                    <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=perennial") }}">Perennial</a>
                                                @endif
                                                @if($product->shrub == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=shrub") }}">Shrub</a>
                                                @endif
                                                @if($product->vine == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=vine") }}">Vine</a>
                                                @endif
                                                @if($product->grass_bamboo == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=grass_bamboo") }}">Grass/Bamboo</a>
                                                @endif
                                                @if($product->hardy_tropical == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=hardy_tropical") }}">Hardy Tropical</a>
                                                @endif
                                                @if($product->water_plant == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=water_plant") }}">Water Plant</a>
                                                @endif
                                                @if($product->annual == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=annual") }}">Annual</a>
                                                @endif
                                                @if($product->house_deck_plant == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=house_deck_plant") }}">House/Deck Plant</a>
                                                @endif
                                                @if($product->cactus_succulent == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=cactus_succulent") }}">Cactus/Succulent</a>
                                                @endif
                                                @if($product->small_tree == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=small_tree") }}">Small Tree</a>
                                                @endif
                                                @if($product->large_tree == 'YES')
                                                        <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px;" href="{{ url("/products?category=large_tree") }}">Large_tree</a>
                                                @endif
                                            </div>
                                            <p style="padding-top:15px;">
                                                {{ $product->plant_description }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
                                @endforeach

                            </div>
                            <!-- product item list wrapper end -->

                            @if ($product_paginate->hasPages())
                                <!-- start pagination area -->
                                <div class="paginatoin-area text-center">
                                    {{--<ul class="pagination-box">
                                        <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                    </ul>--}}
                                    {{--{{$product_paginate->links('pagination', ['query_string' => $query_string]) }}--}}
                                    {{ $product_paginate->withQueryString()->links('pagination') }}
                                </div>
                                    <!-- end pagination area -->
                            @endif

                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>

    @if(checkDevice() == 'phone')
        <div id="filter_div" class="col-lg-3 order-2 order-lg-1" style="position: absolute !important;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;background-color: rgba(0, 0, 0, 0.90);z-index: 1000;padding-top: 0px;padding-bottom: 20px;display: none;overflow: auto;">
            <div class="minicart-close" style="width: 50px;
height: 50px;
text-align: center;
background-color: #7fbc03;
color: #fff;
font-size: 50px;
cursor: pointer;
top: 0px;
right: 0px;
position: absolute;">
                <a onclick="showFilterDiv()"><i class="pe-7s-close" style="display:block"></i></a>
            </div>
            <aside class="sidebar-wrapper">
                <!-- single sidebar start -->
                <div class="sidebar-single" style="padding-top: 20px;">
                    <h5 class="sidebar-title open">categories<i></i></h5>
                    <div class="sidebar-body">
                        <ul class="shop-categories">
                            <li><a href="{{ url("/products") }}">All <span>({{ $total_product_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=perennial") }}">Perennial <span>({{ $perennial_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=shrub") }}">Shrub <span>({{ $shrub_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=vine") }}">Vine <span>({{ $vine_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=grass_bamboo") }}">Grass/Bamboo <span>({{ $grass_bamboo_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=hardy_tropical") }}">Hardy Tropical <span>({{ $hardy_tropical_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=water_plant") }}">Water Plant <span>({{ $water_plant_cat_count }})</span></a></li>

                            <li><a href="{{ url("/products?category=annual") }}">Annual <span>({{ $annual_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=house_deck_plant") }}">House/Deck Plant <span>({{ $house_deck_plant_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=cactus_succulent") }}">Cactus/Succulent <span>({{ $cactus_succulent_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=small_tree") }}">Small Tree <span>({{ $small_tree_cat_count }})</span></a></li>
                            <li><a href="{{ url("/products?category=large_tree") }}">Large Tree <span>({{ $large_tree_cat_count }})</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- single sidebar end -->

                <!-- single sidebar start -->
            <!--                            <div class="sidebar-single">
                                <h5 class="sidebar-title">price</h5>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form action="" class="d-flex align-items-center justify-content-between" method="post">
                                                @csrf
                <div class="price-input">
                    <label for="amount">Price: </label>
                    <input type="text" id="amount" name="amount">
                </div>
                <button class="filter-btn" type="submit">filter</button>
            </form>
        </div>
    </div>
</div>
</div>-->
                <!-- single sidebar end -->

                <!-- single sidebar start -->
            {{--<div class="sidebar-single">
                <h5 class="sidebar-title">Brand</h5>
                <div class="sidebar-body">
                    <ul class="checkbox-container categories-list">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Studio (3)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">Hastech (4)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Quickiin (15)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Graphic corner (10)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label" for="customCheck5">devItems (12)</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>--}}
            <!-- single sidebar end -->

                <!-- single sidebar start -->
            {{--<div class="sidebar-single">
                <h5 class="sidebar-title">color</h5>
                <div class="sidebar-body">
                    <ul class="checkbox-container categories-list">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>--}}
            <!-- single sidebar end -->

                <!-- single sidebar start -->
                <div class="sidebar-single" style="padding-bottom: 90px;">
                    <h5 class="sidebar-title">size<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck111">
                                    <label class="custom-control-label" for="customCheck111">44"</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck222">
                                    <label class="custom-control-label" for="customCheck222">55gal</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck333">
                                    <label class="custom-control-label" for="customCheck333">flat of 66</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- single sidebar end -->
            </aside>
        </div>
    @endif
@endsection

@section('javascript')
    <script>
        jQuery(document).ready(function($){
            //you can now use $ as your jQuery object.
            $('html, body').css({
                overflow: 'auto',
                height: 'auto'
            });

            jQuery(".sidebar-title").click(function() {
                jQuery(this).toggleClass('open');
                jQuery(this).parent().addClass('active').find('.sidebar-body').slideToggle('fast');
                jQuery(".sidebar-body").not(this).parent().removeClass('active').find('.panel-body').slideUp('fast');
            });
        });
    </script>
@endsection
