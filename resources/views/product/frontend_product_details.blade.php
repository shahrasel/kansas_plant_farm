@extends('layouts.app')

@section('content')
    @inject('product_model', 'App\Models\Product')
    <main>
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('products') }}" role="button" class="btn btn-sqr" >Back to Shopping</a>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('/plants') }}">Plants</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $product->botanical_name }} / {{ $product->common_name }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
<!--                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>{{ $product->tags }}</span>
                                        </div>
                                    </div>-->
                                    @if(!empty($product_model->getAllImages($product)))
                                        <div class="product-large-slider">

                                                @php $i=1; @endphp
                                                @foreach($product_model->getAllImages($product) as $image)
                                                    <div class="pro-large-img">
                                                        <img src="{{ url('img/product/large/'.$product->id.'/'.$image) }}" onclick="openModal();currentSlide({{ $i++ }})" />
                                                    </div>
                                                @endforeach

                                        </div>
                                    @endif
                                    @if(!empty($product_model->getAllImages($product)))
                                        <div class="pro-nav slick-row-10 slick-arrow-style">

                                                @foreach($product_model->getAllImages($product) as $image)
                                                    <div class="pro-nav-thumb">
                                                        <img src="{{ url('img/product/thumb/'.$product->id.'/'.$image) }}" alt="product-details" />
                                                    </div>
                                                @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name">{{ $product->botanical_name }} <br/> <i>{{ $product->common_name }}</i>@if(!empty($product->patent_trademark_names))<br/>{{ $product->patent_trademark_names }} @endif</h3>


                                        {{--@if (Auth::check())
                                            @if(Auth()->user()->usertype=='contractor')
                                                <div class="price-box" id="contractor_price">
                                                    <span class="price-regular price-regular-ajax-contractor">
                                                        <!-- ${{ number_format($product->contractor_price_a,2) }}-->
                                                        @if(!empty($product_model->getProductPrice($product)))
                                                            ${{ $product_model->getProductPrice($product) }}
                                                        @endif
                                                    </span>
                                                </div>
                                            @else
                                                <div class="price-box" id="regular_size_price_user1">
                                                    <span class="price-regular price-regular-ajax">
                                                        ${{ number_format($product->retail_sale_price_a,2) }}
                                                    </span>
                                                    <span class="price-old price-old-ajax">
                                                        <del>${{ number_format($product->retail_list_price_a,2) }}</del>
                                                    </span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="price-box" id="regular_size_price_user2">
                                                <span class="price-regular price-regular-ajax">
                                                    ${{ number_format($product->retail_sale_price_a,2) }}</span>
                                                <span class="price-old price-old-ajax">
                                                    <del>${{ number_format($product->retail_list_price_a,2) }}</del>
                                                </span>
                                            </div>
                                        @endif--}}

                                        <div class="price-box">
                                            <span class="price-regular price-regular-ajax">
                                                @if(!empty($product->getProductPrice($product)))
                                                    ${{ $product->getProductPrice($product) }}
                                                @endif
                                            </span>
                                            <span class="price-old price-old-ajax">
                                                <del>
                                                    @if(!empty($product->getProductListPrice($product)))
                                                        <del>${{ $product->getProductListPrice($product) }}</del>
                                                    @endif
                                                </del>
                                            </span>
                                        </div>





                                        <div class="manufacturer-name details_tag">
                                            @if($product->perennial == 'YES')
                                                <a>Perennial</a>
                                            @endif
                                            @if($product->shrub == 'YES')
                                                <a>Shrub</a>
                                            @endif
                                            @if($product->vine == 'YES')
                                                <a>Vine</a>
                                            @endif
                                            @if($product->grass_bamboo == 'YES')
                                                <a>Grass / Bamboo</a>
                                            @endif
                                            @if($product->hardy_tropical == 'YES')
                                                <a>Hardy Tropical</a>
                                            @endif
                                            @if($product->water_plant == 'YES')
                                                <a>Water Plant</a>
                                            @endif
                                            @if($product->annual == 'YES')
                                                <a>Annual</a>
                                            @endif
                                            @if($product->house_deck_plant == 'YES')
                                                <a>House / Deck Plant</a>
                                            @endif
                                            @if($product->cactus_succulent == 'YES')
                                                <a>Cactus / Succulent</a>
                                            @endif
                                            @if($product->small_tree == 'YES')
                                                <a>Small Tree</a>
                                            @endif
                                            @if($product->large_tree == 'YES')
                                                <a>Large Tree</a>
                                            @endif
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span style="margin-right: 40px" id="product_count">
                                                @if(!empty($product->getProductStock($product)))
                                                    @if($product->getProductStock($product)>0)
                                                        @if($product->getProductStock($product) >= 10)
                                                            This size {{ $product->inventory_count_a }} in stock
                                                        @else
                                                            This size {{ $product->getProductStock($product) }} in stock
                                                        @endif
                                                    @else
                                                        THIS SIZE NOT AVAILABLE
                                                    @endif
                                                @else
                                                    THIS SIZE NOT AVAILABLE
                                                @endif
                                            </span>
                                            <span>Product ID: {{ $product->plant_id_number }}</span>
                                        </div>
                                        <p class="pro-desc">
                                            {{ $product->plant_description }}
                                        </p>

<!--                                        <form id="cartform" style="display:@if(!empty($product->inventory_count_a)) block @else none @endif">-->
                                        <form id="cartform" >
                                            @csrf
                                                <div class="quantity-cart-box d-flex align-items-center" id="addtocart_btn" @if(!empty($product->getProductStock($product))) @if($product->getProductStock($product)>0) style="display: block" @endif @else style="display: none !important;" @endif>
                                                    <h6 class="option-title" style="margin-right: 12px;">qty:</h6>
                                                    <div class="quantity">
                                                        <div class="pro-qty"><input style="color: #7fbc03" type="text" value="1" name="quantity" id="quantity"></div>
                                                    </div>
                                                    <div class="action_link">
                                                        <button class="btn btn-cart2">Add to cart</button>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="max_item" value="{{ $product->getProductStock($product) }}">


                                            @if(empty($product->other_product_service_name))
                                                <div class="pro-size">
                                                    @if(!empty($product_model->getProductSize($product)))
                                                        <h6 class="option-title">size :</h6>
                                                        <select class="nice-select" @if (Auth::check()) onchange="change_price('{{ $product->id }}', '{{ Auth()->user()->usertype }}')" @else onchange="change_price('{{ $product->id }}', 'none')" @endif id="size_select_box" name="size">
                                                            @foreach($product_model->getProductSize($product) as $size)
                                                                <option value="{{ $size }}">{{ $size }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                            @endif
                                            <input type="hidden" name="pot_size" id="pot_size" value="a">
                                            <input type="hidden" name="addtocart" value="1">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            {{--@if (Auth::check())
                                                @if(Auth()->user()->usertype=='contractor')
                                                    <input type="hidden" name="unit_price" id="unit_price_contractor" value="{{ $product->retail_sale_price_a }}">
                                                @else
                                                    <input type="hidden" name="unit_price" id="unit_price_user1" value="{{ $product->contractor_price_a }}">
                                                @endif
                                            @else
                                                <input type="hidden" name="unit_price" id="unit_price_user2" value="{{ $product->retail_sale_price_a }}">
                                            @endif--}}


                                        </form>


                                        <div class="manufacturer-name details_tag" style="margin-bottom: 13px;">
                                            @if($product->sustainable_garden == 'YES')
                                                <a>Sustainable Garden</a>
                                            @endif
                                            @if($product->native_plant_garden == 'YES')
                                                <a >Native Plant Garden</a>
                                            @endif
                                            @if($product->bird_wildlife_garden == 'YES')
                                                <a >Bird Wildlife Garden</a>
                                            @endif
                                            @if($product->butterfly_bee_garden == 'YES')
                                                <a >Butterfly Bee Garden</a>
                                            @endif
                                            @if($product->lush_tropical_garden == 'YES')
                                                <a >Lush Tropical Garden</a>
                                            @endif
                                            @if($product->dry_shade_garden == 'YES')
                                                <a >Dry Shade Garden</a>
                                            @endif
                                            @if($product->edible_medicinal_garden == 'YES')
                                                <a >Edible Medicinal Garden</a>
                                            @endif
                                            @if($product->rain_garden == 'YES')
                                                <a >Rain Garden</a>
                                            @endif
                                            @if($product->colorado_rustic_garden == 'YES')
                                                <a >Colorado Rustic Garden</a>
                                            @endif
                                            @if($product->desert_cactus_rock_garden == 'YES')
                                                <a >Desert Cactus Rock Garden</a>
                                            @endif

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
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">Information</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two">Description</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                                            <h5 style="margin-top: 20px;margin-bottom: 10px">CULTURAL CONDITIONS</h5>
                                                            @if($product->min_zone)
                                                                <p><b>Plant Min Zone:</b> {{ \App\Models\Product::zoneLists()[$product->min_zone] }}</p>
                                                            @endif
                                                            @if($product->max_zone)
                                                                <p><b>Plant Max Zone:</b> {{ \App\Models\Product::zoneLists()[$product->max_zone] }}</p>
                                                            @endif

                                                            @if($product->sunlight)
                                                                <p><b>Sunlight:</b> {{ rtrim(str_replace(',',', ',ltrim($product->sunlight,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->water_rainfall)
                                                                <p><b>Water / Rainfall:</b> {{ rtrim(str_replace(',',', ',ltrim($product->water_rainfall,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->soil_quality)
                                                                <p><b>Soil Quality:</b> {{ rtrim(str_replace(',',', ',ltrim($product->soil_quality,',')),", ") }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                                            <h5 style="margin-top: 20px;margin-bottom: 10px">FLOWERS AND FOLIAGE</h5>
                                                            @if($product->bloom_season)
                                                                <p><b>Bloom Season:</b> {{ rtrim(str_replace(',',', ',ltrim($product->bloom_season,',')),", ") }}</p>
                                                            @endif
                                                            @if($product->flower_color)
                                                                <p><b>Flower Color:</b> {{ rtrim(str_replace(',',', ',ltrim($product->flower_color,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->berry_fruit_color)
                                                                <p><b>Berry / Fruit Color:</b> {{ rtrim(str_replace(',',', ',ltrim($product->berry_fruit_color,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->spring_foliage_color)
                                                                <p><b>Spring Foliage Color:</b> {{ rtrim(str_replace(',',', ',ltrim($product->spring_foliage_color,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->summer_foliage_color)
                                                                <p><b>Summer Foliage Color:</b> {{ rtrim(str_replace(',',', ',ltrim($product->summer_foliage_color,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->fall_foliage_color)
                                                                <p><b>Fall Foliage Color:</b> {{ rtrim(str_replace(',',', ',ltrim($product->fall_foliage_color,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->has_evergreen_foliage)
                                                                <p><b>Evergreen Foliage:</b> {{ $product->has_evergreen_foliage }}</p>
                                                            @endif

                                                            @if($product->has_winter_interest)
                                                                <p><b>Winter Interest:</b> {{ $product->has_winter_interest }}</p>
                                                            @endif

                                                            @if($product->scented_flowers)
                                                                <p><b>Scented Flowers:</b> {{ $product->scented_flowers }}</p>
                                                            @endif
                                                        </div>


                                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                                            <h5 style="margin-top: 20px;margin-bottom: 10px">PLANT TOLERANCES</h5>
                                                            @if($product->drought_tolerance)
                                                                <p><b>Drought Tolerance:</b> {{ rtrim(str_replace(',',', ',ltrim($product->drought_tolerance,',')),", ") }}</p>
                                                            @endif
                                                            @if($product->wet_feet_tolerance)
                                                                <p><b>Wet-Feet Tolerance:</b> {{ rtrim(str_replace(',',', ',ltrim($product->wet_feet_tolerance,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->humidity_tolerance)
                                                                <p><b>Humidity Tolerance:</b> {{ rtrim(str_replace(',',', ',ltrim($product->humidity_tolerance,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->wind_tolerence)
                                                                <p><b>Wind Tolerance:</b> {{ rtrim(str_replace(',',', ',ltrim($product->wind_tolerence,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->poor_soil_tolerance)
                                                                <p><b>Poor Soil Tolerance:</b> {{ rtrim(str_replace(',',', ',ltrim($product->poor_soil_tolerance,',')),", ") }}</p>
                                                            @endif
                                                        </div>

                                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                                            <h5 style="margin-top: 20px;margin-bottom: 10px">GROWTH AND MAINTENANCE</h5>
                                                            @if($product->min_height)
                                                                <p><b>Height:</b> {{ $product->min_height."' - ".$product->max_height."'" }}</p>
                                                            @endif
                                                            @if($product->min_width)
                                                                <p><b>Width:</b> {{ $product->min_width."' - ".$product->max_width."'" }}</p>
                                                            @endif

                                                            @if($product->growth_rate)
                                                                <p><b>Growth Rate:</b> {{ rtrim(str_replace(',',', ',ltrim($product->growth_rate,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->service_life)
                                                                <p><b>Service Life:</b> {{ rtrim(str_replace(',',', ',ltrim($product->service_life,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->maintenance_requirements)
                                                                <p><b>Maintenance Need:</b> {{ rtrim(str_replace(',',', ',ltrim($product->maintenance_requirements,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->spreading_potential)
                                                                <p><b>Spreading Potential:</b> {{ rtrim(str_replace(',',', ',ltrim($product->spreading_potential,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->yearly_trimming_tips)
                                                                <p><b>Yearly Trimming Tips:</b> {{ rtrim(str_replace(',',', ',ltrim($product->yearly_trimming_tips,',')),", ") }}</p>
                                                            @endif


                                                        </div>



                                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                                            <h5 style="margin-top: 20px;margin-bottom: 10px">PLANT USES AND LIMITATIONS</h5>
                                                            @if($product->plant_grouping_size)
                                                                <p><b>Plant Grouping Size:</b> {{ rtrim(str_replace(',',', ',ltrim($product->plant_grouping_size,',')),", ") }}</p>
                                                            @endif
                                                            @if($product->best_side_of_house)
                                                                <p><b>Best Side of House:</b> {{ rtrim(str_replace(',',', ',ltrim($product->best_side_of_house,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->extreme_planting_locations)
                                                                <p><b>Extreme Planting Locations:</b> {{ rtrim(str_replace(',',', ',ltrim($product->extreme_planting_locations,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->ornamental_features)
                                                                <p><b>Ornamental Features:</b> {{ rtrim(str_replace(',',', ',ltrim($product->ornamental_features,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->special_landscape_uses)
                                                                <p><b>Special Landscape Uses:</b> {{ rtrim(str_replace(',',', ',ltrim($product->special_landscape_uses,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->possible_pest_problems)
                                                                <p><b>Possible Pest Problems:</b> {{ rtrim(str_replace(',',', ',ltrim($product->possible_pest_problems,',')),", ") }}</p>
                                                            @endif

                                                            @if($product->plant_limitations)
                                                                <p><b>Plant Limitations:</b> {{ rtrim(str_replace(',',', ',ltrim($product->plant_limitations,',')),", ") }}</p>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <div class="col-xl-4 col-md-6 col-sm-12">
                                                    <h5 style="margin-top: 20px;margin-bottom: 10px">Description section</h5>
                                                    @if($product->how_to_grow_in_kansas)
                                                        <p><b>How to Grow in Kansas:</b> {{ rtrim(str_replace(',',', ',ltrim($product->how_to_grow_in_kansas,',')),", ") }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            {{--<div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="{{ asset('img/about/avatar.jpg') }}" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Mar, 2019</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>
    <!-- The Modal/Lightbox -->

    <style>
        .row > .column {
            padding: 0 8px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Create four equal columns that floats next to eachother */
        .column {
            float: left;
            width: 12%;
            margin-right: 4px;
        }

        /* The Modal (background) */
        .fodal {
            display: none;
            /*visibility: visible;*/
            position: fixed;
            z-index: 1000000;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
            opacity: 1 !important;
            pointer-events: auto !important;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 70%;
            max-width: 1200px;
        }

        /* The Close Button */
        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }

        /* Hide the slides by default */
        .mySlides {
            display: none;
        }

        .slick-row-10 .slick-list .slick-slide {
            margin-right: 1px !important;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 45%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Caption text */
        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }

        img.demo {
            opacity: 0.6;
            cursor: pointer;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        img.hover-shadow {
            transition: 0.3s;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        </style>

    <div id="myModal" class="fodal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content" id="modal_content">

            @if(!empty($product_model->getAllImages($product)))
                @foreach($product_model->getAllImages($product) as $image)
                    <div class="mySlides">
                        <!--                        <div class="numbertext">1 / 4</div>-->
                        <img src="{{ url('img/product/large/'.$product->id.'/'.$image) }}" style="width:100%">
                    </div>
                @endforeach
            @endif

        <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Caption text -->
<!--            <div class="caption-container">
                <p id="caption"></p>
            </div>-->

            <!-- Thumbnail image controls -->

            <div style="background-color: #000;padding-top: 5px">
                @if(!empty($product->getAllImages($product)))
                    @php $i=1; @endphp
                    @foreach($product->getAllImages($product) as $image)
                        <div class="column">
                            <img class="demo" src="{{ url('img/product/thumb/'.$product->id.'/'.$image) }}" onclick="currentSlide({{$i++}})">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>

        // Open the Modal
        function openModal() {
            $("#myModal").hide();
            $("#myModal").fadeIn("slow");
        }

        // Close the Modal
        function closeModal() {
            $("#myModal").fadeOut("slow");


        }

        @if(!empty($product_model->getAllImages($product)))
            var slideIndex = 1;
            showSlides(slideIndex);
        @endif

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            //var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            //captionText.innerHTML = dots[slideIndex-1].alt;
        }

        $(document).click(function(event) {
            //if you click on anything except the modal itself or the "open modal" link, close the modal
            if (!$(event.target).closest("#modal_content,.pro-large-img").length) {
                $("#myModal").fadeOut();
            }
        });


        jQuery( document ).ready( function( $ ) {
            jQuery("select#size_select_box").change(function() {
                @if (Auth::check())
                    @if(Auth()->user()->usertype=='buyer')
                        if(jQuery("select#size_select_box").val() == '44') {
                            jQuery("#unit_price").val("{{ $product->retail_sale_price_a }}");
                        }
                        else if(jQuery("select#size_select_box").val() == '55') {
                            jQuery("#unit_price").val("{{ $product->retail_sale_price_b }}");
                        }
                        else if(jQuery("select#size_select_box").val() == '66') {
                            jQuery("#unit_price").val("{{ $product->retail_sale_price_c }}");
                        }
                    @else
                        if(jQuery("select#size_select_box").val() == '44') {
                            jQuery("#unit_price").val("{{ $product->contractor_price_a }}");
                        }
                        else if(jQuery("select#size_select_box").val() == '55') {
                            jQuery("#unit_price").val("{{ $product->contractor_price_b }}");
                        }
                        else if(jQuery("select#size_select_box").val() == '66') {
                            jQuery("#unit_price").val("{{ $product->contractor_price_c }}");
                        }
                    @endif
                @else
                    if(jQuery("select#size_select_box").val() == '44') {
                        jQuery("#unit_price").val("{{ $product->retail_sale_price_a }}");
                    }
                    else if(jQuery("select#size_select_box").val() == '55') {
                        jQuery("#unit_price").val("{{ $product->retail_sale_price_b }}");
                    }
                    else if(jQuery("select#size_select_box").val() == '66') {
                        jQuery("#unit_price").val("{{ $product->retail_sale_price_c }}");
                    }
                @endif



            });

            $( '#cartform' ).on( 'submit', function(e) {
                e.preventDefault();
                var form = $("#cartform");
                $.ajax({
                    type: "POST",
                    url: "{{ url('add-to-cart') }}",
                    data: form.serialize(),
                }).done(function( msg ) {
                    if(msg == 'Product is added to the cart successfully!') {
                        //alert(msg);
                        location.reload();
                    }
                });

            });
        });
    </script>
@endsection
