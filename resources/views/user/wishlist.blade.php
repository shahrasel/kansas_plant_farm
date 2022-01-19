@extends('layouts.app')
@section('custom_styles')
    <style>

        #min_sel .nice-select{
            width: 100% !important;
        }
        .sidebar-single .sidebar-title.second_sidebar::before {
            width: 100%;
            height: 1px;
            left: 0;
            bottom: 0;
            content: " ";
            position: absolute;
            background-color: #0f0;
            display: none;
        }

        .sidebar-single .sidebar-title.second_sidebar {
            position: relative;
            line-height: 1;
            margin-top: -3px;
            padding-bottom: 15px;
            margin-bottom: 0px;
            text-transform: capitalize;
            cursor: pointer;
        }
        .custom-control.custom-checkbox.second_custom_control {
            padding-left: 0px;
        }
        .custom-control.custom-checkbox.second_custom_control .categories-list li {
            padding-left: 1.5rem;
        }
        .alpha_pagination li {
            display: inline-block;
            margin-bottom: 5px;
        }
        .alpha {
            color: #7fbc03;
            height: 26px;
            width: 26px;
            font-size: 14px;
            display: inline-block;
            text-align: center;
            line-height: 36px;
        }
        .sel_alpha {
            color: #fff !important;
            font-weight: bold;
            text-decoration: underline;

        }
    </style>
@endsection
@section('content')
@inject('product_model', 'App\Models\Product')
    <main>
        <div class="shop-main-wrapper section-padding" style="padding-top: 40px">
            <div class="container" id="parent_container">
                <div class="row">
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <div class="alpha_pagination text-center mb-30">
                                <h1 class="text-lg-left text-md-left text-sm-center mb-30">My Wishlist</h1>
                            </div>

                        <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30 mt-30">
                                @foreach($product_lists as $wishlist)
                                    <div class="col-md-4 col-sm-6">

                                        {{--{{ $product_model->getImage($product) }}--}}
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ url('/plants') }}/{{ $wishlist->product->slug }}">
                                                    @if(!empty(($product_model->getImage($wishlist->product))))
                                                        <img class="pri-img" src="{{ url($product_model->getImage($wishlist->product)) }}" alt="product">
                                                        <img class="sec-img" src="{{ url($product_model->getImage($wishlist->product)) }}" alt="product">
                                                    @else
                                                        <img class="pri-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                        <img class="sec-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                    @endif
                                                </a>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name" style="line-height: 20px"><a href="{{ url('/plants') }}/{{ $wishlist->product->slug }}">
                                                            @if(!empty($wishlist->product->other_product_service_name))
                                                                {{ $wishlist->product->other_product_service_name }}@if(!empty($wishlist->product->patent_trademark_names))<br/>{{ $wishlist->product->patent_trademark_names }} @endif</a>
                                                        @else
                                                            {{ $wishlist->product->botanical_name }} <br/> <i>{{ $wishlist->product->common_name }}</i>@if(!empty($wishlist->product->patent_trademark_names))<br/>{{ $wishlist->product->patent_trademark_names }} @endif</a>
                                                            @endif

                                                    </p>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-regular">
                                                        @if(!empty($product_model->getProductPrice($wishlist->product)))
                                                            ${{ $product_model->getProductPrice($wishlist->product) }}
                                                        @endif
                                                    </span>
                                                    <span class="price-old">
                                                        @if(!empty($product_model->getProductListPrice($wishlist->product)))
                                                            <del>${{ $product_model->getProductListPrice($wishlist->product) }}</del>
                                                        @endif
                                                    </span>
                                                </div>

                                                <div class="manufacturer-name details_tag" style="margin-top: 20px;line-height: 30px;">
                                                    @if($wishlist->product->perennial == 'YES')
                                                        <a>Perennial</a>
                                                    @endif
                                                    @if($wishlist->product->shrub == 'YES')
                                                        <a>Shrub</a>
                                                    @endif
                                                    @if($wishlist->product->vine == 'YES')
                                                        <a>Vine</a>
                                                    @endif
                                                    @if($wishlist->product->grass_bamboo == 'YES')
                                                        <a>Grass/Bamboo</a>
                                                    @endif
                                                    @if($wishlist->product->hardy_tropical == 'YES')
                                                        <a>Hardy Tropical</a>
                                                    @endif
                                                    @if($wishlist->product->water_plant == 'YES')
                                                        <a>Water Plant</a>
                                                    @endif
                                                    @if($wishlist->product->annual == 'YES')
                                                        <a>Annual</a>
                                                    @endif
                                                    @if($wishlist->product->house_deck_plant == 'YES')
                                                        <a>House / Deck Plant</a>
                                                    @endif
                                                    @if($wishlist->product->cactus_succulent == 'YES')
                                                        <a>Cactus / Succulent</a>
                                                    @endif
                                                    @if($wishlist->product->small_tree == 'YES')
                                                        <a>Small Tree</a>
                                                    @endif
                                                    @if($wishlist->product->large_tree == 'YES')
                                                        <a>Large Tree</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
