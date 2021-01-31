@extends('layouts.app')

@section('content')
    <main>
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>{{ $product->tags }}</span>
                                        </div>
                                    </div>
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('plants_images/1.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('plants_images/2.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('plants_images/7.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('plants_images/4.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{ asset('plants_images/5.jpg') }}" alt="product-details" />
                                        </div>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="{{ asset('plants_images/1.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="{{ asset('plants_images/2.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="{{ asset('plants_images/7.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="{{ asset('plants_images/4.jpg') }}" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="{{ asset('plants_images/5.jpg') }}" alt="product-details" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name">{{ $product->common_name }} <br/> <i>{{ $product->botanical_name }}</i></h3>

                                        @if (Auth::check())
                                            @if(Auth()->user()->usertype=='buyer')
                                                <div class="price-box" id="44_size_price">
                                                    <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                    <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                                </div>
                                                <div class="price-box" id="55gal_size_price" style="display: none">
                                                    <span class="price-regular">${{ $product->retail_sale_price_b }}</span>
                                                    <span class="price-old"><del>${{ $product->retail_list_price_b }}</del></span>
                                                </div>
                                                <div class="price-box" id="flat66_size_price" style="display: none">
                                                    <span class="price-regular">${{ $product->retail_sale_price_c }}</span>
                                                    <span class="price-old"><del>${{ $product->retail_list_price_c }}</del></span>
                                                </div>
                                            @else
                                                <div class="price-box" id="44_size_price">
                                                    <span class="price-regular">${{ $product->contractor_price_a }}</span>
                                                </div>
                                                <div class="price-box" id="55gal_size_price" style="display: none">
                                                    <span class="price-regular">${{ $product->contractor_price_b }}</span>
                                                </div>
                                                <div class="price-box" id="flat66_size_price" style="display: none">
                                                    <span class="price-regular">${{ $product->contractor_price_c }}</span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="price-box" id="44_size_price">
                                                <span class="price-regular">${{ $product->retail_sale_price_a }}</span>
                                                <span class="price-old"><del>${{ $product->retail_list_price_a }}</del></span>
                                            </div>
                                            <div class="price-box" id="55gal_size_price" style="display: none">
                                                <span class="price-regular">${{ $product->retail_sale_price_b }}</span>
                                                <span class="price-old"><del>${{ $product->retail_list_price_b }}</del></span>
                                            </div>
                                            <div class="price-box" id="flat66_size_price" style="display: none">
                                                <span class="price-regular">${{ $product->retail_sale_price_c }}</span>
                                                <span class="price-old"><del>${{ $product->retail_list_price_c }}</del></span>
                                            </div>
                                        @endif




                                        {{--<h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2019/12/20"></div>--}}
                                        <div class="manufacturer-name">
                                            @if($product->perennial == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=perennial") }}">Perennial</a>
                                            @endif
                                            @if($product->shrub == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=shrub") }}">Shrub</a>
                                            @endif
                                            @if($product->vine == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=vine") }}">Vine</a>
                                            @endif
                                            @if($product->grass_bamboo == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=grass_bamboo") }}">Grass Bamboo</a>
                                            @endif
                                            @if($product->hardy_tropical == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=hardy_tropical") }}">Hardy Tropical</a>
                                            @endif
                                            @if($product->water_plant == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=water_plant") }}">Water Plant</a>
                                            @endif
                                            @if($product->annual == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=annual") }}">Annual</a>
                                            @endif
                                            @if($product->house_deck_plant == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=house_deck_plant") }}">House Deck Plant</a>
                                            @endif
                                            @if($product->cactus_succulent == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=cactus_succulent") }}">Cactus Succulent</a>
                                            @endif
                                            @if($product->small_tree == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=small_tree") }}">Small Tree</a>
                                            @endif
                                            @if($product->large_tree == 'YES')
                                                <a style="background-color: #7FBC03;display: inline-block;line-height:17px;color: #fff;padding: 2px 7px;border-radius: 20px;margin: 0px 4px 0px 0px;" href="{{ url("/products?category=large_tree") }}">Large_tree</a>
                                            @endif
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>
                                                @if($product->inventory_count_a >$product->low_inventory_count_a)
                                                    in stock
                                                @else
                                                    Only {{ $product->inventory_count_a }} in stock
                                                @endif
                                            </span>
                                        </div>
                                        <p class="pro-desc">
                                            {{ $product->plant_description }}
                                        </p>
                                        <form id="cartform">
                                            @csrf
                                            <div class="quantity-cart-box d-flex align-items-center">
                                                <h6 class="option-title">qty:</h6>
                                                <div class="quantity">
                                                    <div class="pro-qty"><input style="color: #7fbc03" type="text" value="1" name="quantity"></div>
                                                </div>
                                                <div class="action_link">
<!--                                                    <a class="btn btn-cart2" href="#" type="button">Add to cart</a>-->
                                                    <button class="btn btn-cart2">Add to cart</button>
                                                </div>
                                            </div>
                                            <div class="pro-size">
                                                <h6 class="option-title">size :</h6>
                                                <select class="nice-select" onchange="change_price()" id="size_select_box" name="size">
                                                    <option value="44">44"</option>
                                                    <option value="55">55gal</option>
                                                    <option value="66">flat of 66</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="addtocart" value="1">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            @if (Auth::check())
                                                @if(Auth()->user()->usertype=='buyer')
                                                    <input type="hidden" name="unit_price" id="unit_price" value="{{ $product->retail_sale_price_a }}">
                                                @else
                                                    <input type="hidden" name="unit_price" id="unit_price" value="{{ $product->contractor_price_a }}">
                                                @endif
                                            @else
                                                <input type="hidden" name="unit_price" id="unit_price" value="{{ $product->retail_sale_price_a }}">
                                            @endif


                                        </form>


                                        @auth
                                            @inject('wishlist', 'App\Models\Wishlist')

                                            <form id="wishlist_form" method="post">
                                                @csrf
                                                <div class="useful-links">
                                                    {{--<a href="#" data-toggle="tooltip" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i>compare</a>--}}
                                                    <a onclick="wishlist_form_submit()" data-toggle="tooltip" title="Wishlist" style="cursor: pointer;text-transform: none">

                                                            @if($wishlist->checkUsersWishlist($product) == 1)
                                                            <i id="like_active" class="pe-7s-like like_active"></i><span id="wish_text">Added to wishlist</span></a>
                                                            @else
                                                        <i id="like_active" class="pe-7s-like"></i><span id="wish_text">Add to wishlist</span></a>
                                                            @endif
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                </div>
                                            </form>
                                        @endauth
                                        @guest
                                            <div class="useful-links">
                                                <a href="{{ url('/login') }}" data-toggle="tooltip" title="Wishlist" style="cursor: pointer">
                                                    <i id="like_active" class="pe-7s-like"></i>Add to wishlist
                                                </a>
                                            </div>
                                        @endguest
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
                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_two">information</a>
                                            </li>
                                            {{--<li>
                                                <a data-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>--}}
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                        fringilla augue nec est tristique auctor. Ipsum metus feugiat
                                                        sem, quis fermentum turpis eros eget velit. Donec ac tempus
                                                        ante. Fusce ultricies massa massa. Fusce aliquam, purus eget
                                                        sagittis vulputate, sapien libero hendrerit est, sed commodo
                                                        augue nisi non neque.Cras neque metus, consequat et blandit et,
                                                        luctus a nunc. Etiam gravida vehicula tellus, in imperdiet
                                                        ligula euismod eget. Pellentesque habitant morbi tristique
                                                        senectus et netus et malesuada fames ac turpis egestas. Nam
                                                        erat mi, rutrum at sollicitudin rhoncus</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td>color</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>size</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('plants_images/1.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('plants_images/1.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>10%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                    </div>
                                    <ul class="color-categories">
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
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$60.00</span>
                                        <span class="price-old"><del>$70.00</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->

                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('plants_images/2.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('plants_images/2.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>sale</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>new</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                    </div>
                                    <ul class="color-categories">
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
                                        <a href="product-details.html">Handmade Golden Necklace</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$50.00</span>
                                        <span class="price-old"><del>$80.00</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->

                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('plants_images/7.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('plants_images/7.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                                    </div>
                                    <ul class="color-categories">
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
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$99.00</span>
                                        <span class="price-old"><del></del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->

                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('plants_images/4.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('plants_images/4.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>sale</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>15%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                                    </div>
                                    <ul class="color-categories">
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
                                        <a href="product-details.html">Diamond Exclusive Ornament</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$55.00</span>
                                        <span class="price-old"><del>$75.00</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->

                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="pri-img" src="{{ asset('plants_images/5.jpg') }}" alt="product">
                                        <img class="sec-img" src="{{ asset('plants_images/5.jpg') }}" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                                    </div>
                                    <ul class="color-categories">
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
                                        <a href="product-details.html">Citygold Exclusive Ring</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">$60.00</span>
                                        <span class="price-old"><del>$70.00</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>
@endsection
@section('javascript')
    <script>
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
