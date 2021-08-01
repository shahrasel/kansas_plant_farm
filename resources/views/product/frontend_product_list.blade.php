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
        <div class="shop-main-wrapper section-padding" style="padding-top: 40px">
            <div class="container" id="parent_container">
                <div class="row">
                    <!-- sidebar area start -->
                    @if(checkDevice() != 'phone')
                        <div class="col-lg-3 order-2 order-lg-1">
                            <aside class="sidebar-wrapper">
                                <form action="" method="get" id="cat_form">
                                    @csrf
                                    <div class="sidebar-single">
                                        <label style="font-size: 14px;cursor: pointer"><input type="radio" name="search_type" value="partial" checked>&nbsp;PARTIAL MATCH</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size: 14px;cursor: pointer"><input type="radio" name="search_type" value="exact">&nbsp;EXACT MATCH</label>
                                    </div>
                                    <div class="sidebar-single">
                                        <h5 class="sidebar-title open">SORT<i></i></h5>
                                        <div class="sidebar-body" style="margin-bottom:30px;">
                                            <ul class="shop-categories">
                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="" @if(app('request')->input('category') == '') checked @endif onclick="submitForm()">&nbsp;&nbsp;ALL PLANTS FOR SALE</label>
                                                </li>

                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="best-sellers" @if(app('request')->input('category') == 'best-sellers') checked @endif onclick="submitForm()">&nbsp;&nbsp;BEST SELLERS</label>
                                                </li>

                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="new-for-this-year" @if(app('request')->input('category') == 'new-for-this-year') checked @endif onclick="submitForm()">&nbsp;&nbsp;NEW FOR THIS YEAR</label>
                                                </li>

                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="all-in-library" @if(app('request')->input('category') == 'all-in-library') checked @endif onclick="submitForm()">&nbsp;&nbsp;ALL PLANTS IN LIBRARY</label>
                                                </li>

                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="retired-plants" @if(app('request')->input('category') == 'retired-plants') checked @endif onclick="submitForm()">&nbsp;&nbsp;RETIRED PLANTS</label>
                                                </li>

                                                <li>
                                                    <label style="cursor:pointer;"><input type="radio" name="category" value="other-products" @if(app('request')->input('category') == 'other-products') checked @endif onclick="submitForm()">&nbsp;&nbsp;OTHER PRODUCTS</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-single">
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('PLANTTYPE'))) open @endif">PLANT TYPE<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('PLANTTYPE'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckPerennial" name="PLANTTYPE[]" value="perennial" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('perennial', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckPerennial" style="text-transform: uppercase">Perennial</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckShrub" name="PLANTTYPE[]" value="shrub" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('shrub', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckShrub" style="text-transform: uppercase">Shrub</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckVine" name="PLANTTYPE[]" value="vine" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('vine', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckVine" style="text-transform: uppercase">Vine</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckgrassBamboo" name="PLANTTYPE[]" value="grass_bamboo" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('grass_bamboo', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckgrassBamboo" style="text-transform: uppercase">Grass / Bamboo</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckHardyTropical" name="PLANTTYPE[]" value="hardy_tropical" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('hardy_tropical', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckHardyTropical" style="text-transform: uppercase">Hardy Tropical</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckWaterPlant" name="PLANTTYPE[]" value="water_plant" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('water_plant', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckWaterPlant" style="text-transform: uppercase">Water Plant</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckAnnual" name="PLANTTYPE[]" value="annual" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('annual', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckAnnual" style="text-transform: uppercase">Annual</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckHouseDeckPlant" name="PLANTTYPE[]" value="house_deck_plant" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('house_deck_plant', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckHouseDeckPlant" style="text-transform: uppercase">House / Deck Plant</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckCactusSucculent" name="PLANTTYPE[]" value="cactus_succulent" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('cactus_succulent', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckCactusSucculent" style="text-transform: uppercase">Cactus / Succulent</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckSmallTree" name="PLANTTYPE[]" value="small_tree" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('small_tree', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckSmallTree" style="text-transform: uppercase">Small Tree</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckLargeTree" name="PLANTTYPE[]" value="large_tree" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('large_tree', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckLargeTree" style="text-transform: uppercase">Large Tree</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-single">
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('GARDENCATEGORIES'))) open @endif">GARDEN CATEGORIES<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('GARDENCATEGORIES'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckSUSTAINABLEGARDEN"  name="GARDENCATEGORIES[]" value="sustainable_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('sustainable_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckSUSTAINABLEGARDEN">SUSTAINABLE GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckNATIVEPLANTGARDEN" name="GARDENCATEGORIES[]" value="native_plant_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('native_plant_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckNATIVEPLANTGARDEN">NATIVE PLANT GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckBIRDWILDLIFEGARDEN" name="GARDENCATEGORIES[]" value="bird_wildlife_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('bird_wildlife_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckBIRDWILDLIFEGARDEN">BIRD & WILDLIFE GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckBUTTERFLYBEEGARDEN" name="GARDENCATEGORIES[]" value="butterfly_bee_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('butterfly_bee_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckBUTTERFLYBEEGARDEN">BUTTERFLY & BEE GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckLUSHTROPICALGARDEN" name="GARDENCATEGORIES[]" value="lush_tropical_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('lush_tropical_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckLUSHTROPICALGARDEN">LUSH TROPICAL GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckDRYSHADEGARDEN" name="GARDENCATEGORIES[]" value="dry_shade_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('dry_shade_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckDRYSHADEGARDEN">DRY SHADE GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckEDIBLEMEDICINALGARDEN" name="GARDENCATEGORIES[]" value="edible_medicinal_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('edible_medicinal_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckEDIBLEMEDICINALGARDEN">EDIBLE & MEDICINAL GARDEN</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckRAINGARDEN" name="GARDENCATEGORIES[]" value="rain_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('rain_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckRAINGARDEN">RAIN GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckCOLORADORUSTICGARDEN" name="GARDENCATEGORIES[]" value="colorado_rustic_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('colorado_rustic_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckCOLORADORUSTICGARDEN">COLORADO & RUSTIC GARDEN</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckDESERTCACTUSROCKGARDEN" name="GARDENCATEGORIES[]" value="desert_cactus_rock_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('desert_cactus_rock_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                                        <label class="custom-control-label" for="customCheckDESERTCACTUSROCKGARDEN">DESERT, CACTUS, & ROCK GARDEN</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-single">
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('min_zone')) || !empty(app('request')->input('max_zone'))) open @endif">PLANT ZONE<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('min_zone')) || !empty(app('request')->input('max_zone'))) block @else none @endif;padding-bottom: 30px">

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
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('sunlight')) || !empty(app('request')->input('water_rainfall')) || !empty(app('request')->input('soil_quality'))) open @endif">CULTURAL CONDITIONS<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('sunlight')) || !empty(app('request')->input('water_rainfall')) || !empty(app('request')->input('soil_quality'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                @if(count($sunlight_arr)>0)
                                                <li>
                                                    <div class="custom-control custom-checkbox second_custom_control">
                                                        <div class="sidebar-single">
                                                            <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('sunlight'))) open @endif">SUNLIGHT<i></i></p>
                                                            <div class="sidebar-body" style="display: @if(!empty(app('request')->input('sunlight'))) block @else none @endif">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($sunlight_arr as $sunlight_ar)
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="s{{ $sunlight_ar }}" name="sunlight[]" value="{{ $sunlight_ar }}" @if(is_array(app('request')->input('sunlight'))) @if(in_array( $sunlight_ar, app('request')->input('sunlight'))) checked @endif @endif>
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
                                                            <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('water_rainfall'))) open @endif">WATER/RAINFALL<i></i></p>
                                                            <div class="sidebar-body" style="display: @if(!empty(app('request')->input('water_rainfall'))) block @else none @endif">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($water_rainfall_arr as $water_rainfall_ar)
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="wr{{ $water_rainfall_ar }}" name="water_rainfall[]" value="{{ $water_rainfall_ar }}" @if(is_array(app('request')->input('water_rainfall'))) @if(in_array( $water_rainfall_ar, app('request')->input('water_rainfall'))) checked @endif @endif>
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
                                                            <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('soil_quality'))) open @endif">SOIL QUALITY<i></i></p>
                                                            <div class="sidebar-body" style="display: @if(!empty(app('request')->input('soil_quality'))) block @else none @endif">
                                                                <ul class="checkbox-container categories-list">
                                                                    @foreach($soil_quality_arr as $soil_quality_ar)
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="sq{{ $soil_quality_ar }}" name="soil_quality[]" value="{{ $soil_quality_ar }}" @if(is_array(app('request')->input('soil_quality'))) @if(in_array( $soil_quality_ar, app('request')->input('soil_quality'))) checked @endif @endif>
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
                                        <h5 class="sidebar-title  @if(!empty(app('request')->input('bloom_season')) || !empty(app('request')->input('flower_color')) || !empty(app('request')->input('berry_fruit_color')) || !empty(app('request')->input('spring_foliage_color')) || !empty(app('request')->input('summer_foliage_color')) || !empty(app('request')->input('fall_foliage_color')) || !empty(app('request')->input('has_evergreen_foliage')) || !empty(app('request')->input('has_winter_interest')) || !empty(app('request')->input('scented_flowers'))) open @endif">FLOWERS AND FOLIAGE<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('bloom_season')) || !empty(app('request')->input('flower_color')) || !empty(app('request')->input('berry_fruit_color')) || !empty(app('request')->input('spring_foliage_color')) || !empty(app('request')->input('summer_foliage_color')) || !empty(app('request')->input('fall_foliage_color')) || !empty(app('request')->input('has_evergreen_foliage')) || !empty(app('request')->input('has_winter_interest')) || !empty(app('request')->input('scented_flowers'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                @if(count($bloom_season_arr)>0)
                                                    <li>
                                                        <div class="custom-control custom-checkbox second_custom_control">
                                                            <div class="sidebar-single">
                                                                <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('bloom_season'))) open @endif">BLOOM SEASON<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('bloom_season'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($bloom_season_arr as $bloom_season_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="bs{{ $bloom_season_ar }}" name="bloom_season[]" value="{{ $bloom_season_ar }}" @if(is_array(app('request')->input('bloom_season'))) @if(in_array( $bloom_season_ar, app('request')->input('bloom_season'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('flower_color'))) open @endif">FLOWER COLOR<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('flower_color'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($flower_color_arr as $flower_color_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="fc{{ $flower_color_ar }}" name="flower_color[]" value="{{ $flower_color_ar }}" @if(is_array(app('request')->input('flower_color'))) @if(in_array( $flower_color_ar, app('request')->input('flower_color'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('berry_fruit_color'))) open @endif">BERRY FRUIT COLOR<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('berry_fruit_color'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($berry_fruit_color_arr as $berry_fruit_color_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="bfc{{ $berry_fruit_color_ar }}" name="berry_fruit_color[]" value="{{ $berry_fruit_color_ar }}" @if(is_array(app('request')->input('berry_fruit_color'))) @if(in_array( $berry_fruit_color_ar, app('request')->input('berry_fruit_color'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('spring_foliage_color'))) open @endif">SPRING FOLIAGE COLOR<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('spring_foliage_color'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($spring_foliage_color_arr as $spring_foliage_color_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="sfc{{ $spring_foliage_color_ar }}" name="spring_foliage_color[]" value="{{ $spring_foliage_color_ar }}" @if(is_array(app('request')->input('spring_foliage_color'))) @if(in_array( $spring_foliage_color_ar, app('request')->input('spring_foliage_color'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('summer_foliage_color'))) open @endif">SUMMER FOLIAGE COLOR<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('summer_foliage_color'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($summer_foliage_color_arr as $summer_foliage_color_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="sufc{{ $summer_foliage_color_ar }}" name="summer_foliage_color[]" value="{{ $summer_foliage_color_ar }}" @if(is_array(app('request')->input('summer_foliage_color'))) @if(in_array( $summer_foliage_color_ar, app('request')->input('summer_foliage_color'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('fall_foliage_color'))) open @endif">FALL FOLIAGE COLOR<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('fall_foliage_color'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($fall_foliage_color_arr as $fall_foliage_color_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="bfca{{ $fall_foliage_color_ar }}" name="fall_foliage_color[]" value="{{ $fall_foliage_color_ar }}" @if(is_array(app('request')->input('fall_foliage_color'))) @if(in_array( $fall_foliage_color_ar, app('request')->input('fall_foliage_color'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('has_evergreen_foliage'))) open @endif">EVERGREEN FOLIAGE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('has_evergreen_foliage'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($has_evergreen_foliage_arr as $has_evergreen_foliage_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="ef{{ $has_evergreen_foliage_ar }}" name="has_evergreen_foliage[]" value="{{ $has_evergreen_foliage_ar }}" @if(is_array(app('request')->input('has_evergreen_foliage'))) @if(in_array( $has_evergreen_foliage_ar, app('request')->input('has_evergreen_foliage'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('has_winter_interest'))) open @endif">WINTER INTEREST<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('has_winter_interest'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($has_winter_interest_arr as $has_winter_interest_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="wi{{ $has_winter_interest_ar }}" name="has_winter_interest[]" value="{{ $has_winter_interest_ar }}" @if(is_array(app('request')->input('has_winter_interest'))) @if(in_array( $has_winter_interest_ar, app('request')->input('has_winter_interest'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('scented_flowers'))) open @endif">SCENTED FLOWERS<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('scented_flowers'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($scented_flowers_arr as $scented_flowers_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="sfa{{ $scented_flowers_ar }}" name="scented_flowers[]" value="{{ $scented_flowers_ar }}" @if(is_array(app('request')->input('scented_flowers'))) @if(in_array( $scented_flowers_ar, app('request')->input('scented_flowers'))) checked @endif @endif>
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
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('drought_tolerance')) || !empty(app('request')->input('wet_feet_tolerance')) || !empty(app('request')->input('humidity_tolerance')) || !empty(app('request')->input('wind_tolerence')) || !empty(app('request')->input('poor_soil_tolerance'))) open @endif">PLANT TOLERANCES<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('drought_tolerance')) || !empty(app('request')->input('wet_feet_tolerance')) || !empty(app('request')->input('humidity_tolerance')) || !empty(app('request')->input('wind_tolerence')) || !empty(app('request')->input('poor_soil_tolerance'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                @if(count($drought_tolerance_arr)>0)
                                                    <li>
                                                        <div class="custom-control custom-checkbox second_custom_control">
                                                            <div class="sidebar-single">
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('drought_tolerance'))) open @endif">DROUGHT TOLERANCE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('drought_tolerance'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($drought_tolerance_arr as $drought_tolerance_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="dt{{ $drought_tolerance_ar }}" name="drought_tolerance[]" value="{{ $drought_tolerance_ar }}" @if(is_array(app('request')->input('drought_tolerance'))) @if(in_array( $drought_tolerance_ar, app('request')->input('drought_tolerance'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('wet_feet_tolerance'))) open @endif">WET FEET TOLERANCE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('wet_feet_tolerance'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($wet_feet_tolerance_arr as $wet_feet_tolerance_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="wft{{ $wet_feet_tolerance_ar }}" name="wet_feet_tolerance[]" value="{{ $wet_feet_tolerance_ar }}" @if(is_array(app('request')->input('wet_feet_tolerance'))) @if(in_array( $wet_feet_tolerance_ar, app('request')->input('wet_feet_tolerance'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('humidity_tolerance'))) open @endif">HUMIDITY TOLERANCE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('humidity_tolerance'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($humidity_tolerance_arr as $humidity_tolerance_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="ht{{ $humidity_tolerance_ar }}" name="humidity_tolerance[]" value="{{  $humidity_tolerance_ar }}" @if(is_array(app('request')->input('humidity_tolerance'))) @if(in_array( $humidity_tolerance_ar, app('request')->input('humidity_tolerance'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('wind_tolerence'))) open @endif">WIND TOLERANCE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('wind_tolerence'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($wind_tolerence_arr as $wind_tolerence_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="wt{{ $wind_tolerence_ar }}" name="wind_tolerence[]" value="{{  $wind_tolerence_ar }}" @if(is_array(app('request')->input('wind_tolerence'))) @if(in_array( $wind_tolerence_ar, app('request')->input('wind_tolerence'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('poor_soil_tolerance'))) open @endif">POOR SOIL TOLERANCE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('poor_soil_tolerance'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($poor_soil_tolerance_arr as $poor_soil_tolerance_ar)
                                                                            @if(!empty($poor_soil_tolerance_ar))
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="pst{{ $poor_soil_tolerance_ar }}" name="poor_soil_tolerance[]" value="{{  $poor_soil_tolerance_ar }}" @if(is_array(app('request')->input('poor_soil_tolerance'))) @if(in_array( $poor_soil_tolerance_ar, app('request')->input('poor_soil_tolerance'))) checked @endif @endif>
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
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('growth_rate')) || !empty(app('request')->input('service_life')) || !empty(app('request')->input('maintenance_requirements')) || !empty(app('request')->input('spreading_potential')) || !empty(app('request')->input('yearly_trimming_tips'))) open @endif">GROWTH AND MAINTENANCE<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('growth_rate')) || !empty(app('request')->input('service_life')) || !empty(app('request')->input('maintenance_requirements')) || !empty(app('request')->input('spreading_potential')) || !empty(app('request')->input('yearly_trimming_tips'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                @if(count($growth_rate_arr)>0)
                                                    <li>
                                                        <div class="custom-control custom-checkbox second_custom_control">
                                                            <div class="sidebar-single">
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('growth_rate'))) open @endif">GROWTH RATE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('growth_rate'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($growth_rate_arr as $growth_rate_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="gr{{ $growth_rate_ar }}" name="growth_rate[]" value="{{ $growth_rate_ar }}" @if(is_array(app('request')->input('growth_rate'))) @if(in_array( $growth_rate_ar, app('request')->input('growth_rate'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('service_life'))) open @endif">SERVICE LIFE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('service_life'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($service_life_arr as $service_life_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="sl{{ $service_life_ar }}" name="service_life[]" value="{{ $service_life_ar }}" @if(is_array(app('request')->input('service_life'))) @if(in_array( $service_life_ar, app('request')->input('service_life'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('maintenance_requirements'))) open @endif">MAINTENANCE NEEDS <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('maintenance_requirements'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($maintenance_requirements_arr as $maintenance_requirements_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="mr{{ $maintenance_requirements_ar }}" name="maintenance_requirements[]" value="{{ $maintenance_requirements_ar }}" @if(is_array(app('request')->input('maintenance_requirements'))) @if(in_array( $maintenance_requirements_ar, app('request')->input('maintenance_requirements'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('spreading_potential'))) open @endif">SPREADING POTENTIAL <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('spreading_potential'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($spreading_potential_arr as $spreading_potential_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="sp{{ $spreading_potential_ar }}" name="spreading_potential[]" value="{{ $spreading_potential_ar }}" @if(is_array(app('request')->input('spreading_potential'))) @if(in_array( $spreading_potential_ar, app('request')->input('spreading_potential'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('yearly_trimming_tips'))) open @endif">YEARLY TRIMMING TIPS <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('yearly_trimming_tips'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($yearly_trimming_tips_arr as $yearly_trimming_tips_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="ytt{{ $yearly_trimming_tips_ar }}" name="yearly_trimming_tips[]" value="{{ $yearly_trimming_tips_ar }}" @if(is_array(app('request')->input('yearly_trimming_tips'))) @if(in_array( $yearly_trimming_tips_ar, app('request')->input('yearly_trimming_tips'))) checked @endif @endif>
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
                                        <h5 class="sidebar-title @if(!empty(app('request')->input('plant_grouping_size')) || !empty(app('request')->input('best_side_of_house')) || !empty(app('request')->input('extreme_planting_locations')) || !empty(app('request')->input('ornamental_features')) || !empty(app('request')->input('special_landscape_uses')) || !empty(app('request')->input('possible_pest_problems')) || !empty(app('request')->input('plant_limitations'))) open @endif">PLANT USES AND LIMITATIONS<i></i></h5>
                                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_grouping_size')) || !empty(app('request')->input('best_side_of_house')) || !empty(app('request')->input('extreme_planting_locations')) || !empty(app('request')->input('ornamental_features')) || !empty(app('request')->input('special_landscape_uses')) || !empty(app('request')->input('possible_pest_problems')) || !empty(app('request')->input('plant_limitations'))) block @else none @endif">
                                            <ul class="checkbox-container categories-list">
                                                @if(count($plant_grouping_size_arr)>0)
                                                    <li>
                                                        <div class="custom-control custom-checkbox second_custom_control">
                                                            <div class="sidebar-single">
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('plant_grouping_size'))) open @endif">PLANT GROUPING SIZE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_grouping_size'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($plant_grouping_size_arr as $plant_grouping_size_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="pgs{{ $plant_grouping_size_ar }}" name="plant_grouping_size[]" value="{{ $plant_grouping_size_ar }}" @if(is_array(app('request')->input('plant_grouping_size'))) @if(in_array( $plant_grouping_size_ar, app('request')->input('plant_grouping_size'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('best_side_of_house'))) open @endif">BEST SIDE OF HOUSE<i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('best_side_of_house'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($best_side_of_house_arr as $best_side_of_house_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="bsoh{{ $best_side_of_house_ar }}" name="best_side_of_house[]" value="{{ $best_side_of_house_ar }}" @if(is_array(app('request')->input('best_side_of_house'))) @if(in_array( $best_side_of_house_ar, app('request')->input('best_side_of_house'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('extreme_planting_locations'))) open @endif">EXTREME PLANTING LOCATIONS <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('extreme_planting_locations'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($extreme_planting_locations_arr as $extreme_planting_locations_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="epl{{ $extreme_planting_locations_ar }}" name="extreme_planting_locations[]" value="{{ $extreme_planting_locations_ar }}" @if(is_array(app('request')->input('extreme_planting_locations'))) @if(in_array( $extreme_planting_locations_ar, app('request')->input('extreme_planting_locations'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('ornamental_features'))) open @endif">ORNAMENTAL FEATURES <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('ornamental_features'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($ornamental_features_arr as $ornamental_features_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="of{{ $ornamental_features_ar }}" name="ornamental_features[]" value="{{ $ornamental_features_ar }}" @if(is_array(app('request')->input('ornamental_features'))) @if(in_array( $ornamental_features_ar, app('request')->input('ornamental_features'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('special_landscape_uses'))) open @endif">SPECIAL LANDSCAPE USES <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('special_landscape_uses'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($special_landscape_uses_arr as $special_landscape_uses_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="slu{{ $special_landscape_uses_ar }}" name="special_landscape_uses[]" value="{{ $special_landscape_uses_ar }}" @if(is_array(app('request')->input('special_landscape_uses'))) @if(in_array( $special_landscape_uses_ar, app('request')->input('special_landscape_uses'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('possible_pest_problems'))) open @endif">POSSIBLE PEST PROBLEMS <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('possible_pest_problems'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($possible_pest_problems_arr as $possible_pest_problems_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="ppp{{ $possible_pest_problems_ar }}" name="possible_pest_problems[]" value="{{ $possible_pest_problems_ar }}" @if(is_array(app('request')->input('possible_pest_problems'))) @if(in_array( $possible_pest_problems_ar, app('request')->input('possible_pest_problems'))) checked @endif @endif>
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
                                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('plant_limitations'))) open @endif">PLANT LIMITATIONS <i></i></p>
                                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_limitations'))) block @else none @endif">
                                                                    <ul class="checkbox-container categories-list">
                                                                        @foreach($plant_limitations_arr as $plant_limitations_ar)
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" id="pl{{ $plant_limitations_ar }}" name="plant_limitations[]" value="{{ $plant_limitations_ar }}" @if(is_array(app('request')->input('plant_limitations'))) @if(in_array( $plant_limitations_ar, app('request')->input('plant_limitations'))) checked @endif @endif>
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
                                    <div class="sidebar-single" style="position: fixed !important;bottom: 0px;left: 170;z-index: 1000;width: 255px;background-color: #000">
                                        <input type="submit" name="Submit" value="FILTER SELECTED" class="btn btn-sqr" style="width: 60%;float:left;margin-right: 10px;padding: 12px 14px">
                                        <a href="{{ url('/') }}/plants" role="button" class="btn btn-sqr" style="width: 36%;float:left">RESET</a>
                                    </div>
                                </form>
                            </aside>
                        </div>
                    @endif
                    <!-- sidebar area end -->
                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <div class="alpha_pagination text-center mb-30">
                                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Plants</h1>
                                <p style="text-align: left;">Shop by Latin Name:</p>
                                <ul class="pagination-box" style="text-align: left;">
                                    @if(!empty($query1))
                                    <li><a class="alpha @if($query1=='all') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/all">All</a></li>
                                    <li><a class="alpha @if($query1=='a') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/a">A</a></li>
                                    <li><a class="alpha @if($query1=='b') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/b">B</a></li>

                                    <li><a class="alpha @if($query1=='c') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/c">C</a></li>
                                    <li><a class="alpha @if($query1=='d') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/d">D</a></li>
                                    <li><a class="alpha @if($query1=='e') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/e">E</a></li>
                                    <li><a class="alpha @if($query1=='f') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/f">F</a></li>
                                    <li><a class="alpha @if($query1=='g') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/g">G</a></li>
                                    <li><a class="alpha @if($query1=='h') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/h">H</a></li>
                                    <li><a class="alpha @if($query1=='i') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/i">I</a></li>
                                    <li><a class="alpha @if($query1=='j') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/j">J</a></li>
                                    <li><a class="alpha @if($query1=='k') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/k">K</a></li>
                                    <li><a class="alpha @if($query1=='l') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/l">L</a></li>
                                    <li><a class="alpha @if($query1=='m') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/m">M</a></li>
                                    <li><a class="alpha @if($query1=='n') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/n">N</a></li>
                                    <li><a class="alpha @if($query1=='o') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/o">O</a></li>
                                    <li><a class="alpha @if($query1=='p') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/p">P</a></li>
                                    <li><a class="alpha @if($query1=='q') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/q">Q</a></li>
                                    <li><a class="alpha @if($query1=='r') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/r">R</a></li>
                                    <li><a class="alpha @if($query1=='s') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/s">S</a></li>
                                    <li><a class="alpha @if($query1=='t') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/t">T</a></li>
                                    <li><a class="alpha @if($query1=='u') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/u">U</a></li>
                                    <li><a class="alpha @if($query1=='v') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/v">V</a></li>
                                    <li><a class="alpha @if($query1=='w') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/w">W</a></li>
                                    <li><a class="alpha @if($query1=='x') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/x">X</a></li>
                                    <li><a class="alpha @if($query1=='y') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/y">Y</a></li>
                                    <li><a class="alpha @if($query1=='z') sel_alpha @endif" href="{{ url('/') }}/plants/alphabetic-sort-by/z">Z</a></li>
                                    @else
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/all">All</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/a">A</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/b">B</a></li>

                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/c">C</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/d">D</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/e">E</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/f">F</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/g">G</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/h">H</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/i">I</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/j">J</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/k">K</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/l">L</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/m">M</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/n">N</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/o">O</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/p">P</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/q">Q</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/r">R</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/s">S</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/t">T</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/u">U</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/v">V</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/w">W</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/x">X</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/y">Y</a></li>
                                        <li><a class="alpha" href="{{ url('/') }}/plants/alphabetic-sort-by/z">Z</a></li>
                                    @endif
                                </ul>
                            </div>
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
                                                <p style="text-transform:none">
                                                    @if($product_paginate->total()>0)
                                                        Showing {{($product_paginate->currentpage()-1)*$product_paginate->perpage()+1}} to
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
                                                    @endif
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
                                @if($product_paginate->total()==0)
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center" style="margin-top: 50px">
                                        No results found. Your query may have been too specific. Try removing some of the options and try again.
                                    </div>
                                @endif
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
                                                <a href="{{ url('/plants') }}/{{ $product->slug }}">
                                                    @if(!empty(($product_model->getImage($product))))
                                                    <img class="pri-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                    <img class="sec-img" src="{{ url($product_model->getImage($product)) }}" alt="product">
                                                    @else
                                                        <img class="pri-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                        <img class="sec-img" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                    @endif
                                                </a>
<!--                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>{{ $product->tags }}</span>
                                                    </div>
                                                </div>-->
                                                <form id="wishlist_form_{{ $product->id }}" method="post">
                                                    @csrf
                                                    <div class="button-group">
                                                        <a onclick="wishlist_form_submit({{ $product->id }})" data-toggle="tooltip" data-placement="left" title="Add to wishlist" @if(!is_object(auth()->user()))  href="{{ url('/') }}/login" @endif>
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </div>
                                                    @if(is_object(auth()->user()))
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    @endif
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                </form>
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
                                                    {{--@if (Auth::check())
                                                        @if(Auth()->user()->usertype=='buyer')
                                                            <span class="price-regular">
                                                                @if(!empty($product->retail_sale_price_a))
                                                                    ${{ number_format($product->retail_sale_price_a,2) }}
                                                                @endif
                                                            </span>
                                                            <span class="price-old">
                                                                @if(!empty($product->retail_list_price_a))
                                                                    <del>${{ number_format($product->retail_list_price_a,2) }}</del>
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="price-regular">
                                                                @if(!empty($product->contractor_price_a))
                                                                    ${{ number_format($product->contractor_price_a,2) }}
                                                                @endif
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="price-regular">
                                                            @if(!empty($product->retail_sale_price_a))
                                                                ${{ number_format($product->retail_sale_price_a,2) }}
                                                            @endif
                                                        </span>
                                                        <span class="price-old"><del>
                                                            @if(!empty($product->retail_list_price_a))
                                                                ${{ number_format($product->retail_list_price_a,2) }}</del>
                                                            @endif
                                                        </span>
                                                    @endif--}}

                                                    <span class="price-regular">
                                                        @if(!empty($product_model->getProductPrice($product)))
                                                            ${{ $product_model->getProductPrice($product) }}
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
                                                            <a  href="{{ url("/plants?category=large_tree") }}">Large Tree</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="{{ url('/plants') }}/{{ $product->slug }}">
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
<!--                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>{{ $product->tags }}</span>
                                                </div>
                                            </div>-->
                                            <form id="wishlist_form" method="post">
                                                @csrf
                                                <div class="button-group">
                                                    <a onclick="wishlist_form_submit()" data-toggle="tooltip" data-placement="left" title="Add to wishlist" @if(!is_object(auth()->user()))  href="{{ url('/') }}/login" @endif>
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                </div>
                                                @if(is_object(auth()->user()))
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                @endif
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            </form>
                                        </figure>
                                        <div class="product-content-list">
                                            <h5 class="product-name" style="padding-top: 0px;">
                                                <a href="{{ url('/plants') }}/{{ $product->slug }}">{{ $product->botanical_name }} <br/> <i>{{ $product->common_name }}</i></a>
                                            </h5>
                                            <div class="price-box">
                                                @if(!empty($product->retail_sale_price_a))
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
                                                @endif
                                            </div>
                                            <div class="manufacturer-name details_tag" style="margin-top: 20px;">
                                                @if($product->perennial == 'YES')
                                                    <a  href="{{ url("/plants?category=perennial") }}">Perennial</a>
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
                                                        <a  href="{{ url("/plants?category=large_tree") }}">Large Tree</a>
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
        <div id="filter_div" class="col-lg-3 order-2 order-lg-1" style="position: absolute !important;bottom: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.90);z-index: 1000;padding-top: 0px;padding-bottom: 70px;display: none;overflow: auto;">
            <div class="minicart-close" style="width: 50px;height: 50px;text-align: center;background-color: #7fbc03;color: #fff;font-size: 50px;cursor: pointer;top: 0px;right: 0px;position: absolute;">
                <a onclick="showFilterDiv()"><i class="pe-7s-close" style="display:block"></i></a>
            </div>
            <aside class="sidebar-wrapper">
                <!-- single sidebar start -->
                <form action="" method="get" id="cat_form2">
                    @csrf
                    <div class="sidebar-single">
                        <label style="font-size: 14px"><input type="radio" name="search_type" value="partial" checked>&nbsp;PARTIAL MATCH</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size: 14px"><input type="radio" name="search_type" value="exact">&nbsp;EXACT MATCH</label>
                    </div>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title open">SORT<i></i></h5>
                        <div class="sidebar-body" style="margin-bottom:30px;">
                            <ul class="shop-categories">
                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="" @if(app('request')->input('category') == '') checked @endif onclick="submitForm()">&nbsp;&nbsp;ALL PLANTS FOR SALE</label>
                                </li>

                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="best-sellers" @if(app('request')->input('category') == 'best-sellers') checked @endif onclick="submitForm()">&nbsp;&nbsp;BEST SELLERS</label>
                                </li>

                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="new-for-this-year" @if(app('request')->input('category') == 'new-for-this-year') checked @endif onclick="submitForm()">&nbsp;&nbsp;NEW FOR THIS YEAR</label>
                                </li>

                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="all-in-library" @if(app('request')->input('category') == 'all-in-library') checked @endif onclick="submitForm()">&nbsp;&nbsp;ALL PLANTS IN LIBRARY</label>
                                </li>

                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="retired-plants" @if(app('request')->input('category') == 'retired-plants') checked @endif onclick="submitForm()">&nbsp;&nbsp;RETIRED PLANTS</label>
                                </li>

                                <li>
                                    <label style="cursor:pointer;"><input type="radio" name="category" value="other-products" @if(app('request')->input('category') == 'other-products') checked @endif onclick="submitForm()">&nbsp;&nbsp;OTHER PRODUCTS</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title @if(!empty(app('request')->input('PLANTTYPE'))) open @endif">PLANT TYPE<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('PLANTTYPE'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckPerennial" name="PLANTTYPE[]" value="perennial" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('perennial', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckPerennial" style="text-transform: uppercase">Perennial</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckShrub" name="PLANTTYPE[]" value="shrub" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('shrub', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckShrub" style="text-transform: uppercase">Shrub</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckVine" name="PLANTTYPE[]" value="vine" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('vine', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckVine" style="text-transform: uppercase">Vine</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckgrassBamboo" name="PLANTTYPE[]" value="grass_bamboo" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('grass_bamboo', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckgrassBamboo" style="text-transform: uppercase">Grass / Bamboo</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckHardyTropical" name="PLANTTYPE[]" value="hardy_tropical" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('hardy_tropical', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckHardyTropical" style="text-transform: uppercase">Hardy Tropical</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckWaterPlant" name="PLANTTYPE[]" value="water_plant" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('water_plant', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckWaterPlant" style="text-transform: uppercase">Water Plant</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckAnnual" name="PLANTTYPE[]" value="annual" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('annual', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckAnnual" style="text-transform: uppercase">Annual</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckHouseDeckPlant" name="PLANTTYPE[]" value="house_deck_plant" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('house_deck_plant', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckHouseDeckPlant" style="text-transform: uppercase">House / Deck Plant</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckCactusSucculent" name="PLANTTYPE[]" value="cactus_succulent" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('cactus_succulent', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckCactusSucculent" style="text-transform: uppercase">Cactus / Succulent</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckSmallTree" name="PLANTTYPE[]" value="small_tree" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('small_tree', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckSmallTree" style="text-transform: uppercase">Small Tree</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckLargeTree" name="PLANTTYPE[]" value="large_tree" @if(is_array(app('request')->input('PLANTTYPE'))) @if(in_array('large_tree', app('request')->input('PLANTTYPE'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckLargeTree" style="text-transform: uppercase">Large Tree</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title @if(!empty(app('request')->input('GARDENCATEGORIES'))) open @endif">GARDEN CATEGORIES<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('GARDENCATEGORIES'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckSUSTAINABLEGARDEN"  name="GARDENCATEGORIES[]" value="sustainable_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('sustainable_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckSUSTAINABLEGARDEN">SUSTAINABLE GARDEN</label>
                                    </div>
                                </li>
                                <li>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckNATIVEPLANTGARDEN" name="GARDENCATEGORIES[]" value="native_plant_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('native_plant_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckNATIVEPLANTGARDEN">NATIVE PLANT GARDEN</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBIRDWILDLIFEGARDEN" name="GARDENCATEGORIES[]" value="bird_wildlife_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('bird_wildlife_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckBIRDWILDLIFEGARDEN">BIRD & WILDLIFE GARDEN</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBUTTERFLYBEEGARDEN" name="GARDENCATEGORIES[]" value="butterfly_bee_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('butterfly_bee_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckBUTTERFLYBEEGARDEN">BUTTERFLY & BEE GARDEN</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckLUSHTROPICALGARDEN" name="GARDENCATEGORIES[]" value="lush_tropical_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('lush_tropical_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckLUSHTROPICALGARDEN">LUSH TROPICAL GARDEN</label>
                                    </div>
                                </li>
                                <li>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDRYSHADEGARDEN" name="GARDENCATEGORIES[]" value="dry_shade_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('dry_shade_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckDRYSHADEGARDEN">DRY SHADE GARDEN</label>
                                    </div>
                                </li>
                                <li>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckEDIBLEMEDICINALGARDEN" name="GARDENCATEGORIES[]" value="edible_medicinal_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('edible_medicinal_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckEDIBLEMEDICINALGARDEN">EDIBLE & MEDICINAL GARDEN</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckRAINGARDEN" name="GARDENCATEGORIES[]" value="rain_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('rain_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckRAINGARDEN">RAIN GARDEN</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckCOLORADORUSTICGARDEN" name="GARDENCATEGORIES[]" value="colorado_rustic_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('colorado_rustic_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckCOLORADORUSTICGARDEN">COLORADO & RUSTIC GARDEN</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckDESERTCACTUSROCKGARDEN" name="GARDENCATEGORIES[]" value="desert_cactus_rock_garden" @if(is_array(app('request')->input('GARDENCATEGORIES'))) @if(in_array('desert_cactus_rock_garden', app('request')->input('GARDENCATEGORIES'))) checked @endif @endif>
                                        <label class="custom-control-label" for="customCheckDESERTCACTUSROCKGARDEN">DESERT, CACTUS, & ROCK GARDEN</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-single">
                        <h5 class="sidebar-title @if(!empty(app('request')->input('min_zone')) || !empty(app('request')->input('max_zone'))) open @endif">PLANT ZONE<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('min_zone')) || !empty(app('request')->input('max_zone'))) block @else none @endif;padding-bottom: 30px">

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
                        <h5 class="sidebar-title @if(!empty(app('request')->input('sunlight')) || !empty(app('request')->input('water_rainfall')) || !empty(app('request')->input('soil_quality'))) open @endif">CULTURAL CONDITIONS<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('sunlight')) || !empty(app('request')->input('water_rainfall')) || !empty(app('request')->input('soil_quality'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                @if(count($sunlight_arr)>0)
                                    <li>
                                        <div class="custom-control custom-checkbox second_custom_control">
                                            <div class="sidebar-single">
                                                <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('sunlight'))) open @endif">SUNLIGHT<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('sunlight'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($sunlight_arr as $sunlight_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="s{{ $sunlight_ar }}" name="sunlight[]" value="{{ $sunlight_ar }}" @if(is_array(app('request')->input('sunlight'))) @if(in_array( $sunlight_ar, app('request')->input('sunlight'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('water_rainfall'))) open @endif">WATER/RAINFALL<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('water_rainfall'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($water_rainfall_arr as $water_rainfall_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="wr{{ $water_rainfall_ar }}" name="water_rainfall[]" value="{{ $water_rainfall_ar }}" @if(is_array(app('request')->input('water_rainfall'))) @if(in_array( $water_rainfall_ar, app('request')->input('water_rainfall'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('soil_quality'))) open @endif">SOIL QUALITY<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('soil_quality'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($soil_quality_arr as $soil_quality_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sq{{ $soil_quality_ar }}" name="soil_quality[]" value="{{ $soil_quality_ar }}" @if(is_array(app('request')->input('soil_quality'))) @if(in_array( $soil_quality_ar, app('request')->input('soil_quality'))) checked @endif @endif>
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
                        <h5 class="sidebar-title  @if(!empty(app('request')->input('bloom_season')) || !empty(app('request')->input('flower_color')) || !empty(app('request')->input('berry_fruit_color')) || !empty(app('request')->input('spring_foliage_color')) || !empty(app('request')->input('summer_foliage_color')) || !empty(app('request')->input('fall_foliage_color')) || !empty(app('request')->input('has_evergreen_foliage')) || !empty(app('request')->input('has_winter_interest')) || !empty(app('request')->input('scented_flowers'))) open @endif">FLOWERS AND FOLIAGE<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('bloom_season')) || !empty(app('request')->input('flower_color')) || !empty(app('request')->input('berry_fruit_color')) || !empty(app('request')->input('spring_foliage_color')) || !empty(app('request')->input('summer_foliage_color')) || !empty(app('request')->input('fall_foliage_color')) || !empty(app('request')->input('has_evergreen_foliage')) || !empty(app('request')->input('has_winter_interest')) || !empty(app('request')->input('scented_flowers'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                @if(count($bloom_season_arr)>0)
                                    <li>
                                        <div class="custom-control custom-checkbox second_custom_control">
                                            <div class="sidebar-single">
                                                <p class="sidebar-title second_sidebar  @if(!empty(app('request')->input('bloom_season'))) open @endif">BLOOM SEASON<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('bloom_season'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($bloom_season_arr as $bloom_season_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="bs{{ $bloom_season_ar }}" name="bloom_season[]" value="{{ $bloom_season_ar }}" @if(is_array(app('request')->input('bloom_season'))) @if(in_array( $bloom_season_ar, app('request')->input('bloom_season'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('flower_color'))) open @endif">FLOWER COLOR<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('flower_color'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($flower_color_arr as $flower_color_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="fc{{ $flower_color_ar }}" name="flower_color[]" value="{{ $flower_color_ar }}" @if(is_array(app('request')->input('flower_color'))) @if(in_array( $flower_color_ar, app('request')->input('flower_color'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('berry_fruit_color'))) open @endif">BERRY FRUIT COLOR<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('berry_fruit_color'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($berry_fruit_color_arr as $berry_fruit_color_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="bfc{{ $berry_fruit_color_ar }}" name="berry_fruit_color[]" value="{{ $berry_fruit_color_ar }}" @if(is_array(app('request')->input('berry_fruit_color'))) @if(in_array( $berry_fruit_color_ar, app('request')->input('berry_fruit_color'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('spring_foliage_color'))) open @endif">SPRING FOLIAGE COLOR<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('spring_foliage_color'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($spring_foliage_color_arr as $spring_foliage_color_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sfc{{ $spring_foliage_color_ar }}" name="spring_foliage_color[]" value="{{ $spring_foliage_color_ar }}" @if(is_array(app('request')->input('spring_foliage_color'))) @if(in_array( $spring_foliage_color_ar, app('request')->input('spring_foliage_color'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('summer_foliage_color'))) open @endif">SUMMER FOLIAGE COLOR<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('summer_foliage_color'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($summer_foliage_color_arr as $summer_foliage_color_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sufc{{ $summer_foliage_color_ar }}" name="summer_foliage_color[]" value="{{ $summer_foliage_color_ar }}" @if(is_array(app('request')->input('summer_foliage_color'))) @if(in_array( $summer_foliage_color_ar, app('request')->input('summer_foliage_color'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('fall_foliage_color'))) open @endif">FALL FOLIAGE COLOR<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('fall_foliage_color'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($fall_foliage_color_arr as $fall_foliage_color_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="bfca{{ $fall_foliage_color_ar }}" name="fall_foliage_color[]" value="{{ $fall_foliage_color_ar }}" @if(is_array(app('request')->input('fall_foliage_color'))) @if(in_array( $fall_foliage_color_ar, app('request')->input('fall_foliage_color'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('has_evergreen_foliage'))) open @endif">EVERGREEN FOLIAGE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('has_evergreen_foliage'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($has_evergreen_foliage_arr as $has_evergreen_foliage_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="ef{{ $has_evergreen_foliage_ar }}" name="has_evergreen_foliage[]" value="{{ $has_evergreen_foliage_ar }}" @if(is_array(app('request')->input('has_evergreen_foliage'))) @if(in_array( $has_evergreen_foliage_ar, app('request')->input('has_evergreen_foliage'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('has_winter_interest'))) open @endif">WINTER INTEREST<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('has_winter_interest'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($has_winter_interest_arr as $has_winter_interest_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="wi{{ $has_winter_interest_ar }}" name="has_winter_interest[]" value="{{ $has_winter_interest_ar }}" @if(is_array(app('request')->input('has_winter_interest'))) @if(in_array( $has_winter_interest_ar, app('request')->input('has_winter_interest'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('scented_flowers'))) open @endif">SCENTED FLOWERS<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('scented_flowers'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($scented_flowers_arr as $scented_flowers_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sfa{{ $scented_flowers_ar }}" name="scented_flowers[]" value="{{ $scented_flowers_ar }}" @if(is_array(app('request')->input('scented_flowers'))) @if(in_array( $scented_flowers_ar, app('request')->input('scented_flowers'))) checked @endif @endif>
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
                        <h5 class="sidebar-title @if(!empty(app('request')->input('drought_tolerance')) || !empty(app('request')->input('wet_feet_tolerance')) || !empty(app('request')->input('humidity_tolerance')) || !empty(app('request')->input('wind_tolerence')) || !empty(app('request')->input('poor_soil_tolerance'))) open @endif">PLANT TOLERANCES<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('drought_tolerance')) || !empty(app('request')->input('wet_feet_tolerance')) || !empty(app('request')->input('humidity_tolerance')) || !empty(app('request')->input('wind_tolerence')) || !empty(app('request')->input('poor_soil_tolerance'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                @if(count($drought_tolerance_arr)>0)
                                    <li>
                                        <div class="custom-control custom-checkbox second_custom_control">
                                            <div class="sidebar-single">
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('drought_tolerance'))) open @endif">DROUGHT TOLERANCE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('drought_tolerance'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($drought_tolerance_arr as $drought_tolerance_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="dt{{ $drought_tolerance_ar }}" name="drought_tolerance[]" value="{{ $drought_tolerance_ar }}" @if(is_array(app('request')->input('drought_tolerance'))) @if(in_array( $drought_tolerance_ar, app('request')->input('drought_tolerance'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('wet_feet_tolerance'))) open @endif">WET FEET TOLERANCE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('wet_feet_tolerance'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($wet_feet_tolerance_arr as $wet_feet_tolerance_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="wft{{ $wet_feet_tolerance_ar }}" name="wet_feet_tolerance[]" value="{{ $wet_feet_tolerance_ar }}" @if(is_array(app('request')->input('wet_feet_tolerance'))) @if(in_array( $wet_feet_tolerance_ar, app('request')->input('wet_feet_tolerance'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('humidity_tolerance'))) open @endif">HUMIDITY TOLERANCE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('humidity_tolerance'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($humidity_tolerance_arr as $humidity_tolerance_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="ht{{ $humidity_tolerance_ar }}" name="humidity_tolerance[]" value="{{  $humidity_tolerance_ar }}" @if(is_array(app('request')->input('humidity_tolerance'))) @if(in_array( $humidity_tolerance_ar, app('request')->input('humidity_tolerance'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('wind_tolerence'))) open @endif">WIND TOLERANCE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('wind_tolerence'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($wind_tolerence_arr as $wind_tolerence_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="wt{{ $wind_tolerence_ar }}" name="wind_tolerence[]" value="{{  $wind_tolerence_ar }}" @if(is_array(app('request')->input('wind_tolerence'))) @if(in_array( $wind_tolerence_ar, app('request')->input('wind_tolerence'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('poor_soil_tolerance'))) open @endif">POOR SOIL TOLERANCE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('poor_soil_tolerance'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($poor_soil_tolerance_arr as $poor_soil_tolerance_ar)
                                                            @if(!empty($poor_soil_tolerance_ar))
                                                                <li>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="pst{{ $poor_soil_tolerance_ar }}" name="poor_soil_tolerance[]" value="{{  $poor_soil_tolerance_ar }}" @if(is_array(app('request')->input('poor_soil_tolerance'))) @if(in_array( $poor_soil_tolerance_ar, app('request')->input('poor_soil_tolerance'))) checked @endif @endif>
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
                        <h5 class="sidebar-title @if(!empty(app('request')->input('growth_rate')) || !empty(app('request')->input('service_life')) || !empty(app('request')->input('maintenance_requirements')) || !empty(app('request')->input('spreading_potential')) || !empty(app('request')->input('yearly_trimming_tips'))) open @endif">GROWTH AND MAINTENANCE<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('growth_rate')) || !empty(app('request')->input('service_life')) || !empty(app('request')->input('maintenance_requirements')) || !empty(app('request')->input('spreading_potential')) || !empty(app('request')->input('yearly_trimming_tips'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                @if(count($growth_rate_arr)>0)
                                    <li>
                                        <div class="custom-control custom-checkbox second_custom_control">
                                            <div class="sidebar-single">
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('growth_rate'))) open @endif">GROWTH RATE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('growth_rate'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($growth_rate_arr as $growth_rate_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="gr{{ $growth_rate_ar }}" name="growth_rate[]" value="{{ $growth_rate_ar }}" @if(is_array(app('request')->input('growth_rate'))) @if(in_array( $growth_rate_ar, app('request')->input('growth_rate'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('service_life'))) open @endif">SERVICE LIFE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('service_life'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($service_life_arr as $service_life_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sl{{ $service_life_ar }}" name="service_life[]" value="{{ $service_life_ar }}" @if(is_array(app('request')->input('service_life'))) @if(in_array( $service_life_ar, app('request')->input('service_life'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('maintenance_requirements'))) open @endif">MAINTENANCE NEEDS <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('maintenance_requirements'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($maintenance_requirements_arr as $maintenance_requirements_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="mr{{ $maintenance_requirements_ar }}" name="maintenance_requirements[]" value="{{ $maintenance_requirements_ar }}" @if(is_array(app('request')->input('maintenance_requirements'))) @if(in_array( $maintenance_requirements_ar, app('request')->input('maintenance_requirements'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('spreading_potential'))) open @endif">SPREADING POTENTIAL <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('spreading_potential'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($spreading_potential_arr as $spreading_potential_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="sp{{ $spreading_potential_ar }}" name="spreading_potential[]" value="{{ $spreading_potential_ar }}" @if(is_array(app('request')->input('spreading_potential'))) @if(in_array( $spreading_potential_ar, app('request')->input('spreading_potential'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('yearly_trimming_tips'))) open @endif">YEARLY TRIMMING TIPS <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('yearly_trimming_tips'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($yearly_trimming_tips_arr as $yearly_trimming_tips_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="ytt{{ $yearly_trimming_tips_ar }}" name="yearly_trimming_tips[]" value="{{ $yearly_trimming_tips_ar }}" @if(is_array(app('request')->input('yearly_trimming_tips'))) @if(in_array( $yearly_trimming_tips_ar, app('request')->input('yearly_trimming_tips'))) checked @endif @endif>
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
                        <h5 class="sidebar-title @if(!empty(app('request')->input('plant_grouping_size')) || !empty(app('request')->input('best_side_of_house')) || !empty(app('request')->input('extreme_planting_locations')) || !empty(app('request')->input('ornamental_features')) || !empty(app('request')->input('special_landscape_uses')) || !empty(app('request')->input('possible_pest_problems')) || !empty(app('request')->input('plant_limitations'))) open @endif">PLANT USES AND LIMITATIONS<i></i></h5>
                        <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_grouping_size')) || !empty(app('request')->input('best_side_of_house')) || !empty(app('request')->input('extreme_planting_locations')) || !empty(app('request')->input('ornamental_features')) || !empty(app('request')->input('special_landscape_uses')) || !empty(app('request')->input('possible_pest_problems')) || !empty(app('request')->input('plant_limitations'))) block @else none @endif">
                            <ul class="checkbox-container categories-list">
                                @if(count($plant_grouping_size_arr)>0)
                                    <li>
                                        <div class="custom-control custom-checkbox second_custom_control">
                                            <div class="sidebar-single">
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('plant_grouping_size'))) open @endif">PLANT GROUPING SIZE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_grouping_size'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($plant_grouping_size_arr as $plant_grouping_size_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="pgs{{ $plant_grouping_size_ar }}" name="plant_grouping_size[]" value="{{ $plant_grouping_size_ar }}" @if(is_array(app('request')->input('plant_grouping_size'))) @if(in_array( $plant_grouping_size_ar, app('request')->input('plant_grouping_size'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('best_side_of_house'))) open @endif">BEST SIDE OF HOUSE<i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('best_side_of_house'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($best_side_of_house_arr as $best_side_of_house_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="bsoh{{ $best_side_of_house_ar }}" name="best_side_of_house[]" value="{{ $best_side_of_house_ar }}" @if(is_array(app('request')->input('best_side_of_house'))) @if(in_array( $best_side_of_house_ar, app('request')->input('best_side_of_house'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('extreme_planting_locations'))) open @endif">EXTREME PLANTING LOCATIONS <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('extreme_planting_locations'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($extreme_planting_locations_arr as $extreme_planting_locations_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="epl{{ $extreme_planting_locations_ar }}" name="extreme_planting_locations[]" value="{{ $extreme_planting_locations_ar }}" @if(is_array(app('request')->input('extreme_planting_locations'))) @if(in_array( $extreme_planting_locations_ar, app('request')->input('extreme_planting_locations'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('ornamental_features'))) open @endif">ORNAMENTAL FEATURES <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('ornamental_features'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($ornamental_features_arr as $ornamental_features_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="of{{ $ornamental_features_ar }}" name="ornamental_features[]" value="{{ $ornamental_features_ar }}" @if(is_array(app('request')->input('ornamental_features'))) @if(in_array( $ornamental_features_ar, app('request')->input('ornamental_features'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('special_landscape_uses'))) open @endif">SPECIAL LANDSCAPE USES <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('special_landscape_uses'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($special_landscape_uses_arr as $special_landscape_uses_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="slu{{ $special_landscape_uses_ar }}" name="special_landscape_uses[]" value="{{ $special_landscape_uses_ar }}" @if(is_array(app('request')->input('special_landscape_uses'))) @if(in_array( $special_landscape_uses_ar, app('request')->input('special_landscape_uses'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('possible_pest_problems'))) open @endif">POSSIBLE PEST PROBLEMS <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('possible_pest_problems'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($possible_pest_problems_arr as $possible_pest_problems_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="ppp{{ $possible_pest_problems_ar }}" name="possible_pest_problems[]" value="{{ $possible_pest_problems_ar }}" @if(is_array(app('request')->input('possible_pest_problems'))) @if(in_array( $possible_pest_problems_ar, app('request')->input('possible_pest_problems'))) checked @endif @endif>
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
                                                <p class="sidebar-title second_sidebar @if(!empty(app('request')->input('plant_limitations'))) open @endif">PLANT LIMITATIONS <i></i></p>
                                                <div class="sidebar-body" style="display: @if(!empty(app('request')->input('plant_limitations'))) block @else none @endif">
                                                    <ul class="checkbox-container categories-list">
                                                        @foreach($plant_limitations_arr as $plant_limitations_ar)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="pl{{ $plant_limitations_ar }}" name="plant_limitations[]" value="{{ $plant_limitations_ar }}" @if(is_array(app('request')->input('plant_limitations'))) @if(in_array( $plant_limitations_ar, app('request')->input('plant_limitations'))) checked @endif @endif>
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
<!--                    <div class="sidebar-single">
                        <input type="submit" name="Submit" value="FILTER" class="btn btn-sqr">
                    </div>-->
                </form>
            </aside>

        </div>

        <div class="sidebar-single" style="position: fixed !important;bottom: 0px;left: 170;z-index: 1000;width: 100%;background-color: #000;margin: auto;">
            <div style="text-align: center;width: 100%">
                <a href="{{ url('/') }}/plants" role="button" class="btn btn-sqr" style="width: 100%;float:left">FILTER</a>
            </div>

            <div style="display: none">
                <input type="submit" name="Submit" value="FILTER SELECTED" class="btn btn-sqr" style="width: 60%;float:left;margin-right: 10px;padding: 12px 14px">
                <a href="{{ url('/') }}/plants" role="button" class="btn btn-sqr" style="width: 36%;float:left">RESET</a>
            </div>
        </div>
    @endif
@endsection

@section('javascript')
    <script>
        function submitForm(val) {
            //jQuery("#cat_form").attr('action',"{{ url('/plants/category') }}/"+val);
            jQuery("#cat_form").submit();
        }
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
