@extends('layouts.app')
@section('custom_styles');
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
    </style>
@endsection
@section('content')
@inject('product_model', 'App\Models\Product')
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
                            <form action="" method="get">
                                @csrf
                            <aside class="sidebar-wrapper">
                                <div class="sidebar-single">
                                    <h5 class="sidebar-title open">SORT<i></i></h5>
                                    <div class="sidebar-body">
                                        <ul class="shop-categories">
                                            <li><a href="{{ url("/products") }}">ALL PLANTS FOR SALE</a></li>
                                            <li><a href="{{ url("/products?category=perennial") }}">BEST SELLERS</a></li>
                                            <li><a href="{{ url("/products?category=shrub") }}">NEW FOR THIS YEAR</a></li>
                                            <li><a href="{{ url("/products?category=vine") }}">ALL PLANTS IN LIBRARY</a></li>
                                            <li><a href="{{ url("/products?category=grass_bamboo") }}">RETIRED PLANTS</a></li>
                                            <li><a href="{{ url("/products?category=hardy_tropical") }}">OTHER PRODUCTS</a></li>
                                        </ul>
                                    </div>
                                </div>

                                {{--{{ dd(old('PLANTTYPE[]')) }}--}}

                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">PLANT TYPE<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckPerennial" name="PLANTTYPE[]" value="perennial" {{ (is_array(old('PLANTTYPE[]')) && in_array('perennial', old('PLANTTYPE[]'))) ? ' checked' : '' }} >
                                                    <label class="custom-control-label" for="customCheckPerennial" style="text-transform: uppercase">Perennial</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckShrub" name="PLANTTYPE[]" value="shrub">
                                                    <label class="custom-control-label" for="customCheckShrub" style="text-transform: uppercase">Shrub</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckVine" name="PLANTTYPE[]" value="vine">
                                                    <label class="custom-control-label" for="customCheckVine" style="text-transform: uppercase">Vine</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckgrassBamboo" name="PLANTTYPE[]" value="grass_bamboo">
                                                    <label class="custom-control-label" for="customCheckgrassBamboo" style="text-transform: uppercase">Grass Bamboo</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckHardyTropical" name="PLANTTYPE[]" value="hardy_tropical">
                                                    <label class="custom-control-label" for="customCheckHardyTropical" style="text-transform: uppercase">Hardy Tropical</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckWaterPlant" name="PLANTTYPE[]" value="water_plant">
                                                    <label class="custom-control-label" for="customCheckWaterPlant" style="text-transform: uppercase">Water Plant</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckAnnual" name="PLANTTYPE[]" value="annual">
                                                    <label class="custom-control-label" for="customCheckAnnual" style="text-transform: uppercase">Annual</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckHouseDeckPlant" name="PLANTTYPE[]" value="house_deck_plant">
                                                    <label class="custom-control-label" for="customCheckHouseDeckPlant" style="text-transform: uppercase">House Deck Plant</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckCactusSucculent" name="PLANTTYPE[]" value="cactus_succulent">
                                                    <label class="custom-control-label" for="customCheckCactusSucculent" style="text-transform: uppercase">Cactus Succulent</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckSmallTree" name="PLANTTYPE[]" value="small_tree">
                                                    <label class="custom-control-label" for="customCheckSmallTree" style="text-transform: uppercase">Small Tree</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckLargeTree" name="PLANTTYPE[]" value="large_tree">
                                                    <label class="custom-control-label" for="customCheckLargeTree" style="text-transform: uppercase">Large Tree</label>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">GARDEN CATEGORIES<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckSUSTAINABLEGARDEN"  name="GARDENCATEGORIES[]" value="sustainable_garden">
                                                    <label class="custom-control-label" for="customCheckSUSTAINABLEGARDEN">SUSTAINABLE GARDEN</label>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckNATIVEPLANTGARDEN" name="GARDENCATEGORIES[]" value="native_plant_garden">
                                                    <label class="custom-control-label" for="customCheckNATIVEPLANTGARDEN">NATIVE PLANT GARDEN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBIRDWILDLIFEGARDEN" name="GARDENCATEGORIES[]" value="bird_wildlife_garden">
                                                    <label class="custom-control-label" for="customCheckBIRDWILDLIFEGARDEN">BIRD & WILDLIFE GARDEN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckBUTTERFLYBEEGARDEN" name="GARDENCATEGORIES[]" value="butterfly_bee_garden">
                                                    <label class="custom-control-label" for="customCheckBUTTERFLYBEEGARDEN">BUTTERFLY & BEE GARDEN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckLUSHTROPICALGARDEN" name="GARDENCATEGORIES[]" value="lush_tropical_garden">
                                                    <label class="custom-control-label" for="customCheckLUSHTROPICALGARDEN">LUSH TROPICAL GARDEN</label>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckDRYSHADEGARDEN" name="GARDENCATEGORIES[]" value="dry_shade_garden">
                                                    <label class="custom-control-label" for="customCheckDRYSHADEGARDEN">DRY SHADE GARDEN</label>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckEDIBLEMEDICINALGARDEN" name="GARDENCATEGORIES[]" value="edible_medicinal_garden">
                                                    <label class="custom-control-label" for="customCheckEDIBLEMEDICINALGARDEN">EDIBLE & MEDICINAL GARDEN</label>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckRAINGARDEN" name="GARDENCATEGORIES[]" value="rain_garden">
                                                    <label class="custom-control-label" for="customCheckRAINGARDEN">RAIN GARDEN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckCOLORADORUSTICGARDEN" name="GARDENCATEGORIES[]" value="colorado_rustic_garden">
                                                    <label class="custom-control-label" for="customCheckCOLORADORUSTICGARDEN">COLORADO & RUSTIC GARDEN</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheckDESERTCACTUSROCKGARDEN" name="GARDENCATEGORIES[]" value="desert_cactus_rock_garden">
                                                    <label class="custom-control-label" for="customCheckDESERTCACTUSROCKGARDEN">DESERT, CACTUS,& ROCK GARDEN</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">PLANT ZONE<i></i></h5>
                                    <div class="sidebar-body" style="display: none;padding-bottom: 30px">

                                            <div style="width: 48%;float: left" id="min_sel">
                                                <select class="nice-select" name="min_zone">
                                                    <option value="">-- Min Zone --</option>
                                                    @foreach($zoneArray as $key=>$val)
                                                        <option @if(app('request')->input('min_zone') == $key) selected @endif value="{{ $key }}">{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div style="width: 48%;float: right" id="min_sel">
                                                <select class="nice-select small_sel" name="max_zone">
                                                    <option value="">-- Max Zone --</option>
                                                    @foreach($zoneArray as $key=>$val)
                                                        <option @if(app('request')->input('max_zone') == $key) selected @endif value="{{ $key }}">{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                    </div>
                                </div>



                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">CULTURAL CONDITIONS<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            @if(count($sunlight_arr)>0)
                                            <li>
                                                <div class="custom-control custom-checkbox second_custom_control">
                                                    <div class="sidebar-single">
                                                        <p class="sidebar-title second_sidebar">SUNLIGHT<i></i></p>
                                                        <div class="sidebar-body" style="display: none">
                                                            <ul class="checkbox-container categories-list">
                                                                @foreach($sunlight_arr as $sunlight_ar)
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="s{{ $sunlight_ar }}" name="sunlight[]" value="{{ $sunlight_ar }}">
                                                                            <label class="custom-control-label" for="s{{ $sunlight_ar }}">{{ $sunlight_ar }}</label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif

                                            @if(count($water_rainfall_arr)>0)
                                            <li>
                                                <div class="custom-control custom-checkbox second_custom_control">
                                                    <div class="sidebar-single">
                                                        <p class="sidebar-title second_sidebar">WATER/RAINFALL<i></i></p>
                                                        <div class="sidebar-body" style="display: none">
                                                            <ul class="checkbox-container categories-list">
                                                                @foreach($water_rainfall_arr as $water_rainfall_ar)
                                                                <li>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="wr{{ $water_rainfall_ar }}" name="water_rainfall[]" value="{{ $water_rainfall_ar }}">
                                                                        <label class="custom-control-label" for="wr{{ $water_rainfall_ar }}">{{ $water_rainfall_ar }}</label>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif

                                            @if(count($soil_quality_arr)>0)
                                            <li>
                                                <div class="custom-control custom-checkbox second_custom_control">
                                                    <div class="sidebar-single">
                                                        <p class="sidebar-title second_sidebar">SOIL QUALITY<i></i></p>
                                                        <div class="sidebar-body" style="display: none">
                                                            <ul class="checkbox-container categories-list">
                                                                @foreach($soil_quality_arr as $soil_quality_ar)
                                                                <li>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="sq{{ $soil_quality_ar }}" name="soil_quality[]" value="{{ $soil_quality_ar }}">
                                                                        <label class="custom-control-label" for="sq{{ $soil_quality_ar }}">{{ $soil_quality_ar }}</label>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>


                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">FLOWERS AND FOLIAGE<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            @if(count($bloom_season_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">BLOOM SEASON<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($bloom_season_arr as $bloom_season_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="bs{{ $bloom_season_ar }}" name="bloom_season[]" value="{{ $bloom_season_ar }}">
                                                                                <label class="custom-control-label" for="bs{{ $bloom_season_ar }}">{{ $bloom_season_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($flower_color_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">FLOWER COLOR<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($flower_color_arr as $flower_color_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="fc{{ $flower_color_ar }}" name="flower_color[]" value="{{ $flower_color_ar }}">
                                                                                <label class="custom-control-label" for="fc{{ $flower_color_ar }}">{{ $flower_color_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($berry_fruit_color_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">BERRY FRUIT COLOR<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($berry_fruit_color_arr as $berry_fruit_color_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="bfc{{ $berry_fruit_color_ar }}" name="berry_fruit_color[]" value="{{ $berry_fruit_color_ar }}">
                                                                                <label class="custom-control-label" for="bfc{{ $berry_fruit_color_ar }}">{{ $berry_fruit_color_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($spring_foliage_color_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SPRING FOLIAGE COLOR<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($spring_foliage_color_arr as $spring_foliage_color_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="sfc{{ $spring_foliage_color_ar }}" name="spring_foliage_color[]" value="{{ $spring_foliage_color_ar }}">
                                                                                <label class="custom-control-label" for="sfc{{ $spring_foliage_color_ar }}">{{ $spring_foliage_color_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($summer_foliage_color_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SUMMER FOLIAGE COLOR<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($summer_foliage_color_arr as $summer_foliage_color_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="sufc{{ $summer_foliage_color_ar }}" name="summer_foliage_color[]" value="{{ $summer_foliage_color_ar }}">
                                                                                <label class="custom-control-label" for="sufc{{ $summer_foliage_color_ar }}">{{ $summer_foliage_color_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($fall_foliage_color_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">FALL FOLIAGE COLOR<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($fall_foliage_color_arr as $fall_foliage_color_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="bfca{{ $fall_foliage_color_ar }}" name="fall_foliage_color[]" value="{{ $fall_foliage_color_ar }}">
                                                                                <label class="custom-control-label" for="bfca{{ $fall_foliage_color_ar }}">{{ $fall_foliage_color_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($has_evergreen_foliage_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">EVERGREEN FOLIAGE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($has_evergreen_foliage_arr as $has_evergreen_foliage_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="ef{{ $has_evergreen_foliage_ar }}" name="has_evergreen_foliage[]" value="{{ $has_evergreen_foliage_ar }}">
                                                                                <label class="custom-control-label" for="ef{{ $has_evergreen_foliage_ar }}">{{ $has_evergreen_foliage_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif



                                            @if(count($has_winter_interest_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">WINTER INTEREST<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($has_winter_interest_arr as $has_winter_interest_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="wi{{ $has_winter_interest_ar }}" name="has_winter_interest[]" value="{{ $has_winter_interest_ar }}">
                                                                                <label class="custom-control-label" for="wi{{ $has_winter_interest_ar }}">{{ $has_winter_interest_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($scented_flowers_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SCENTED FLOWERS<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($scented_flowers_arr as $scented_flowers_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="sfa{{ $scented_flowers_ar }}" name="scented_flowers[]" value="{{ $scented_flowers_ar }}">
                                                                                <label class="custom-control-label" for="sfa{{ $scented_flowers_ar }}">{{ $scented_flowers_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>


                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">PLANT TOLERANCES<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            @if(count($drought_tolerance_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">DROUGHT TOLERANCE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($drought_tolerance_arr as $drought_tolerance_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="dt{{ $drought_tolerance_ar }}" name="drought_tolerance[]" value="{{ $drought_tolerance_ar }}">
                                                                                <label class="custom-control-label" for="dt{{ $drought_tolerance_ar }}">{{ $drought_tolerance_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($wet_feet_tolerance_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">WET FEET TOLERANCE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($wet_feet_tolerance_arr as $wet_feet_tolerance_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="wft{{ $wet_feet_tolerance_ar }}" name="wet_feet_tolerance[]" value="{{ $wet_feet_tolerance_ar }}">
                                                                                <label class="custom-control-label" for="wft{{ $wet_feet_tolerance_ar }}">{{ $wet_feet_tolerance_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($humidity_tolerance_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">HUMIDITY TOLERANCE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($humidity_tolerance_arr as $humidity_tolerance_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="ht{{ $humidity_tolerance_ar }}" name="humidity_tolerance[]" value="{{  $humidity_tolerance_ar }}">
                                                                                <label class="custom-control-label" for="ht{{  $humidity_tolerance_ar }}">{{  $humidity_tolerance_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($wind_tolerence_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">WIND TOLERANCE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($wind_tolerence_arr as $wind_tolerence_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="wt{{ $wind_tolerence_ar }}" name="wind_tolerence[]" value="{{  $wind_tolerence_ar }}">
                                                                                <label class="custom-control-label" for="wt{{  $wind_tolerence_ar }}">{{  $wind_tolerence_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif



                                            @if(count($poor_soil_tolerance_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">POOR SOIL TOLERANCE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($poor_soil_tolerance_arr as $poor_soil_tolerance_ar)
                                                                        @if(!empty($poor_soil_tolerance_ar))
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="pst{{ $poor_soil_tolerance_ar }}" name="poor_soil_tolerance[]" value="{{  $poor_soil_tolerance_ar }}">
                                                                                <label class="custom-control-label" for="pst{{  $poor_soil_tolerance_ar }}">{{  $poor_soil_tolerance_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>



                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">GROWTH AND MAINTENANCE<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            @if(count($growth_rate_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">GROWTH RATE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($growth_rate_arr as $growth_rate_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="gr{{ $growth_rate_ar }}" name="growth_rate[]" value="{{ $growth_rate_ar }}">
                                                                                <label class="custom-control-label" for="gr{{ $growth_rate_ar }}">{{ $growth_rate_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($service_life_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SERVICE LIFE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($service_life_arr as $service_life_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="sl{{ $service_life_ar }}" name="service_life[]" value="{{ $service_life_ar }}">
                                                                                <label class="custom-control-label" for="sl{{ $service_life_ar }}">{{ $service_life_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($maintenance_requirements_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">MAINTENANCE NEEDS <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($maintenance_requirements_arr as $maintenance_requirements_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="mr{{ $maintenance_requirements_ar }}" name="maintenance_requirements[]" value="{{ $maintenance_requirements_ar }}">
                                                                                <label class="custom-control-label" for="mr{{ $maintenance_requirements_ar }}">{{ $maintenance_requirements_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($spreading_potential_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SPREADING POTENTIAL <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($spreading_potential_arr as $spreading_potential_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="sp{{ $spreading_potential_ar }}" name="spreading_potential[]" value="{{ $spreading_potential_ar }}">
                                                                                <label class="custom-control-label" for="sp{{ $spreading_potential_ar }}">{{ $spreading_potential_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($yearly_trimming_tips_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">YEARLY TRIMMING TIPS <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($yearly_trimming_tips_arr as $yearly_trimming_tips_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="ytt{{ $yearly_trimming_tips_ar }}" name="yearly_trimming_tips[]" value="{{ $yearly_trimming_tips_ar }}">
                                                                                <label class="custom-control-label" for="ytt{{ $yearly_trimming_tips_ar }}">{{ $yearly_trimming_tips_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-single">
                                    <h5 class="sidebar-title">PLANT USES AND LIMITATIONS<i></i></h5>
                                    <div class="sidebar-body" style="display: none">
                                        <ul class="checkbox-container categories-list">
                                            @if(count($plant_grouping_size_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">PLANT GROUPING SIZE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($plant_grouping_size_arr as $plant_grouping_size_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="pgs{{ $plant_grouping_size_ar }}" name="plant_grouping_size[]" value="{{ $plant_grouping_size_ar }}">
                                                                                <label class="custom-control-label" for="pgs{{ $plant_grouping_size_ar }}">{{ $plant_grouping_size_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($best_side_of_house_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">BEST SIDE OF HOUSE<i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($best_side_of_house_arr as $best_side_of_house_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="bsoh{{ $best_side_of_house_ar }}" name="best_side_of_house[]" value="{{ $best_side_of_house_ar }}">
                                                                                <label class="custom-control-label" for="bsoh{{ $best_side_of_house_ar }}">{{ $best_side_of_house_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                            @if(count($extreme_planting_locations_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">EXTREME PLANTING LOCATIONS <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($extreme_planting_locations_arr as $extreme_planting_locations_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="epl{{ $extreme_planting_locations_ar }}" name="extreme_planting_locations[]" value="{{ $extreme_planting_locations_ar }}">
                                                                                <label class="custom-control-label" for="epl{{ $extreme_planting_locations_ar }}">{{ $extreme_planting_locations_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($ornamental_features_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">ORNAMENTAL FEATURES <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($ornamental_features_arr as $ornamental_features_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="of{{ $ornamental_features_ar }}" name="ornamental_features[]" value="{{ $ornamental_features_ar }}">
                                                                                <label class="custom-control-label" for="of{{ $ornamental_features_ar }}">{{ $ornamental_features_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif


                                            @if(count($special_landscape_uses_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">SPECIAL LANDSCAPE USES <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($special_landscape_uses_arr as $special_landscape_uses_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="slu{{ $special_landscape_uses_ar }}" name="special_landscape_uses[]" value="{{ $special_landscape_uses_ar }}">
                                                                                <label class="custom-control-label" for="slu{{ $special_landscape_uses_ar }}">{{ $special_landscape_uses_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif



                                            @if(count($possible_pest_problems_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">POSSIBLE PEST PROBLEMS <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($possible_pest_problems_arr as $possible_pest_problems_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="ppp{{ $possible_pest_problems_ar }}" name="possible_pest_problems[]" value="{{ $possible_pest_problems_ar }}">
                                                                                <label class="custom-control-label" for="ppp{{ $possible_pest_problems_ar }}">{{ $possible_pest_problems_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif



                                            @if(count($plant_limitations_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar">PLANT LIMITATIONS <i></i></p>
                                                            <div class="sidebar-body" style="display: none">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($plant_limitations_arr as $plant_limitations_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="pl{{ $plant_limitations_ar }}" name="plant_limitations[]" value="{{ $plant_limitations_ar }}">
                                                                                <label class="custom-control-label" for="pl{{ $plant_limitations_ar }}">{{ $plant_limitations_ar }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>

                                <!-- single sidebar end -->
                                <div class="sidebar-single">
                                    <input type="submit" name="Submit" value="FILTER" class="btn btn-sqr">
                                </div>
                            </aside>

                            </form>
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

                                    {{--{{ $product_model->getImage($product) }}--}}
                                    <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details/{{ $product->id }}">
                                                    @if(!empty(($product_model->getImage($product))))
                                                    <img class="pri-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                    <img class="sec-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                    @else
                                                        <img class="pri-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                        <img class="sec-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                    @endif
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
                                                            <span class="price-regular">${{ number_format($product->retail_sale_price_a,2) }}</span>
                                                            <span class="price-old"><del>${{ number_format($product->retail_list_price_a,2) }}</del></span>
                                                        @else
                                                            <span class="price-regular">${{ number_format($product->contractor_price_a,2) }}</span>
                                                        @endif
                                                    @else
                                                        <span class="price-regular">${{ number_format($product->retail_sale_price_a,2) }}</span>
                                                        <span class="price-old"><del>${{ number_format($product->retail_list_price_a,2) }}</del></span>
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
<!--                                                <img class="pri-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">
                                                <img class="sec-img" src="{{ asset('plants_images/'.$product->image) }}" alt="product">-->
                                                @if(!empty(($product_model->getImage($product))))
                                                    <img class="pri-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                    <img class="sec-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                @else
                                                    <img class="pri-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                    <img class="sec-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                @endif
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
                                                        <span class="price-regular">${{ number_format($product->retail_sale_price_a,2) }}</span>
                                                        <span class="price-old"><del>${{ number_format($product->retail_list_price_a,2) }}</del></span>
                                                    @else
                                                        <span class="price-regular">${{ number_format($product->contractor_price_a,2) }}</span>
                                                    @endif
                                                @else
                                                    <span class="price-regular">${{ number_format($product->retail_sale_price_a,2) }}</span>
                                                    <span class="price-old"><del>${{ number_format($product->retail_list_price_a,2) }}</del></span>
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
                                                {{ $product->description }}
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
    height: 100%;background-color: rgba(0, 0, 0, 0.90);z-index: 1000;padding-top: 0px;padding-bottom: 70px;display: none;overflow: auto;">
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
            <form action="" method="get">
                @csrf
                <aside class="sidebar-wrapper">
                <!-- single sidebar start -->
                <div class="sidebar-single">
                    <h5 class="sidebar-title open">SORT<i></i></h5>
                    <div class="sidebar-body">
                        <ul class="shop-categories">
                            <li><a href="{{ url("/products") }}">ALL PLANTS FOR SALE</a></li>
                            <li><a href="{{ url("/products?category=perennial") }}">BEST SELLERS</a></li>
                            <li><a href="{{ url("/products?category=shrub") }}">NEW FOR THIS YEAR</a></li>
                            <li><a href="{{ url("/products?category=vine") }}">ALL PLANTS IN LIBRARY</a></li>
                            <li><a href="{{ url("/products?category=grass_bamboo") }}">RETIRED PLANTS</a></li>
                            <li><a href="{{ url("/products?category=hardy_tropical") }}">OTHER PRODUCTS</a></li>
                        </ul>
                    </div>
                </div>


                <div class="sidebar-single">
                    <h5 class="sidebar-title">PLANT TYPE<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckPerennial" name="PLANTTYPE[]" value="perennial" {{ (is_array(old('PLANTTYPE[]')) && in_array('perennial', old('PLANTTYPE[]'))) ? ' checked' : '' }} >
                                    <label class="custom-control-label" for="customCheckPerennial" style="text-transform: uppercase">Perennial</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckShrub" name="PLANTTYPE[]" value="shrub">
                                    <label class="custom-control-label" for="customCheckShrub" style="text-transform: uppercase">Shrub</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckVine" name="PLANTTYPE[]" value="vine">
                                    <label class="custom-control-label" for="customCheckVine" style="text-transform: uppercase">Vine</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckgrassBamboo" name="PLANTTYPE[]" value="grass_bamboo">
                                    <label class="custom-control-label" for="customCheckgrassBamboo" style="text-transform: uppercase">Grass Bamboo</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckHardyTropical" name="PLANTTYPE[]" value="hardy_tropical">
                                    <label class="custom-control-label" for="customCheckHardyTropical" style="text-transform: uppercase">Hardy Tropical</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckWaterPlant" name="PLANTTYPE[]" value="water_plant">
                                    <label class="custom-control-label" for="customCheckWaterPlant" style="text-transform: uppercase">Water Plant</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckAnnual" name="PLANTTYPE[]" value="annual">
                                    <label class="custom-control-label" for="customCheckAnnual" style="text-transform: uppercase">Annual</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckHouseDeckPlant" name="PLANTTYPE[]" value="house_deck_plant">
                                    <label class="custom-control-label" for="customCheckHouseDeckPlant" style="text-transform: uppercase">House Deck Plant</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckCactusSucculent" name="PLANTTYPE[]" value="cactus_succulent">
                                    <label class="custom-control-label" for="customCheckCactusSucculent" style="text-transform: uppercase">Cactus Succulent</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckSmallTree" name="PLANTTYPE[]" value="small_tree">
                                    <label class="custom-control-label" for="customCheckSmallTree" style="text-transform: uppercase">Small Tree</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckLargeTree" name="PLANTTYPE[]" value="large_tree">
                                    <label class="custom-control-label" for="customCheckLargeTree" style="text-transform: uppercase">Large Tree</label>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="sidebar-single">
                    <h5 class="sidebar-title">GARDEN CATEGORIES<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckSUSTAINABLEGARDEN"  name="GARDENCATEGORIES[]" value="sustainable_garden">
                                    <label class="custom-control-label" for="customCheckSUSTAINABLEGARDEN">SUSTAINABLE GARDEN</label>
                                </div>
                            </li>
                            <li>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckNATIVEPLANTGARDEN" name="GARDENCATEGORIES[]" value="native_plant_garden">
                                    <label class="custom-control-label" for="customCheckNATIVEPLANTGARDEN">NATIVE PLANT GARDEN</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBIRDWILDLIFEGARDEN" name="GARDENCATEGORIES[]" value="bird_wildlife_garden">
                                    <label class="custom-control-label" for="customCheckBIRDWILDLIFEGARDEN">BIRD & WILDLIFE GARDEN</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBUTTERFLYBEEGARDEN" name="GARDENCATEGORIES[]" value="butterfly_bee_garden">
                                    <label class="custom-control-label" for="customCheckBUTTERFLYBEEGARDEN">BUTTERFLY & BEE GARDEN</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckLUSHTROPICALGARDEN" name="GARDENCATEGORIES[]" value="lush_tropical_garden">
                                    <label class="custom-control-label" for="customCheckLUSHTROPICALGARDEN">LUSH TROPICAL GARDEN</label>
                                </div>
                            </li>
                            <li>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckDRYSHADEGARDEN" name="GARDENCATEGORIES[]" value="dry_shade_garden">
                                    <label class="custom-control-label" for="customCheckDRYSHADEGARDEN">DRY SHADE GARDEN</label>
                                </div>
                            </li>
                            <li>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckEDIBLEMEDICINALGARDEN" name="GARDENCATEGORIES[]" value="edible_medicinal_garden">
                                    <label class="custom-control-label" for="customCheckEDIBLEMEDICINALGARDEN">EDIBLE & MEDICINAL GARDEN</label>
                                </div>
                            </li>

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckRAINGARDEN" name="GARDENCATEGORIES[]" value="rain_garden">
                                    <label class="custom-control-label" for="customCheckRAINGARDEN">RAIN GARDEN</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckCOLORADORUSTICGARDEN" name="GARDENCATEGORIES[]" value="colorado_rustic_garden">
                                    <label class="custom-control-label" for="customCheckCOLORADORUSTICGARDEN">COLORADO & RUSTIC GARDEN</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheckDESERTCACTUSROCKGARDEN" name="GARDENCATEGORIES[]" value="desert_cactus_rock_garden">
                                    <label class="custom-control-label" for="customCheckDESERTCACTUSROCKGARDEN">DESERT, CACTUS,& ROCK GARDEN</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="sidebar-single">
                    <h5 class="sidebar-title">PLANT ZONE<i></i></h5>
                    <div class="sidebar-body" style="display: none;padding-bottom: 30px">

                        <div style="width: 48%;float: left" id="min_sel">
                            <select class="nice-select" name="min_zone">
                                <option value="">-- Min Zone --</option>
                                @foreach($zoneArray as $key=>$val)
                                    <option @if(app('request')->input('min_zone') == $key) selected @endif value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="width: 48%;float: right" id="min_sel">
                            <select class="nice-select small_sel" name="max_zone">
                                <option value="">-- Max Zone --</option>
                                @foreach($zoneArray as $key=>$val)
                                    <option @if(app('request')->input('max_zone') == $key) selected @endif value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>



                <div class="sidebar-single">
                    <h5 class="sidebar-title">CULTURAL CONDITIONS<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            @if(count($sunlight_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SUNLIGHT<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($sunlight_arr as $sunlight_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="s{{ $sunlight_ar }}" name="sunlight[]" value="{{ $sunlight_ar }}">
                                                                <label class="custom-control-label" for="s{{ $sunlight_ar }}">{{ $sunlight_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($water_rainfall_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">WATER/RAINFALL<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($water_rainfall_arr as $water_rainfall_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="wr{{ $water_rainfall_ar }}" name="water_rainfall[]" value="{{ $water_rainfall_ar }}">
                                                                <label class="custom-control-label" for="wr{{ $water_rainfall_ar }}">{{ $water_rainfall_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($soil_quality_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SOIL QUALITY<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($soil_quality_arr as $soil_quality_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sq{{ $soil_quality_ar }}" name="soil_quality[]" value="{{ $soil_quality_ar }}">
                                                                <label class="custom-control-label" for="sq{{ $soil_quality_ar }}">{{ $soil_quality_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>


                <div class="sidebar-single">
                    <h5 class="sidebar-title">FLOWERS AND FOLIAGE<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            @if(count($bloom_season_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">BLOOM SEASON<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($bloom_season_arr as $bloom_season_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="bs{{ $bloom_season_ar }}" name="bloom_season[]" value="{{ $bloom_season_ar }}">
                                                                <label class="custom-control-label" for="bs{{ $bloom_season_ar }}">{{ $bloom_season_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($flower_color_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">FLOWER COLOR<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($flower_color_arr as $flower_color_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="fc{{ $flower_color_ar }}" name="flower_color[]" value="{{ $flower_color_ar }}">
                                                                <label class="custom-control-label" for="fc{{ $flower_color_ar }}">{{ $flower_color_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($berry_fruit_color_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">BERRY FRUIT COLOR<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($berry_fruit_color_arr as $berry_fruit_color_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="bfc{{ $berry_fruit_color_ar }}" name="berry_fruit_color[]" value="{{ $berry_fruit_color_ar }}">
                                                                <label class="custom-control-label" for="bfc{{ $berry_fruit_color_ar }}">{{ $berry_fruit_color_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($spring_foliage_color_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SPRING FOLIAGE COLOR<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($spring_foliage_color_arr as $spring_foliage_color_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sfc{{ $spring_foliage_color_ar }}" name="spring_foliage_color[]" value="{{ $spring_foliage_color_ar }}">
                                                                <label class="custom-control-label" for="sfc{{ $spring_foliage_color_ar }}">{{ $spring_foliage_color_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($summer_foliage_color_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SUMMER FOLIAGE COLOR<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($summer_foliage_color_arr as $summer_foliage_color_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sufc{{ $summer_foliage_color_ar }}" name="summer_foliage_color[]" value="{{ $summer_foliage_color_ar }}">
                                                                <label class="custom-control-label" for="sufc{{ $summer_foliage_color_ar }}">{{ $summer_foliage_color_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($fall_foliage_color_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">FALL FOLIAGE COLOR<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($fall_foliage_color_arr as $fall_foliage_color_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="bfca{{ $fall_foliage_color_ar }}" name="fall_foliage_color[]" value="{{ $fall_foliage_color_ar }}">
                                                                <label class="custom-control-label" for="bfca{{ $fall_foliage_color_ar }}">{{ $fall_foliage_color_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($has_evergreen_foliage_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">EVERGREEN FOLIAGE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($has_evergreen_foliage_arr as $has_evergreen_foliage_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="ef{{ $has_evergreen_foliage_ar }}" name="has_evergreen_foliage[]" value="{{ $has_evergreen_foliage_ar }}">
                                                                <label class="custom-control-label" for="ef{{ $has_evergreen_foliage_ar }}">{{ $has_evergreen_foliage_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif



                            @if(count($has_winter_interest_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">WINTER INTEREST<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($has_winter_interest_arr as $has_winter_interest_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="wi{{ $has_winter_interest_ar }}" name="has_winter_interest[]" value="{{ $has_winter_interest_ar }}">
                                                                <label class="custom-control-label" for="wi{{ $has_winter_interest_ar }}">{{ $has_winter_interest_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($scented_flowers_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SCENTED FLOWERS<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($scented_flowers_arr as $scented_flowers_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sfa{{ $scented_flowers_ar }}" name="scented_flowers[]" value="{{ $scented_flowers_ar }}">
                                                                <label class="custom-control-label" for="sfa{{ $scented_flowers_ar }}">{{ $scented_flowers_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>


                <div class="sidebar-single">
                    <h5 class="sidebar-title">PLANT TOLERANCES<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            @if(count($drought_tolerance_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">DROUGHT TOLERANCE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($drought_tolerance_arr as $drought_tolerance_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="dt{{ $drought_tolerance_ar }}" name="drought_tolerance[]" value="{{ $drought_tolerance_ar }}">
                                                                <label class="custom-control-label" for="dt{{ $drought_tolerance_ar }}">{{ $drought_tolerance_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($wet_feet_tolerance_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">WET FEET TOLERANCE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($wet_feet_tolerance_arr as $wet_feet_tolerance_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="wft{{ $wet_feet_tolerance_ar }}" name="wet_feet_tolerance[]" value="{{ $wet_feet_tolerance_ar }}">
                                                                <label class="custom-control-label" for="wft{{ $wet_feet_tolerance_ar }}">{{ $wet_feet_tolerance_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($humidity_tolerance_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">HUMIDITY TOLERANCE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($humidity_tolerance_arr as $humidity_tolerance_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="ht{{ $humidity_tolerance_ar }}" name="humidity_tolerance[]" value="{{  $humidity_tolerance_ar }}">
                                                                <label class="custom-control-label" for="ht{{  $humidity_tolerance_ar }}">{{  $humidity_tolerance_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($wind_tolerence_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">WIND TOLERANCE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($wind_tolerence_arr as $wind_tolerence_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="wt{{ $wind_tolerence_ar }}" name="wind_tolerence[]" value="{{  $wind_tolerence_ar }}">
                                                                <label class="custom-control-label" for="wt{{  $wind_tolerence_ar }}">{{  $wind_tolerence_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif



                            @if(count($poor_soil_tolerance_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">POOR SOIL TOLERANCE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($poor_soil_tolerance_arr as $poor_soil_tolerance_ar)
                                                        @if(!empty($poor_soil_tolerance_ar))
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="pst{{ $poor_soil_tolerance_ar }}" name="poor_soil_tolerance[]" value="{{  $poor_soil_tolerance_ar }}">
                                                                    <label class="custom-control-label" for="pst{{  $poor_soil_tolerance_ar }}">{{  $poor_soil_tolerance_ar }}</label>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>



                <div class="sidebar-single">
                    <h5 class="sidebar-title">GROWTH AND MAINTENANCE<i></i></h5>
                    <div class="sidebar-body" style="display: none">
                        <ul class="checkbox-container categories-list">
                            @if(count($growth_rate_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">GROWTH RATE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($growth_rate_arr as $growth_rate_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="gr{{ $growth_rate_ar }}" name="growth_rate[]" value="{{ $growth_rate_ar }}">
                                                                <label class="custom-control-label" for="gr{{ $growth_rate_ar }}">{{ $growth_rate_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($service_life_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SERVICE LIFE<i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($service_life_arr as $service_life_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sl{{ $service_life_ar }}" name="service_life[]" value="{{ $service_life_ar }}">
                                                                <label class="custom-control-label" for="sl{{ $service_life_ar }}">{{ $service_life_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(count($maintenance_requirements_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">MAINTENANCE NEEDS <i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($maintenance_requirements_arr as $maintenance_requirements_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="mr{{ $maintenance_requirements_ar }}" name="maintenance_requirements[]" value="{{ $maintenance_requirements_ar }}">
                                                                <label class="custom-control-label" for="mr{{ $maintenance_requirements_ar }}">{{ $maintenance_requirements_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($spreading_potential_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">SPREADING POTENTIAL <i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($spreading_potential_arr as $spreading_potential_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="sp{{ $spreading_potential_ar }}" name="spreading_potential[]" value="{{ $spreading_potential_ar }}">
                                                                <label class="custom-control-label" for="sp{{ $spreading_potential_ar }}">{{ $spreading_potential_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif


                            @if(count($yearly_trimming_tips_arr)>0)
                                <li>
                                    <div class="custom-control custom-checkbox second_custom_control">
                                        <div class="sidebar-single">
                                            <p class="sidebar-title second_sidebar">YEARLY TRIMMING TIPS <i></i></p>
                                            <div class="sidebar-body" style="display: none">
                                                <ul class="checkbox-container categories-list">
                                                    @foreach($yearly_trimming_tips_arr as $yearly_trimming_tips_ar)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="ytt{{ $yearly_trimming_tips_ar }}" name="yearly_trimming_tips[]" value="{{ $yearly_trimming_tips_ar }}">
                                                                <label class="custom-control-label" for="ytt{{ $yearly_trimming_tips_ar }}">{{ $yearly_trimming_tips_ar }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>



                <div class="sidebar-single">
                    <input type="submit" name="Submit" value="FILTER" class="btn btn-sqr">
                </div>
            </aside>
            </form>
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
                jQuery(this).parent().addClass('active').find('.sidebar-body:first').slideToggle('fast');
                //jQuery(".sidebar-body").not(this).parent().removeClass('active').find('.panel-body').slideUp('fast');
            });
        });
    </script>
@endsection
