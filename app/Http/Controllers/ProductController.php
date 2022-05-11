<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Excel;

class ProductController extends Controller
{

    public function sortalphaproducts($query1,Request $request) {

        $zoneArray = array(
            '1'=>'1a','1.5'=>'1b',
            '2'=>'2a','2.5'=>'2b',
            '3'=>'3a','3.5'=>'3b',
            '4'=>'4a','4.5'=>'4b',
            '5'=>'5a','5.5'=>'5b',
            '6'=>'6a','6.5'=>'6b',
            '7'=>'7a','7.5'=>'7b',
            '8'=>'8a','8.5'=>'8b',
            '9'=>'9a','9.5'=>'9b',
            '10'=>'10a','10.5'=>'10b',
            '11'=>'11a','11.5'=>'11b',
            '12'=>'12a','12.5'=>'12b',
            '13'=>'13a','13.5'=>'13b'
        );

        $where_query= array();

        $sortby = "botanical_name";
        $sort = "asc";

        if(!empty($request->sortby)) {
            if($request->sortby == 'name_asc') {
                $sortby = "botanical_name";
                $sort = "asc";
            }
            else if($request->sortby == 'name_desc') {
                $sortby = "botanical_name";
                $sort = "desc";
            }
            else if($request->sortby == 'price_desc') {
                $sortby = "retail_sale_price_a";
                $sort = "desc";
            }
            else if($request->sortby == 'price_asc') {
                $sortby = "retail_sale_price_a";
                $sort = "asc";
            }
        }

        if($request->get('search_type') == 'partial') {

            if(!empty($request->get('category'))) {
                if($request->get('category') == 'best-sellers') {
                    $where_query['best_sellers'] = 'YES';
                }
                else if($request->get('category') == 'new-for-this-year') {
                    $where_query['new_for_this_year'] = 'YES';
                }
            }

            if(!empty($request->get('amount'))) {
                $amount_arr = explode(' - ', $request->get('amount'));
                $where_query1['min_price'] = str_replace('$','',$amount_arr[0]);
                $where_query1['max_price'] = str_replace('$','',$amount_arr[1]);
            }
            else {
                $where_query1['min_price'] = 0;
                $where_query1['max_price'] = 1000000000;
            }

            if(!empty($request->get('min_zone')) && empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = 13.5;
            }
            else if(!empty($request->get('max_zone')) && empty($request->get('min_zone'))) {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else if(!empty($request->get('min_zone')) && !empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = 13.5;
            }
            $sunlight_sel_arr = array();
            $water_rainfall_sel_arr = array();
            $soil_quality_sel_arr = array();
            $bloom_season_sel_arr = array();
            $flower_color_sel_arr = array();
            $berry_fruit_color_sel_arr = array();
            $spring_foliage_color_sel_arr = array();
            $summer_foliage_color_sel_arr = array();
            $fall_foliage_color_sel_arr = array();
            $has_evergreen_foliage_sel_arr = array();
            $has_winter_interest_sel_arr = array();
            $scented_flowers_sel_arr = array();
            $drought_tolerance_sel_arr = array();
            $wet_feet_tolerance_sel_arr = array();
            $humidity_tolerance_sel_arr = array();
            $wind_tolerence_sel_arr = array();
            $poor_soil_tolerance_sel_arr = array();
            $growth_rate_sel_arr = array();
            $service_life_sel_arr = array();
            $maintenance_requirements_sel_arr = array();
            $spreading_potential_sel_arr = array();
            $yearly_trimming_tips_sel_arr = array();

            $plant_grouping_size_sel_arr = array();
            $best_side_of_house_sel_arr = array();
            $extreme_planting_locations_sel_arr = array();
            $ornamental_features_sel_arr = array();
            $special_landscape_uses_sel_arr = array();
            $possible_pest_problems_sel_arr = array();
            $plant_limitations_sel_arr = array();
            $planttype_sel_arr = array();
            $gardencat_sel_arr = array();

            if($request->has('PLANTTYPE')) {
                $planttype_sel_arr = $request->get('PLANTTYPE');
            }
            if($request->has('GARDENCATEGORIES')) {
                $gardencat_sel_arr = $request->get('GARDENCATEGORIES');
            }

            if($request->has('sunlight')) {
                $sunlight_sel_arr = $request->get('sunlight');
            }
            if($request->has('water_rainfall')) {
                $water_rainfall_sel_arr = $request->get('water_rainfall');
            }
            if($request->has('soil_quality')) {
                $soil_quality_sel_arr = $request->get('soil_quality');
            }
            if($request->has('bloom_season')) {
                $bloom_season_sel_arr = $request->get('bloom_season');
            }
            if($request->has('flower_color')) {
                $flower_color_sel_arr = $request->get('flower_color');
            }
            if($request->has('berry_fruit_color')) {
                $berry_fruit_color_sel_arr = $request->get('berry_fruit_color');
            }
            if($request->has('spring_foliage_color')) {
                $spring_foliage_color_sel_arr = $request->get('spring_foliage_color');
            }
            if($request->has('summer_foliage_color')) {
                $summer_foliage_color_sel_arr = $request->get('summer_foliage_color');
            }
            if($request->has('fall_foliage_color')) {
                $fall_foliage_color_sel_arr = $request->get('fall_foliage_color');
            }
            if($request->has('has_evergreen_foliage')) {
                $has_evergreen_foliage_sel_arr = $request->get('has_evergreen_foliage');
            }



            if($request->has('has_winter_interest')) {
                $has_winter_interest_sel_arr = $request->get('has_winter_interest');
            }
            if($request->has('scented_flowers')) {
                $scented_flowers_sel_arr = $request->get('scented_flowers');
            }
            if($request->has('drought_tolerance')) {
                $drought_tolerance_sel_arr = $request->get('drought_tolerance');
            }
            if($request->has('wet_feet_tolerance')) {
                $wet_feet_tolerance_sel_arr = $request->get('wet_feet_tolerance');
            }
            if($request->has('humidity_tolerance')) {
                $humidity_tolerance_sel_arr = $request->get('humidity_tolerance');
            }
            if($request->has('wind_tolerence')) {
                $wind_tolerence_sel_arr = $request->get('wind_tolerence');
            }
            if($request->has('poor_soil_tolerance')) {
                $poor_soil_tolerance_sel_arr = $request->get('poor_soil_tolerance');
            }
            if($request->has('growth_rate')) {
                $growth_rate_sel_arr = $request->get('growth_rate');
            }
            if($request->has('service_life')) {
                $service_life_sel_arr = $request->get('service_life');
            }
            if($request->has('maintenance_requirements')) {
                $maintenance_requirements_sel_arr = $request->get('maintenance_requirements');
            }
            if($request->has('spreading_potential')) {
                $spreading_potential_sel_arr = $request->get('spreading_potential');
            }
            if($request->has('yearly_trimming_tips')) {
                $yearly_trimming_tips_sel_arr = $request->get('yearly_trimming_tips');
            }


            if($request->has('plant_grouping_size')) {
                $plant_grouping_size_sel_arr = $request->get('plant_grouping_size');
            }
            if($request->has('best_side_of_house')) {
                $best_side_of_house_sel_arr = $request->get('best_side_of_house');
            }
            if($request->has('extreme_planting_locations')) {
                $extreme_planting_locations_sel_arr = $request->get('extreme_planting_locations');
            }
            if($request->has('ornamental_features')) {
                $ornamental_features_sel_arr = $request->get('ornamental_features');
            }
            if($request->has('special_landscape_uses')) {
                $special_landscape_uses_sel_arr = $request->get('special_landscape_uses');
            }
            if($request->has('possible_pest_problems')) {
                $possible_pest_problems_sel_arr = $request->get('possible_pest_problems');
            }
            if($request->has('plant_limitations')) {
                $plant_limitations_sel_arr = $request->get('plant_limitations');
            }



            if(!empty($where_query1)) {
                //$where_query1['status'] = 'ACTIVE';
                $product_lists = Product::
                where($where_query)
                    ->Where(function ($query) use($query1) {
                        if($query1!='all') {
                            $query->where('botanical_name', 'like', $query1 . '%');
                        }
                    })
                    ->Where(function ($query) use($request,$where_query1) {
                        if(!empty($request->get('min_zone'))) {
                            $query->where('min_zone', '>=', $where_query1['min_zone']);
                        }
                        if(!empty($request->get('max_zone'))) {
                            $query->where('max_zone', '<=', $where_query1['max_zone']);
                        }
                    })
                    ->Where(function ($query) use($request,$where_query1) {

                        if($request->get('category') == 'other-products') {
                            $query->where('other_product_service_name', '<>',  '');
                            $query->orWhere('other_product_service_name', '<>',  null);
                        }
                        elseif($request->get('category') == 'retired-plants') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                            $query->where('status', '<>',  'Active');
                            $query->orWhere('status', '=',  null);
                        }
                        elseif($request->get('category') == 'all-in-library') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                        }
                        else {
                            $query->where('status', '=',  'Active');
                            $query->where(function($query) {
                                $query->orWhere('retail_sale_price_a', '<>',  '')->orWhere('retail_sale_price_a', '<>',  null)->orWhere('retail_sale_price_b', '<>',  '')->orWhere('retail_sale_price_b', '<>',  null)->orWhere('retail_sale_price_c', '<>',  '')->orWhere('retail_sale_price_c', '<>',  null);
                            });
                        }
                    })
                    ->Where(function ($query) use($planttype_sel_arr) {
                        for ($i = 0; $i < count($planttype_sel_arr); $i++){
                            $query->orWhere($planttype_sel_arr [$i], '=',  'YES');
                        }
                    })

                    ->Where(function ($query) use($gardencat_sel_arr,$sunlight_sel_arr,$water_rainfall_sel_arr,$soil_quality_sel_arr,$bloom_season_sel_arr,$flower_color_sel_arr,$berry_fruit_color_sel_arr,$spring_foliage_color_sel_arr,$summer_foliage_color_sel_arr,$fall_foliage_color_sel_arr,$has_evergreen_foliage_sel_arr,$has_winter_interest_sel_arr,$scented_flowers_sel_arr,$drought_tolerance_sel_arr,$wet_feet_tolerance_sel_arr,$humidity_tolerance_sel_arr,$wind_tolerence_sel_arr,$poor_soil_tolerance_sel_arr,$growth_rate_sel_arr,$service_life_sel_arr,$maintenance_requirements_sel_arr,$spreading_potential_sel_arr,$yearly_trimming_tips_sel_arr,$plant_grouping_size_sel_arr,$best_side_of_house_sel_arr,$extreme_planting_locations_sel_arr,$ornamental_features_sel_arr,$special_landscape_uses_sel_arr,$possible_pest_problems_sel_arr,$plant_limitations_sel_arr) {
                        $query->orWhere(function ($query) use ($gardencat_sel_arr) {
                            for ($i = 0; $i < count($gardencat_sel_arr); $i++) {
                                $query->orWhere($gardencat_sel_arr [$i], '=', 'YES');
                            }
                        })
                            ->orWhere(function ($query) use ($sunlight_sel_arr) {
                                for ($i = 0; $i < count($sunlight_sel_arr); $i++) {
                                    $query->orWhere('sunlight', 'like', '%,' . $sunlight_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($water_rainfall_sel_arr) {
                                for ($i = 0; $i < count($water_rainfall_sel_arr); $i++) {
                                    $query->orWhere('water_rainfall', 'like', '%,' . $water_rainfall_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($soil_quality_sel_arr) {
                                for ($i = 0; $i < count($soil_quality_sel_arr); $i++) {
                                    $query->orWhere('soil_quality', 'like', '%,' . $soil_quality_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($bloom_season_sel_arr) {
                                for ($i = 0; $i < count($bloom_season_sel_arr); $i++) {
                                    $query->orWhere('bloom_season', 'like', '%,' . $bloom_season_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($flower_color_sel_arr) {
                                for ($i = 0; $i < count($flower_color_sel_arr); $i++) {
                                    $query->orWhere('flower_color', 'like', '%,' . $flower_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($berry_fruit_color_sel_arr) {
                                for ($i = 0; $i < count($berry_fruit_color_sel_arr); $i++) {
                                    $query->orWhere('berry_fruit_color', 'like', '%,' . $berry_fruit_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($spring_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($spring_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('spring_foliage_color', 'like', '%,' . $spring_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($summer_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($summer_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('summer_foliage_color', 'like', '%,' . $summer_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($fall_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($fall_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('fall_foliage_color', 'like', '%,' . $fall_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($has_evergreen_foliage_sel_arr) {
                                for ($i = 0; $i < count($has_evergreen_foliage_sel_arr); $i++) {
                                    $query->orWhere('has_evergreen_foliage', 'like', '%' . $has_evergreen_foliage_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($has_winter_interest_sel_arr) {
                                for ($i = 0; $i < count($has_winter_interest_sel_arr); $i++) {
                                    $query->orWhere('has_winter_interest', 'like', '%,' . $has_winter_interest_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($scented_flowers_sel_arr) {
                                for ($i = 0; $i < count($scented_flowers_sel_arr); $i++) {
                                    $query->orWhere('scented_flowers', 'like', '%,' . $scented_flowers_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($drought_tolerance_sel_arr) {
                                for ($i = 0; $i < count($drought_tolerance_sel_arr); $i++) {
                                    $query->orWhere('drought_tolerance', 'like', '%,' . $drought_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($wet_feet_tolerance_sel_arr) {
                                for ($i = 0; $i < count($wet_feet_tolerance_sel_arr); $i++) {
                                    $query->orWhere('wet_feet_tolerance', 'like', '%,' . $wet_feet_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($humidity_tolerance_sel_arr) {
                                for ($i = 0; $i < count($humidity_tolerance_sel_arr); $i++) {
                                    $query->orWhere('humidity_tolerance', 'like', '%,' . $humidity_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($wind_tolerence_sel_arr) {
                                for ($i = 0; $i < count($wind_tolerence_sel_arr); $i++) {
                                    $query->orWhere('wind_tolerence', 'like', '%,' . $wind_tolerence_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($poor_soil_tolerance_sel_arr) {
                                for ($i = 0; $i < count($poor_soil_tolerance_sel_arr); $i++) {
                                    $query->orWhere('poor_soil_tolerance', 'like', '%,' . $poor_soil_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($growth_rate_sel_arr) {
                                for ($i = 0; $i < count($growth_rate_sel_arr); $i++) {
                                    $query->orWhere('growth_rate', 'like', '%,' . $growth_rate_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($service_life_sel_arr) {
                                for ($i = 0; $i < count($service_life_sel_arr); $i++) {
                                    $query->orWhere('service_life', '=', ','.$service_life_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($maintenance_requirements_sel_arr) {
                                for ($i = 0; $i < count($maintenance_requirements_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                    $query->orWhere('maintenance_requirements', '=', $maintenance_requirements_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($spreading_potential_sel_arr) {
                                for ($i = 0; $i < count($spreading_potential_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                    $query->orWhere('spreading_potential', '=', $spreading_potential_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($yearly_trimming_tips_sel_arr) {
                                for ($i = 0; $i < count($yearly_trimming_tips_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $yearly_trimming_tips_sel_arr [$i] .',%');
                                    $query->orWhere('yearly_trimming_tips', '=', $yearly_trimming_tips_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($plant_grouping_size_sel_arr) {
                                for ($i = 0; $i < count($plant_grouping_size_sel_arr); $i++) {
                                    $query->orWhere('plant_grouping_size', 'like', '%,' . $plant_grouping_size_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($best_side_of_house_sel_arr) {
                                for ($i = 0; $i < count($best_side_of_house_sel_arr); $i++) {
                                    $query->orWhere('best_side_of_house', 'like', '%,' . $best_side_of_house_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($extreme_planting_locations_sel_arr) {
                                for ($i = 0; $i < count($extreme_planting_locations_sel_arr); $i++) {
                                    $query->orWhere('extreme_planting_locations', 'like', '%,' . $extreme_planting_locations_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($ornamental_features_sel_arr) {
                                for ($i = 0; $i < count($ornamental_features_sel_arr); $i++) {
                                    $query->orWhere('ornamental_features', 'like', '%,' . $ornamental_features_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($special_landscape_uses_sel_arr) {
                                for ($i = 0; $i < count($special_landscape_uses_sel_arr); $i++) {
                                    $query->orWhere('special_landscape_uses', 'like', '%,' . $special_landscape_uses_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($possible_pest_problems_sel_arr) {
                                for ($i = 0; $i < count($possible_pest_problems_sel_arr); $i++) {
                                    $query->orWhere('possible_pest_problems', 'like', '%,' . $possible_pest_problems_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($plant_limitations_sel_arr) {
                                for ($i = 0; $i < count($plant_limitations_sel_arr); $i++) {
                                    $query->orWhere('plant_limitations', 'like', '%,' . $plant_limitations_sel_arr [$i] . ',%');
                                }
                            });
                    })->orderBy($sortby,$sort)
                    ->paginate(50);


            }
            else {
                $product_lists = DB::table('products')
                    ->where($where_query)->orderBy($sortby,$sort)
                    ->paginate(50);
            }


            $final_array = array();

            foreach ($product_lists as $product_list) {

                $rand = rand(1,10);
                $product_list->image = $rand.'.jpg';
                $final_array[] = $product_list;
            }

            $total_product_count = DB::table('products')
                //->where('status','ACTIVE')
                ->count();


            $sel_products = DB::table('products')
                ->select('sunlight', 'water_rainfall', 'soil_quality', 'bloom_season', 'flower_color', 'berry_fruit_color', 'spring_foliage_color', 'summer_foliage_color', 'fall_foliage_color', 'has_evergreen_foliage', 'has_winter_interest', 'scented_flowers', 'drought_tolerance', 'wet_feet_tolerance', 'humidity_tolerance', 'wind_tolerence', 'poor_soil_tolerance', 'growth_rate', 'service_life', 'maintenance_requirements', 'spreading_potential', 'yearly_trimming_tips','plant_grouping_size','best_side_of_house','extreme_planting_locations','ornamental_features','special_landscape_uses','possible_pest_problems','plant_limitations')->orderBy('botanical_name','ASC')
                ->get();
            if(!empty($sel_products)) {
                $sunlight_arr = array();
                $water_rainfall_arr = array();
                $soil_quality_arr = array();
                $bloom_season_arr = array();
                $flower_color_arr = array();
                $berry_fruit_color_arr = array();
                $spring_foliage_color_arr = array();
                $summer_foliage_color_arr = array();
                $fall_foliage_color_arr = array();
                $has_evergreen_foliage_arr = array();
                $has_winter_interest_arr = array();
                $scented_flowers_arr = array();
                $drought_tolerance_arr = array();
                $wet_feet_tolerance_arr = array();
                $humidity_tolerance_arr = array();
                $wind_tolerence_arr = array();
                $poor_soil_tolerance_arr = array();
                $growth_rate_arr = array();
                $service_life_arr = array();
                $maintenance_requirements_arr = array();
                $spreading_potential_arr = array();
                $yearly_trimming_tips_arr = array();

                $plant_grouping_size_arr = array();
                $best_side_of_house_arr = array();
                $extreme_planting_locations_arr = array();
                $ornamental_features_arr = array();
                $special_landscape_uses_arr = array();
                $possible_pest_problems_arr = array();
                $plant_limitations_arr = array();

                foreach ($sel_products as $sel_product) {
                    if(!empty($sel_product->sunlight)) {
                        $arr = explode(',',rtrim($sel_product->sunlight, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $sunlight_arr)) {
                                    $sunlight_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->water_rainfall)) {
                        $arr = explode(',',rtrim($sel_product->water_rainfall, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $water_rainfall_arr)) {
                                    $water_rainfall_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->soil_quality)) {
                        $arr = explode(',',rtrim($sel_product->soil_quality, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $soil_quality_arr)) {
                                    $soil_quality_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->bloom_season)) {
                        $arr = explode(',',rtrim($sel_product->bloom_season, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $bloom_season_arr)) {
                                    $bloom_season_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->flower_color)) {
                        $arr = explode(',',rtrim($sel_product->flower_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $flower_color_arr)) {
                                    $flower_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->berry_fruit_color)) {
                        $arr = explode(',',rtrim($sel_product->berry_fruit_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $berry_fruit_color_arr)) {
                                    $berry_fruit_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->spring_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->spring_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spring_foliage_color_arr)) {
                                    $spring_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->summer_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->summer_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $summer_foliage_color_arr)) {
                                    $summer_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->fall_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->fall_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $fall_foliage_color_arr)) {
                                    $fall_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_evergreen_foliage)) {
                        $arr = explode(',',rtrim($sel_product->has_evergreen_foliage, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_evergreen_foliage_arr)) {
                                    $has_evergreen_foliage_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_winter_interest)) {
                        $arr = explode(',',rtrim($sel_product->has_winter_interest, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_winter_interest_arr)) {
                                    $has_winter_interest_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->scented_flowers)) {
                        $arr = explode(',',rtrim($sel_product->scented_flowers, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $scented_flowers_arr)) {
                                    $scented_flowers_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->drought_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->drought_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $drought_tolerance_arr)) {
                                    $drought_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wet_feet_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->wet_feet_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wet_feet_tolerance_arr)) {
                                    $wet_feet_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->humidity_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->humidity_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $humidity_tolerance_arr)) {
                                    $humidity_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wind_tolerence)) {
                        $arr = explode(',',rtrim($sel_product->wind_tolerence, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wind_tolerence_arr)) {
                                    $wind_tolerence_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->poor_soil_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->poor_soil_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $poor_soil_tolerance_arr)) {
                                    $poor_soil_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->growth_rate)) {
                        $arr = explode(',',rtrim($sel_product->growth_rate, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $growth_rate_arr)) {
                                    $growth_rate_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->service_life)) {
                        $arr = explode(',',rtrim($sel_product->service_life, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $service_life_arr)) {
                                    $service_life_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->maintenance_requirements)) {
                        $arr = explode(',',rtrim($sel_product->maintenance_requirements, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $maintenance_requirements_arr)) {
                                    $maintenance_requirements_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->spreading_potential)) {
                        $arr = explode(',',rtrim($sel_product->spreading_potential, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spreading_potential_arr)) {
                                    $spreading_potential_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->yearly_trimming_tips)) {
                        $arr = explode(',',rtrim($sel_product->yearly_trimming_tips, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $yearly_trimming_tips_arr)) {
                                    $yearly_trimming_tips_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_grouping_size)) {
                        $arr = explode(',',rtrim($sel_product->plant_grouping_size, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_grouping_size_arr)) {
                                    $plant_grouping_size_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->best_side_of_house)) {
                        $arr = explode(',',rtrim($sel_product->best_side_of_house, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $best_side_of_house_arr)) {
                                    $best_side_of_house_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->extreme_planting_locations)) {
                        $arr = explode(',',rtrim($sel_product->extreme_planting_locations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $extreme_planting_locations_arr)) {
                                    $extreme_planting_locations_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->ornamental_features)) {
                        $arr = explode(',',rtrim($sel_product->ornamental_features, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $ornamental_features_arr)) {
                                    $ornamental_features_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->special_landscape_uses)) {
                        $arr = explode(',',rtrim($sel_product->special_landscape_uses, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $special_landscape_uses_arr)) {
                                    $special_landscape_uses_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->possible_pest_problems)) {
                        $arr = explode(',',rtrim($sel_product->possible_pest_problems, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $possible_pest_problems_arr)) {
                                    $possible_pest_problems_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_limitations)) {
                        $arr = explode(',',rtrim($sel_product->plant_limitations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_limitations_arr)) {
                                    $plant_limitations_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                }

                sort($sunlight_arr);
                sort($water_rainfall_arr);
                sort($soil_quality_arr);
                sort($bloom_season_arr);
                sort($flower_color_arr);
                sort($berry_fruit_color_arr);
                sort($spring_foliage_color_arr);
                sort($summer_foliage_color_arr);
                /*print_r($fall_foliage_color_arr);
                exit;*/
                sort($fall_foliage_color_arr);
                sort($has_evergreen_foliage_arr);
                sort($has_winter_interest_arr);
                sort($scented_flowers_arr);
                sort($drought_tolerance_arr);
                sort($wet_feet_tolerance_arr);
                sort($humidity_tolerance_arr);
                sort($wind_tolerence_arr);
                sort($poor_soil_tolerance_arr);
                sort($growth_rate_arr);
                sort($service_life_arr);
                sort($maintenance_requirements_arr);
                sort($spreading_potential_arr);
                sort($yearly_trimming_tips_arr);

                sort($plant_grouping_size_arr);
                sort($best_side_of_house_arr);
                sort($extreme_planting_locations_arr);
                sort($ornamental_features_arr);
                sort($special_landscape_uses_arr);
                sort($possible_pest_problems_arr);
                sort($plant_limitations_arr);
            }

        }
        else {
            if(!empty($request->get('category'))) {
                if($request->get('category') == 'best-sellers') {
                    $where_query['best_sellers'] = 'YES';
                }
                else if($request->get('category') == 'new-for-this-year') {
                    $where_query['new_for_this_year'] = 'YES';
                }
            }

            if($request->has('PLANTTYPE')) {
                foreach ($request->get('PLANTTYPE') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }

            if($request->has('GARDENCATEGORIES')) {
                foreach ($request->get('GARDENCATEGORIES') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }


            if(!empty($request->get('amount'))) {
                $amount_arr = explode(' - ', $request->get('amount'));
                $where_query1['min_price'] = str_replace('$','',$amount_arr[0]);
                $where_query1['max_price'] = str_replace('$','',$amount_arr[1]);
                //$orwhere_query['retail_sale_price_a'] = '<='.str_replace('$','',$amount_arr[1]);
            }
            else {
                $where_query1['min_price'] = 0;
                $where_query1['max_price'] = 1000000000;
            }

            if(!empty($request->get('min_zone')) && empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = 13.5;
            }
            else if(!empty($request->get('max_zone')) && empty($request->get('min_zone'))) {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else if(!empty($request->get('min_zone')) && !empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = 13.5;
            }
            $sunlight_sel_arr = array();
            $water_rainfall_sel_arr = array();
            $soil_quality_sel_arr = array();
            $bloom_season_sel_arr = array();
            $flower_color_sel_arr = array();
            $berry_fruit_color_sel_arr = array();
            $spring_foliage_color_sel_arr = array();
            $summer_foliage_color_sel_arr = array();
            $fall_foliage_color_sel_arr = array();
            $has_evergreen_foliage_sel_arr = array();
            $has_winter_interest_sel_arr = array();
            $scented_flowers_sel_arr = array();
            $drought_tolerance_sel_arr = array();
            $wet_feet_tolerance_sel_arr = array();
            $humidity_tolerance_sel_arr = array();
            $wind_tolerence_sel_arr = array();
            $poor_soil_tolerance_sel_arr = array();
            $growth_rate_sel_arr = array();
            $service_life_sel_arr = array();
            $maintenance_requirements_sel_arr = array();
            $spreading_potential_sel_arr = array();
            $yearly_trimming_tips_sel_arr = array();

            $plant_grouping_size_sel_arr = array();
            $best_side_of_house_sel_arr = array();
            $extreme_planting_locations_sel_arr = array();
            $ornamental_features_sel_arr = array();
            $special_landscape_uses_sel_arr = array();
            $possible_pest_problems_sel_arr = array();
            $plant_limitations_sel_arr = array();

            if($request->has('sunlight')) {
                $sunlight_sel_arr = $request->get('sunlight');
            }
            if($request->has('water_rainfall')) {
                $water_rainfall_sel_arr = $request->get('water_rainfall');
            }
            if($request->has('soil_quality')) {
                $soil_quality_sel_arr = $request->get('soil_quality');
            }
            if($request->has('bloom_season')) {
                $bloom_season_sel_arr = $request->get('bloom_season');
            }
            if($request->has('flower_color')) {
                $flower_color_sel_arr = $request->get('flower_color');
            }
            if($request->has('berry_fruit_color')) {
                $berry_fruit_color_sel_arr = $request->get('berry_fruit_color');
            }
            if($request->has('spring_foliage_color')) {
                $spring_foliage_color_sel_arr = $request->get('spring_foliage_color');
            }
            if($request->has('summer_foliage_color')) {
                $summer_foliage_color_sel_arr = $request->get('summer_foliage_color');
            }
            if($request->has('fall_foliage_color')) {
                $fall_foliage_color_sel_arr = $request->get('fall_foliage_color');
            }
            if($request->has('has_evergreen_foliage')) {
                $has_evergreen_foliage_sel_arr = $request->get('has_evergreen_foliage');
            }



            if($request->has('has_winter_interest')) {
                $has_winter_interest_sel_arr = $request->get('has_winter_interest');
            }
            if($request->has('scented_flowers')) {
                $scented_flowers_sel_arr = $request->get('scented_flowers');
            }
            if($request->has('drought_tolerance')) {
                $drought_tolerance_sel_arr = $request->get('drought_tolerance');
            }
            if($request->has('wet_feet_tolerance')) {
                $wet_feet_tolerance_sel_arr = $request->get('wet_feet_tolerance');
            }
            if($request->has('humidity_tolerance')) {
                $humidity_tolerance_sel_arr = $request->get('humidity_tolerance');
            }
            if($request->has('wind_tolerence')) {
                $wind_tolerence_sel_arr = $request->get('wind_tolerence');
            }
            if($request->has('poor_soil_tolerance')) {
                $poor_soil_tolerance_sel_arr = $request->get('poor_soil_tolerance');
            }
            if($request->has('growth_rate')) {
                $growth_rate_sel_arr = $request->get('growth_rate');
            }
            if($request->has('service_life')) {
                $service_life_sel_arr = $request->get('service_life');
            }
            if($request->has('maintenance_requirements')) {
                $maintenance_requirements_sel_arr = $request->get('maintenance_requirements');
            }
            if($request->has('spreading_potential')) {
                $spreading_potential_sel_arr = $request->get('spreading_potential');
            }
            if($request->has('yearly_trimming_tips')) {
                $yearly_trimming_tips_sel_arr = $request->get('yearly_trimming_tips');
            }


            if($request->has('plant_grouping_size')) {
                $plant_grouping_size_sel_arr = $request->get('plant_grouping_size');
            }
            if($request->has('best_side_of_house')) {
                $best_side_of_house_sel_arr = $request->get('best_side_of_house');
            }
            if($request->has('extreme_planting_locations')) {
                $extreme_planting_locations_sel_arr = $request->get('extreme_planting_locations');
            }
            if($request->has('ornamental_features')) {
                $ornamental_features_sel_arr = $request->get('ornamental_features');
            }
            if($request->has('special_landscape_uses')) {
                $special_landscape_uses_sel_arr = $request->get('special_landscape_uses');
            }
            if($request->has('possible_pest_problems')) {
                $possible_pest_problems_sel_arr = $request->get('possible_pest_problems');
            }
            if($request->has('plant_limitations')) {
                $plant_limitations_sel_arr = $request->get('plant_limitations');
            }







                if(!empty($where_query1)) {
                    //$where_query1['status'] = 'ACTIVE';
                    $product_lists = DB::table('products')
                        ->where($where_query)
                        //->whereBetween('retail_sale_price_a', [$where_query1['min_price'],$where_query1['max_price']])
                        //->orWhere('retail_sale_price_a', '=', null)

                        //->where('max_zone', '<=', $where_query1['max_zone'])
                        ->Where(function ($query) use($query1) {
                            if($query1!='all') {
                                $query->where('botanical_name', 'like', $query1 . '%');
                            }
                        })
                        ->Where(function ($query) use($request,$where_query1) {
                            if(!empty($request->get('min_zone'))) {
                                $query->where('min_zone', '>=', $where_query1['min_zone']);
                            }
                            if(!empty($request->get('max_zone'))) {
                                $query->where('max_zone', '<=', $where_query1['max_zone']);
                            }
                        })
                        ->Where(function ($query) use($request,$where_query1) {

                            if($request->get('category') == 'other-products') {
                                $query->where('other_product_service_name', '<>',  '');
                                $query->orWhere('other_product_service_name', '<>',  null);
                            }
                            elseif($request->get('category') == 'retired-plants') {
                                $query->where('other_product_service_name', '=',  '');
                                $query->orWhere('other_product_service_name', '=',  null);
                                $query->where('status', '<>',  'Active');
                                $query->orWhere('status', '=',  null);
                            }
                            elseif($request->get('category') == 'all-in-library') {
                                $query->where('other_product_service_name', '=',  '');
                                $query->orWhere('other_product_service_name', '=',  null);
                            }
                            else {
                                $query->where('status', '=',  'Active');
                                $query->where(function($query) {
                                    $query->orWhere('retail_sale_price_a', '<>',  '')->orWhere('retail_sale_price_a', '<>',  null)->orWhere('retail_sale_price_b', '<>',  '')->orWhere('retail_sale_price_b', '<>',  null)->orWhere('retail_sale_price_c', '<>',  '')->orWhere('retail_sale_price_c', '<>',  null);
                                });
                            }
                        })
                        ->Where(function ($query) use($sunlight_sel_arr) {
                            for ($i = 0; $i < count($sunlight_sel_arr); $i++){
                                $query->where('sunlight', 'like',  '%' . $sunlight_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($water_rainfall_sel_arr) {
                            for ($i = 0; $i < count($water_rainfall_sel_arr); $i++){
                                $query->where('water_rainfall', 'like',  '%' . $water_rainfall_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($soil_quality_sel_arr) {
                            for ($i = 0; $i < count($soil_quality_sel_arr); $i++){
                                $query->where('soil_quality', 'like',  '%' . $soil_quality_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($bloom_season_sel_arr) {
                            for ($i = 0; $i < count($bloom_season_sel_arr); $i++){
                                $query->where('bloom_season', 'like',  '%' . $bloom_season_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($flower_color_sel_arr) {
                            for ($i = 0; $i < count($flower_color_sel_arr); $i++){
                                $query->where('flower_color', 'like',  '%,' . $flower_color_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($berry_fruit_color_sel_arr) {
                            for ($i = 0; $i < count($berry_fruit_color_sel_arr); $i++){
                                $query->where('berry_fruit_color', 'like',  '%' . $berry_fruit_color_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($spring_foliage_color_sel_arr) {
                            for ($i = 0; $i < count($spring_foliage_color_sel_arr); $i++){
                                $query->where('spring_foliage_color', 'like',  '%' . $spring_foliage_color_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($summer_foliage_color_sel_arr) {
                            for ($i = 0; $i < count($summer_foliage_color_sel_arr); $i++){
                                $query->where('summer_foliage_color', 'like',  '%' . $summer_foliage_color_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($fall_foliage_color_sel_arr) {
                            for ($i = 0; $i < count($fall_foliage_color_sel_arr); $i++){
                                $query->where('fall_foliage_color', 'like',  '%' . $fall_foliage_color_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($has_evergreen_foliage_sel_arr) {
                            for ($i = 0; $i < count($has_evergreen_foliage_sel_arr); $i++){
                                $query->where('has_evergreen_foliage', 'like',  '%' . $has_evergreen_foliage_sel_arr [$i] .'%');
                            }
                        })
                        ->Where(function ($query) use($has_winter_interest_sel_arr) {
                            for ($i = 0; $i < count($has_winter_interest_sel_arr); $i++){
                                $query->where('has_winter_interest', 'like',  '%' . $has_winter_interest_sel_arr [$i] .'%');
                            }
                        })
                        ->Where(function ($query) use($scented_flowers_sel_arr) {
                            for ($i = 0; $i < count($scented_flowers_sel_arr); $i++){
                                $query->where('scented_flowers', 'like',  '%' . $scented_flowers_sel_arr [$i] .'%');
                            }
                        })
                        ->Where(function ($query) use($drought_tolerance_sel_arr) {
                            for ($i = 0; $i < count($drought_tolerance_sel_arr); $i++){
                                $query->where('drought_tolerance', 'like',  '%' . $drought_tolerance_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($wet_feet_tolerance_sel_arr) {
                            for ($i = 0; $i < count($wet_feet_tolerance_sel_arr); $i++){
                                $query->where('wet_feet_tolerance', 'like',  '%' . $wet_feet_tolerance_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($humidity_tolerance_sel_arr) {
                            for ($i = 0; $i < count($humidity_tolerance_sel_arr); $i++){
                                $query->where('humidity_tolerance', 'like',  '%' . $humidity_tolerance_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($wind_tolerence_sel_arr) {
                            for ($i = 0; $i < count($wind_tolerence_sel_arr); $i++){
                                $query->where('wind_tolerence', 'like',  '%' . $wind_tolerence_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($poor_soil_tolerance_sel_arr) {
                            for ($i = 0; $i < count($poor_soil_tolerance_sel_arr); $i++){
                                $query->where('poor_soil_tolerance', 'like',  '%' . $poor_soil_tolerance_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($growth_rate_sel_arr) {
                            for ($i = 0; $i < count($growth_rate_sel_arr); $i++){
                                $query->where('growth_rate', 'like',  '%' . $growth_rate_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($service_life_sel_arr) {
                            for ($i = 0; $i < count($service_life_sel_arr); $i++){
                                $query->where('service_life', '=',  ','.$service_life_sel_arr [$i] );
                            }
                        })
                        ->Where(function ($query) use($maintenance_requirements_sel_arr) {
                            for ($i = 0; $i < count($maintenance_requirements_sel_arr); $i++){
                                //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                $query->where('maintenance_requirements', '=',  $maintenance_requirements_sel_arr [$i] );
                            }
                        })
                        ->Where(function ($query) use($spreading_potential_sel_arr) {
                            for ($i = 0; $i < count($spreading_potential_sel_arr); $i++){
                                //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                $query->where('spreading_potential', '=',  $spreading_potential_sel_arr [$i] );
                            }
                        })
                        ->Where(function ($query) use($yearly_trimming_tips_sel_arr) {
                            for ($i = 0; $i < count($yearly_trimming_tips_sel_arr); $i++){
                                //$query->where('sunlight', 'like',  '%' . $yearly_trimming_tips_sel_arr [$i] .',%');
                                $query->where('yearly_trimming_tips', '=',  $yearly_trimming_tips_sel_arr [$i] );
                            }
                        })
                        ->Where(function ($query) use($plant_grouping_size_sel_arr) {
                            for ($i = 0; $i < count($plant_grouping_size_sel_arr); $i++){
                                $query->where('plant_grouping_size', 'like',  '%' . $plant_grouping_size_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($best_side_of_house_sel_arr) {
                            for ($i = 0; $i < count($best_side_of_house_sel_arr); $i++){
                                //$query->where('best_side_of_house', '=',  ' . $best_side_of_house_sel_arr [$i] .');
                                $query->where('best_side_of_house', 'like',  '%' . $best_side_of_house_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($extreme_planting_locations_sel_arr) {
                            for ($i = 0; $i < count($extreme_planting_locations_sel_arr); $i++){
                                //$query->where('extreme_planting_locations', '=',  ' . $extreme_planting_locations_sel_arr [$i] .');
                                $query->where('extreme_planting_locations', 'like',  '%' . $extreme_planting_locations_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($ornamental_features_sel_arr) {
                            for ($i = 0; $i < count($ornamental_features_sel_arr); $i++){
                                //$query->where('ornamental_features', '=',  ' . $ornamental_features_sel_arr [$i] .');
                                $query->where('ornamental_features', 'like',  '%' . $ornamental_features_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($special_landscape_uses_sel_arr) {
                            for ($i = 0; $i < count($special_landscape_uses_sel_arr); $i++){
                                //$query->where('special_landscape_uses', '=',  ' . $special_landscape_uses_sel_arr [$i] .');
                                $query->where('special_landscape_uses', 'like',  '%' . $special_landscape_uses_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($possible_pest_problems_sel_arr) {
                            for ($i = 0; $i < count($possible_pest_problems_sel_arr); $i++){
                                //$query->where('possible_pest_problems', '=',  ' . $possible_pest_problems_sel_arr [$i] .');
                                $query->where('possible_pest_problems', 'like',  '%' . $possible_pest_problems_sel_arr [$i] .',%');
                            }
                        })
                        ->Where(function ($query) use($plant_limitations_sel_arr) {
                            for ($i = 0; $i < count($plant_limitations_sel_arr); $i++){
                                $query->where('plant_limitations', 'like',  '%' . $plant_limitations_sel_arr [$i] .',%');
                            }
                        })->orderBy($sortby,$sort)
                        ->paginate(50);
                }
                else {
                    $product_lists = DB::table('products')
                        ->where($where_query)->orderBy($sortby,$sort)
                        ->paginate(50);
                }


            $final_array = array();

            foreach ($product_lists as $product_list) {

                $rand = rand(1,10);
                $product_list->image = $rand.'.jpg';
                $final_array[] = $product_list;
            }

            $total_product_count = DB::table('products')
                //->where('status','ACTIVE')
                ->count();


            $sel_products = DB::table('products')
                ->select('sunlight', 'water_rainfall', 'soil_quality', 'bloom_season', 'flower_color', 'berry_fruit_color', 'spring_foliage_color', 'summer_foliage_color', 'fall_foliage_color', 'has_evergreen_foliage', 'has_winter_interest', 'scented_flowers', 'drought_tolerance', 'wet_feet_tolerance', 'humidity_tolerance', 'wind_tolerence', 'poor_soil_tolerance', 'growth_rate', 'service_life', 'maintenance_requirements', 'spreading_potential', 'yearly_trimming_tips','plant_grouping_size','best_side_of_house','extreme_planting_locations','ornamental_features','special_landscape_uses','possible_pest_problems','plant_limitations')->orderBy('botanical_name', 'ASC')
                ->get();
            if(!empty($sel_products)) {
                $sunlight_arr = array();
                $water_rainfall_arr = array();
                $soil_quality_arr = array();
                $bloom_season_arr = array();
                $flower_color_arr = array();
                $berry_fruit_color_arr = array();
                $spring_foliage_color_arr = array();
                $summer_foliage_color_arr = array();
                $fall_foliage_color_arr = array();
                $has_evergreen_foliage_arr = array();
                $has_winter_interest_arr = array();
                $scented_flowers_arr = array();
                $drought_tolerance_arr = array();
                $wet_feet_tolerance_arr = array();
                $humidity_tolerance_arr = array();
                $wind_tolerence_arr = array();
                $poor_soil_tolerance_arr = array();
                $growth_rate_arr = array();
                $service_life_arr = array();
                $maintenance_requirements_arr = array();
                $spreading_potential_arr = array();
                $yearly_trimming_tips_arr = array();

                $plant_grouping_size_arr = array();
                $best_side_of_house_arr = array();
                $extreme_planting_locations_arr = array();
                $ornamental_features_arr = array();
                $special_landscape_uses_arr = array();
                $possible_pest_problems_arr = array();
                $plant_limitations_arr = array();

                foreach ($sel_products as $sel_product) {
                    if(!empty($sel_product->sunlight)) {
                        $arr = explode(',',rtrim($sel_product->sunlight, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $sunlight_arr)) {
                                    $sunlight_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->water_rainfall)) {
                        $arr = explode(',',rtrim($sel_product->water_rainfall, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $water_rainfall_arr)) {
                                    $water_rainfall_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->soil_quality)) {
                        $arr = explode(',',rtrim($sel_product->soil_quality, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $soil_quality_arr)) {
                                    $soil_quality_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->bloom_season)) {
                        $arr = explode(',',rtrim($sel_product->bloom_season, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $bloom_season_arr)) {
                                    $bloom_season_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->flower_color)) {
                        $arr = explode(',',rtrim($sel_product->flower_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $flower_color_arr)) {
                                    $flower_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->berry_fruit_color)) {
                        $arr = explode(',',rtrim($sel_product->berry_fruit_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $berry_fruit_color_arr)) {
                                    $berry_fruit_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->spring_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->spring_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spring_foliage_color_arr)) {
                                    $spring_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->summer_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->summer_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $summer_foliage_color_arr)) {
                                    $summer_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->fall_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->fall_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $fall_foliage_color_arr)) {
                                    $fall_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_evergreen_foliage)) {
                        $arr = explode(',',rtrim($sel_product->has_evergreen_foliage, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_evergreen_foliage_arr)) {
                                    $has_evergreen_foliage_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_winter_interest)) {
                        $arr = explode(',',rtrim($sel_product->has_winter_interest, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_winter_interest_arr)) {
                                    $has_winter_interest_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->scented_flowers)) {
                        $arr = explode(',',rtrim($sel_product->scented_flowers, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $scented_flowers_arr)) {
                                    $scented_flowers_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->drought_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->drought_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $drought_tolerance_arr)) {
                                    $drought_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wet_feet_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->wet_feet_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wet_feet_tolerance_arr)) {
                                    $wet_feet_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->humidity_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->humidity_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $humidity_tolerance_arr)) {
                                    $humidity_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wind_tolerence)) {
                        $arr = explode(',',rtrim($sel_product->wind_tolerence, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wind_tolerence_arr)) {
                                    $wind_tolerence_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->poor_soil_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->poor_soil_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $poor_soil_tolerance_arr)) {
                                    $poor_soil_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->growth_rate)) {
                        $arr = explode(',',rtrim($sel_product->growth_rate, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $growth_rate_arr)) {
                                    $growth_rate_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->service_life)) {
                        $arr = explode(',',rtrim($sel_product->service_life, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $service_life_arr)) {
                                    $service_life_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->maintenance_requirements)) {
                        $arr = explode(',',rtrim($sel_product->maintenance_requirements, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $maintenance_requirements_arr)) {
                                    $maintenance_requirements_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->spreading_potential)) {
                        $arr = explode(',',rtrim($sel_product->spreading_potential, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spreading_potential_arr)) {
                                    $spreading_potential_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->yearly_trimming_tips)) {
                        $arr = explode(',',rtrim($sel_product->yearly_trimming_tips, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $yearly_trimming_tips_arr)) {
                                    $yearly_trimming_tips_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_grouping_size)) {
                        $arr = explode(',',rtrim($sel_product->plant_grouping_size, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_grouping_size_arr)) {
                                    $plant_grouping_size_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->best_side_of_house)) {
                        $arr = explode(',',rtrim($sel_product->best_side_of_house, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $best_side_of_house_arr)) {
                                    $best_side_of_house_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->extreme_planting_locations)) {
                        $arr = explode(',',rtrim($sel_product->extreme_planting_locations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $extreme_planting_locations_arr)) {
                                    $extreme_planting_locations_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->ornamental_features)) {
                        $arr = explode(',',rtrim($sel_product->ornamental_features, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $ornamental_features_arr)) {
                                    $ornamental_features_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->special_landscape_uses)) {
                        $arr = explode(',',rtrim($sel_product->special_landscape_uses, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $special_landscape_uses_arr)) {
                                    $special_landscape_uses_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->possible_pest_problems)) {
                        $arr = explode(',',rtrim($sel_product->possible_pest_problems, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $possible_pest_problems_arr)) {
                                    $possible_pest_problems_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_limitations)) {
                        $arr = explode(',',rtrim($sel_product->plant_limitations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_limitations_arr)) {
                                    $plant_limitations_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                }

                sort($sunlight_arr);
                sort($water_rainfall_arr);
                sort($soil_quality_arr);
                sort($bloom_season_arr);
                sort($flower_color_arr);
                sort($berry_fruit_color_arr);
                sort($spring_foliage_color_arr);
                sort($summer_foliage_color_arr);
                /*print_r($fall_foliage_color_arr);
                exit;*/
                sort($fall_foliage_color_arr);
                sort($has_evergreen_foliage_arr);
                sort($has_winter_interest_arr);
                sort($scented_flowers_arr);
                sort($drought_tolerance_arr);
                sort($wet_feet_tolerance_arr);
                sort($humidity_tolerance_arr);
                sort($wind_tolerence_arr);
                sort($poor_soil_tolerance_arr);
                sort($growth_rate_arr);
                sort($service_life_arr);
                sort($maintenance_requirements_arr);
                sort($spreading_potential_arr);
                sort($yearly_trimming_tips_arr);

                sort($plant_grouping_size_arr);
                sort($best_side_of_house_arr);
                sort($extreme_planting_locations_arr);
                sort($ornamental_features_arr);
                sort($special_landscape_uses_arr);
                sort($possible_pest_problems_arr);
                sort($plant_limitations_arr);
            }
        }









        return view('product.frontend_product_list', [
            'products' => $final_array,
            'product_paginate' => $product_lists,
            'total_product_count' => $total_product_count,
            'zoneArray' => $zoneArray,

            'sunlight_arr' => $sunlight_arr,
            'water_rainfall_arr' => $water_rainfall_arr,
            'soil_quality_arr' => $soil_quality_arr,
            'bloom_season_arr' => $bloom_season_arr,
            'flower_color_arr' => $flower_color_arr,
            'berry_fruit_color_arr' => $berry_fruit_color_arr,
            'spring_foliage_color_arr' => $spring_foliage_color_arr,
            'summer_foliage_color_arr' => $summer_foliage_color_arr,
            'fall_foliage_color_arr' => $fall_foliage_color_arr,
            'has_evergreen_foliage_arr' => $has_evergreen_foliage_arr,
            'has_winter_interest_arr' => $has_winter_interest_arr,
            'scented_flowers_arr' => $scented_flowers_arr,
            'drought_tolerance_arr' => $drought_tolerance_arr,
            'wet_feet_tolerance_arr' => $wet_feet_tolerance_arr,
            'humidity_tolerance_arr' => $humidity_tolerance_arr,
            'wind_tolerence_arr' => $wind_tolerence_arr,
            'poor_soil_tolerance_arr' => $poor_soil_tolerance_arr,
            'growth_rate_arr' => $growth_rate_arr,
            'service_life_arr' => $service_life_arr,
            'maintenance_requirements_arr' => $maintenance_requirements_arr,
            'spreading_potential_arr' => $spreading_potential_arr,
            'yearly_trimming_tips_arr' => $yearly_trimming_tips_arr,


            'plant_grouping_size_arr' => $plant_grouping_size_arr,
            'best_side_of_house_arr' => $best_side_of_house_arr,
            'extreme_planting_locations_arr' => $extreme_planting_locations_arr,
            'ornamental_features_arr' => $ornamental_features_arr,
            'special_landscape_uses_arr' => $special_landscape_uses_arr,
            'possible_pest_problems_arr' => $possible_pest_problems_arr,
            'plant_limitations_arr' => $plant_limitations_arr,
        ]);
    }

    public function products(Request $request) {
        $zoneArray = array(
            '1'=>'1a','1.5'=>'1b',
            '2'=>'2a','2.5'=>'2b',
            '3'=>'3a','3.5'=>'3b',
            '4'=>'4a','4.5'=>'4b',
            '5'=>'5a','5.5'=>'5b',
            '6'=>'6a','6.5'=>'6b',
            '7'=>'7a','7.5'=>'7b',
            '8'=>'8a','8.5'=>'8b',
            '9'=>'9a','9.5'=>'9b',
            '10'=>'10a','10.5'=>'10b',
            '11'=>'11a','11.5'=>'11b',
            '12'=>'12a','12.5'=>'12b',
            '13'=>'13a','13.5'=>'13b'
        );

        $where_query= array();

        //dd($request);

        if($request->get('search_type') == 'partial') {

            if(!empty($request->get('category'))) {
                if($request->get('category') == 'best-sellers') {
                    $where_query['best_sellers'] = 'YES';
                }
                else if($request->get('category') == 'new-for-this-year') {
                    $where_query['new_for_this_year'] = 'YES';
                }
            }

            /*if($request->has('PLANTTYPE')) {
                foreach ($request->get('PLANTTYPE') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }

            if($request->has('GARDENCATEGORIES')) {
                foreach ($request->get('GARDENCATEGORIES') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }*/


            if(!empty($request->get('amount'))) {
                $amount_arr = explode(' - ', $request->get('amount'));
                $where_query1['min_price'] = str_replace('$','',$amount_arr[0]);
                $where_query1['max_price'] = str_replace('$','',$amount_arr[1]);
            }
            else {
                $where_query1['min_price'] = 0;
                $where_query1['max_price'] = 1000000000;
            }

            if(!empty($request->get('min_zone')) && empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = 13.5;
            }
            else if(!empty($request->get('max_zone')) && empty($request->get('min_zone'))) {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else if(!empty($request->get('min_zone')) && !empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = 13.5;
            }
            $sunlight_sel_arr = array();
            $water_rainfall_sel_arr = array();
            $soil_quality_sel_arr = array();
            $bloom_season_sel_arr = array();
            $flower_color_sel_arr = array();
            $berry_fruit_color_sel_arr = array();
            $spring_foliage_color_sel_arr = array();
            $summer_foliage_color_sel_arr = array();
            $fall_foliage_color_sel_arr = array();
            $has_evergreen_foliage_sel_arr = array();
            $has_winter_interest_sel_arr = array();
            $scented_flowers_sel_arr = array();
            $drought_tolerance_sel_arr = array();
            $wet_feet_tolerance_sel_arr = array();
            $humidity_tolerance_sel_arr = array();
            $wind_tolerence_sel_arr = array();
            $poor_soil_tolerance_sel_arr = array();
            $growth_rate_sel_arr = array();
            $service_life_sel_arr = array();
            $maintenance_requirements_sel_arr = array();
            $spreading_potential_sel_arr = array();
            $yearly_trimming_tips_sel_arr = array();

            $plant_grouping_size_sel_arr = array();
            $best_side_of_house_sel_arr = array();
            $extreme_planting_locations_sel_arr = array();
            $ornamental_features_sel_arr = array();
            $special_landscape_uses_sel_arr = array();
            $possible_pest_problems_sel_arr = array();
            $plant_limitations_sel_arr = array();
            $planttype_sel_arr = array();
            $gardencat_sel_arr = array();

            if($request->has('PLANTTYPE')) {
                $planttype_sel_arr = $request->get('PLANTTYPE');
            }
            if($request->has('GARDENCATEGORIES')) {
                $gardencat_sel_arr = $request->get('GARDENCATEGORIES');
            }

            if($request->has('sunlight')) {
                $sunlight_sel_arr = $request->get('sunlight');
            }
            if($request->has('water_rainfall')) {
                $water_rainfall_sel_arr = $request->get('water_rainfall');
            }
            if($request->has('soil_quality')) {
                $soil_quality_sel_arr = $request->get('soil_quality');
            }
            if($request->has('bloom_season')) {
                $bloom_season_sel_arr = $request->get('bloom_season');
            }
            if($request->has('flower_color')) {
                $flower_color_sel_arr = $request->get('flower_color');
            }
            if($request->has('berry_fruit_color')) {
                $berry_fruit_color_sel_arr = $request->get('berry_fruit_color');
            }
            if($request->has('spring_foliage_color')) {
                $spring_foliage_color_sel_arr = $request->get('spring_foliage_color');
            }
            if($request->has('summer_foliage_color')) {
                $summer_foliage_color_sel_arr = $request->get('summer_foliage_color');
            }
            if($request->has('fall_foliage_color')) {
                $fall_foliage_color_sel_arr = $request->get('fall_foliage_color');
            }
            if($request->has('has_evergreen_foliage')) {
                $has_evergreen_foliage_sel_arr = $request->get('has_evergreen_foliage');
            }



            if($request->has('has_winter_interest')) {
                $has_winter_interest_sel_arr = $request->get('has_winter_interest');
            }
            if($request->has('scented_flowers')) {
                $scented_flowers_sel_arr = $request->get('scented_flowers');
            }
            if($request->has('drought_tolerance')) {
                $drought_tolerance_sel_arr = $request->get('drought_tolerance');
            }
            if($request->has('wet_feet_tolerance')) {
                $wet_feet_tolerance_sel_arr = $request->get('wet_feet_tolerance');
            }
            if($request->has('humidity_tolerance')) {
                $humidity_tolerance_sel_arr = $request->get('humidity_tolerance');
            }
            if($request->has('wind_tolerence')) {
                $wind_tolerence_sel_arr = $request->get('wind_tolerence');
            }
            if($request->has('poor_soil_tolerance')) {
                $poor_soil_tolerance_sel_arr = $request->get('poor_soil_tolerance');
            }
            if($request->has('growth_rate')) {
                $growth_rate_sel_arr = $request->get('growth_rate');
            }
            if($request->has('service_life')) {
                $service_life_sel_arr = $request->get('service_life');
            }
            //dd($service_life_sel_arr);
            if($request->has('maintenance_requirements')) {
                $maintenance_requirements_sel_arr = $request->get('maintenance_requirements');
            }
            if($request->has('spreading_potential')) {
                $spreading_potential_sel_arr = $request->get('spreading_potential');
            }
            if($request->has('yearly_trimming_tips')) {
                $yearly_trimming_tips_sel_arr = $request->get('yearly_trimming_tips');
            }


            if($request->has('plant_grouping_size')) {
                $plant_grouping_size_sel_arr = $request->get('plant_grouping_size');
            }
            if($request->has('best_side_of_house')) {
                $best_side_of_house_sel_arr = $request->get('best_side_of_house');
            }
            if($request->has('extreme_planting_locations')) {
                $extreme_planting_locations_sel_arr = $request->get('extreme_planting_locations');
            }
            if($request->has('ornamental_features')) {
                $ornamental_features_sel_arr = $request->get('ornamental_features');
            }
            if($request->has('special_landscape_uses')) {
                $special_landscape_uses_sel_arr = $request->get('special_landscape_uses');
            }
            if($request->has('possible_pest_problems')) {
                $possible_pest_problems_sel_arr = $request->get('possible_pest_problems');
            }
            if($request->has('plant_limitations')) {
                $plant_limitations_sel_arr = $request->get('plant_limitations');
            }


            $sortby = "botanical_name";
            $sort = "asc";

            if(!empty($request->sortby)) {
                if($request->sortby == 'name_asc') {
                    $sortby = "botanical_name";
                    $sort = "asc";
                }
                else if($request->sortby == 'name_desc') {
                    $sortby = "botanical_name";
                    $sort = "desc";
                }
                else if($request->sortby == 'price_desc') {
                    $sortby = "retail_sale_price_a";
                    $sort = "desc";
                }
                else if($request->sortby == 'price_asc') {
                    $sortby = "retail_sale_price_a";
                    $sort = "asc";
                }
            }



            if(!empty($where_query1)) {
                //$where_query1['status'] = 'ACTIVE';
                $product_lists = Product::
                    where($where_query)
                    ->Where(function ($query) use($request,$where_query1) {
                        if(!empty($request->get('min_zone'))) {
                            $query->where('min_zone', '>=', $where_query1['min_zone']);
                        }
                        if(!empty($request->get('max_zone'))) {
                            $query->where('max_zone', '<=', $where_query1['max_zone']);
                        }
                    })
                    ->Where(function ($query) use($request,$where_query1) {

                        if($request->get('category') == 'other-products') {
                            $query->where('other_product_service_name', '<>',  '');
                            $query->orWhere('other_product_service_name', '<>',  null);
                        }
                        elseif($request->get('category') == 'retired-plants') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                            $query->where('status', '<>',  'Active');
                            $query->orWhere('status', '=',  null);
                        }
                        elseif($request->get('category') == 'all-in-library') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                        }
                        else {
                            $query->where('status', '=',  'Active');
                            $query->where(function($query) {
                                $query->orWhere('retail_sale_price_a', '<>',  '')->orWhere('retail_sale_price_a', '<>',  null)->orWhere('retail_sale_price_b', '<>',  '')->orWhere('retail_sale_price_b', '<>',  null)->orWhere('retail_sale_price_c', '<>',  '')->orWhere('retail_sale_price_c', '<>',  null);
                            });
                        }
                    })
                    ->Where(function ($query) use($planttype_sel_arr) {
                        for ($i = 0; $i < count($planttype_sel_arr); $i++){
                            $query->orWhere($planttype_sel_arr [$i], '=',  'YES');
                        }
                    })

                    ->Where(function ($query) use($gardencat_sel_arr,$sunlight_sel_arr,$water_rainfall_sel_arr,$soil_quality_sel_arr,$bloom_season_sel_arr,$flower_color_sel_arr,$berry_fruit_color_sel_arr,$spring_foliage_color_sel_arr,$summer_foliage_color_sel_arr,$fall_foliage_color_sel_arr,$has_evergreen_foliage_sel_arr,$has_winter_interest_sel_arr,$scented_flowers_sel_arr,$drought_tolerance_sel_arr,$wet_feet_tolerance_sel_arr,$humidity_tolerance_sel_arr,$wind_tolerence_sel_arr,$poor_soil_tolerance_sel_arr,$growth_rate_sel_arr,$service_life_sel_arr,$maintenance_requirements_sel_arr,$spreading_potential_sel_arr,$yearly_trimming_tips_sel_arr,$plant_grouping_size_sel_arr,$best_side_of_house_sel_arr,$extreme_planting_locations_sel_arr,$ornamental_features_sel_arr,$special_landscape_uses_sel_arr,$possible_pest_problems_sel_arr,$plant_limitations_sel_arr) {

                        $query->orWhere(function ($query) use ($gardencat_sel_arr) {
                            for ($i = 0; $i < count($gardencat_sel_arr); $i++) {
                                $query->orWhere($gardencat_sel_arr [$i], '=', 'YES');
                            }
                        })
                            ->orWhere(function ($query) use ($sunlight_sel_arr) {
                                for ($i = 0; $i < count($sunlight_sel_arr); $i++) {
                                    $query->orWhere('sunlight', 'like', '%,' . $sunlight_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($water_rainfall_sel_arr) {
                                for ($i = 0; $i < count($water_rainfall_sel_arr); $i++) {
                                    $query->orWhere('water_rainfall', 'like', '%,' . $water_rainfall_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($soil_quality_sel_arr) {
                                for ($i = 0; $i < count($soil_quality_sel_arr); $i++) {
                                    $query->orWhere('soil_quality', 'like', '%,' . $soil_quality_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($bloom_season_sel_arr) {
                                for ($i = 0; $i < count($bloom_season_sel_arr); $i++) {
                                    $query->orWhere('bloom_season', 'like', '%,' . $bloom_season_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($flower_color_sel_arr) {
                                for ($i = 0; $i < count($flower_color_sel_arr); $i++) {
                                    $query->orWhere('flower_color', 'like', '%,' . $flower_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($berry_fruit_color_sel_arr) {
                                for ($i = 0; $i < count($berry_fruit_color_sel_arr); $i++) {
                                    $query->orWhere('berry_fruit_color', 'like', '%,' . $berry_fruit_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($spring_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($spring_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('spring_foliage_color', 'like', '%,' . $spring_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($summer_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($summer_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('summer_foliage_color', 'like', '%,' . $summer_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($fall_foliage_color_sel_arr) {
                                for ($i = 0; $i < count($fall_foliage_color_sel_arr); $i++) {
                                    $query->orWhere('fall_foliage_color', 'like', '%,' . $fall_foliage_color_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($has_evergreen_foliage_sel_arr) {
                                for ($i = 0; $i < count($has_evergreen_foliage_sel_arr); $i++) {
                                    $query->orWhere('has_evergreen_foliage', 'like', '%' . $has_evergreen_foliage_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($has_winter_interest_sel_arr) {
                                for ($i = 0; $i < count($has_winter_interest_sel_arr); $i++) {
                                    $query->orWhere('has_winter_interest', 'like', '%,' . $has_winter_interest_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($scented_flowers_sel_arr) {
                                for ($i = 0; $i < count($scented_flowers_sel_arr); $i++) {
                                    $query->orWhere('scented_flowers', 'like', '%,' . $scented_flowers_sel_arr [$i] . '%');
                                }
                            })
                            ->orWhere(function ($query) use ($drought_tolerance_sel_arr) {
                                for ($i = 0; $i < count($drought_tolerance_sel_arr); $i++) {
                                    $query->orWhere('drought_tolerance', 'like', '%,' . $drought_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($wet_feet_tolerance_sel_arr) {
                                for ($i = 0; $i < count($wet_feet_tolerance_sel_arr); $i++) {
                                    $query->orWhere('wet_feet_tolerance', 'like', '%,' . $wet_feet_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($humidity_tolerance_sel_arr) {
                                for ($i = 0; $i < count($humidity_tolerance_sel_arr); $i++) {
                                    $query->orWhere('humidity_tolerance', 'like', '%,' . $humidity_tolerance_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($wind_tolerence_sel_arr) {
                                for ($i = 0; $i < count($wind_tolerence_sel_arr); $i++) {
                                    $query->orWhere('wind_tolerence', 'like', '%,' . $wind_tolerence_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($poor_soil_tolerance_sel_arr) {
                                for ($i = 0; $i < count($poor_soil_tolerance_sel_arr); $i++) {
                                    $query->orWhere('poor_soil_tolerance', 'like', '%,' . $poor_soil_tolerance_sel_arr [$i] . ',%');
                                }
                            })

                            ->orWhere(function ($query) use ($growth_rate_sel_arr) {
                                for ($i = 0; $i < count($growth_rate_sel_arr); $i++) {
                                    $query->orWhere('growth_rate', 'like', '%,' . $growth_rate_sel_arr [$i] . ',%');
                                }
                            })

                            ->orWhere(function ($query) use ($service_life_sel_arr) {
                                for ($i = 0; $i < count($service_life_sel_arr); $i++) {
                                    //$query->orWhere('service_life', 'like', '%,' . $service_life_sel_arr [$i] . ',%');
                                    $query->orWhere('service_life', '=', ','.$service_life_sel_arr [$i]);
                                }
                            })

                            ->orWhere(function ($query) use ($maintenance_requirements_sel_arr) {
                                for ($i = 0; $i < count($maintenance_requirements_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                    $query->orWhere('maintenance_requirements', '=', $maintenance_requirements_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($spreading_potential_sel_arr) {
                                for ($i = 0; $i < count($spreading_potential_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                                    $query->orWhere('spreading_potential', '=', $spreading_potential_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($yearly_trimming_tips_sel_arr) {
                                for ($i = 0; $i < count($yearly_trimming_tips_sel_arr); $i++) {
                                    //$query->where('sunlight', 'like',  '%' . $yearly_trimming_tips_sel_arr [$i] .',%');
                                    $query->orWhere('yearly_trimming_tips', '=', $yearly_trimming_tips_sel_arr [$i]);
                                }
                            })
                            ->orWhere(function ($query) use ($plant_grouping_size_sel_arr) {
                                for ($i = 0; $i < count($plant_grouping_size_sel_arr); $i++) {
                                    $query->orWhere('plant_grouping_size', 'like', '%,' . $plant_grouping_size_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($best_side_of_house_sel_arr) {
                                for ($i = 0; $i < count($best_side_of_house_sel_arr); $i++) {
                                    $query->orWhere('best_side_of_house', 'like', '%,' . $best_side_of_house_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($extreme_planting_locations_sel_arr) {
                                for ($i = 0; $i < count($extreme_planting_locations_sel_arr); $i++) {
                                    $query->orWhere('extreme_planting_locations', 'like', '%,' . $extreme_planting_locations_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($ornamental_features_sel_arr) {
                                for ($i = 0; $i < count($ornamental_features_sel_arr); $i++) {
                                    $query->orWhere('ornamental_features', 'like', '%,' . $ornamental_features_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($special_landscape_uses_sel_arr) {
                                for ($i = 0; $i < count($special_landscape_uses_sel_arr); $i++) {
                                    $query->orWhere('special_landscape_uses', 'like', '%,' . $special_landscape_uses_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($possible_pest_problems_sel_arr) {
                                for ($i = 0; $i < count($possible_pest_problems_sel_arr); $i++) {
                                    $query->orWhere('possible_pest_problems', 'like', '%,' . $possible_pest_problems_sel_arr [$i] . ',%');
                                }
                            })
                            ->orWhere(function ($query) use ($plant_limitations_sel_arr) {
                                for ($i = 0; $i < count($plant_limitations_sel_arr); $i++) {
                                    $query->orWhere('plant_limitations', 'like', '%,' . $plant_limitations_sel_arr [$i] . ',%');
                                }
                            });
                    })->orderBy($sortby,$sort)
                    ->paginate(50);
            }
            else {
                $product_lists = DB::table('products')
                    ->where($where_query)->orderBy($sortby,$sort)
                    ->paginate(50);
            }


            $final_array = array();

            foreach ($product_lists as $product_list) {

                $rand = rand(1,10);
                $product_list->image = $rand.'.jpg';
                $final_array[] = $product_list;
            }

            $total_product_count = DB::table('products')
                //->where('status','ACTIVE')
                ->count();

            $sel_products = array();
            $sel_products = DB::table('products')
                ->select('sunlight', 'water_rainfall', 'soil_quality', 'bloom_season', 'flower_color', 'berry_fruit_color', 'spring_foliage_color', 'summer_foliage_color', 'fall_foliage_color', 'has_evergreen_foliage', 'has_winter_interest', 'scented_flowers', 'drought_tolerance', 'wet_feet_tolerance', 'humidity_tolerance', 'wind_tolerence', 'poor_soil_tolerance', 'growth_rate', 'service_life', 'maintenance_requirements', 'spreading_potential', 'yearly_trimming_tips','plant_grouping_size','best_side_of_house','extreme_planting_locations','ornamental_features','special_landscape_uses','possible_pest_problems','plant_limitations')->orderBy('botanical_name','ASC')
                ->get();
            if(!empty($sel_products)) {
                $sunlight_arr = array();
                $water_rainfall_arr = array();
                $soil_quality_arr = array();
                $bloom_season_arr = array();
                $flower_color_arr = array();
                $berry_fruit_color_arr = array();
                $spring_foliage_color_arr = array();
                $summer_foliage_color_arr = array();
                $fall_foliage_color_arr = array();
                $has_evergreen_foliage_arr = array();
                $has_winter_interest_arr = array();
                $scented_flowers_arr = array();
                $drought_tolerance_arr = array();
                $wet_feet_tolerance_arr = array();
                $humidity_tolerance_arr = array();
                $wind_tolerence_arr = array();
                $poor_soil_tolerance_arr = array();
                $growth_rate_arr = array();
                $service_life_arr = array();
                $maintenance_requirements_arr = array();
                $spreading_potential_arr = array();
                $yearly_trimming_tips_arr = array();

                $plant_grouping_size_arr = array();
                $best_side_of_house_arr = array();
                $extreme_planting_locations_arr = array();
                $ornamental_features_arr = array();
                $special_landscape_uses_arr = array();
                $possible_pest_problems_arr = array();
                $plant_limitations_arr = array();

                foreach ($sel_products as $sel_product) {
                    if(!empty($sel_product->sunlight)) {
                        $arr = explode(',',rtrim($sel_product->sunlight, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $sunlight_arr)) {
                                    $sunlight_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->water_rainfall)) {
                        $arr = explode(',',rtrim($sel_product->water_rainfall, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $water_rainfall_arr)) {
                                    $water_rainfall_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->soil_quality)) {
                        $arr = explode(',',rtrim($sel_product->soil_quality, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $soil_quality_arr)) {
                                    $soil_quality_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->bloom_season)) {
                        $arr = explode(',',rtrim($sel_product->bloom_season, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $bloom_season_arr)) {
                                    $bloom_season_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->flower_color)) {
                        $arr = explode(',',rtrim($sel_product->flower_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $flower_color_arr)) {
                                    $flower_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->berry_fruit_color)) {
                        $arr = explode(',',rtrim($sel_product->berry_fruit_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $berry_fruit_color_arr)) {
                                    $berry_fruit_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->spring_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->spring_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spring_foliage_color_arr)) {
                                    $spring_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->summer_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->summer_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $summer_foliage_color_arr)) {
                                    $summer_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->fall_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->fall_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $fall_foliage_color_arr)) {
                                    $fall_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_evergreen_foliage)) {
                        $arr = explode(',',rtrim($sel_product->has_evergreen_foliage, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_evergreen_foliage_arr)) {
                                    $has_evergreen_foliage_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_winter_interest)) {
                        $arr = explode(',',rtrim($sel_product->has_winter_interest, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_winter_interest_arr)) {
                                    $has_winter_interest_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->scented_flowers)) {
                        $arr = explode(',',rtrim($sel_product->scented_flowers, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $scented_flowers_arr)) {
                                    $scented_flowers_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->drought_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->drought_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $drought_tolerance_arr)) {
                                    $drought_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wet_feet_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->wet_feet_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wet_feet_tolerance_arr)) {
                                    $wet_feet_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->humidity_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->humidity_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $humidity_tolerance_arr)) {
                                    $humidity_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wind_tolerence)) {
                        $arr = explode(',',rtrim($sel_product->wind_tolerence, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wind_tolerence_arr)) {
                                    $wind_tolerence_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->poor_soil_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->poor_soil_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $poor_soil_tolerance_arr)) {
                                    $poor_soil_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->growth_rate)) {
                        $arr = explode(',',rtrim($sel_product->growth_rate, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $growth_rate_arr)) {
                                    $growth_rate_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->service_life)) {
                        $arr = explode(',',rtrim($sel_product->service_life, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $service_life_arr)) {
                                    $service_life_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->maintenance_requirements)) {
                        $arr = explode(',',rtrim($sel_product->maintenance_requirements, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $maintenance_requirements_arr)) {
                                    $maintenance_requirements_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->spreading_potential)) {
                        $arr = explode(',',rtrim($sel_product->spreading_potential, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spreading_potential_arr)) {
                                    $spreading_potential_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->yearly_trimming_tips)) {
                        $arr = explode(',',rtrim($sel_product->yearly_trimming_tips, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $yearly_trimming_tips_arr)) {
                                    $yearly_trimming_tips_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_grouping_size)) {
                        $arr = explode(',',rtrim($sel_product->plant_grouping_size, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_grouping_size_arr)) {
                                    $plant_grouping_size_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->best_side_of_house)) {
                        $arr = explode(',',rtrim($sel_product->best_side_of_house, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $best_side_of_house_arr)) {
                                    $best_side_of_house_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->extreme_planting_locations)) {
                        $arr = explode(',',rtrim($sel_product->extreme_planting_locations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $extreme_planting_locations_arr)) {
                                    $extreme_planting_locations_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->ornamental_features)) {
                        $arr = explode(',',rtrim($sel_product->ornamental_features, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $ornamental_features_arr)) {
                                    $ornamental_features_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->special_landscape_uses)) {
                        $arr = explode(',',rtrim($sel_product->special_landscape_uses, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $special_landscape_uses_arr)) {
                                    $special_landscape_uses_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->possible_pest_problems)) {
                        $arr = explode(',',rtrim($sel_product->possible_pest_problems, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $possible_pest_problems_arr)) {
                                    $possible_pest_problems_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_limitations)) {
                        $arr = explode(',',rtrim($sel_product->plant_limitations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_limitations_arr)) {
                                    $plant_limitations_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                }

                sort($sunlight_arr);
                sort($water_rainfall_arr);
                sort($soil_quality_arr);
                sort($bloom_season_arr);
                sort($flower_color_arr);
                sort($berry_fruit_color_arr);
                sort($spring_foliage_color_arr);
                sort($summer_foliage_color_arr);
                /*print_r($fall_foliage_color_arr);
                exit;*/
                sort($fall_foliage_color_arr);
                sort($has_evergreen_foliage_arr);
                sort($has_winter_interest_arr);
                sort($scented_flowers_arr);
                sort($drought_tolerance_arr);
                sort($wet_feet_tolerance_arr);
                sort($humidity_tolerance_arr);
                sort($wind_tolerence_arr);
                sort($poor_soil_tolerance_arr);
                sort($growth_rate_arr);
                sort($service_life_arr);
                sort($maintenance_requirements_arr);
                sort($spreading_potential_arr);
                sort($yearly_trimming_tips_arr);

                sort($plant_grouping_size_arr);
                sort($best_side_of_house_arr);
                sort($extreme_planting_locations_arr);
                sort($ornamental_features_arr);
                sort($special_landscape_uses_arr);
                sort($possible_pest_problems_arr);
                sort($plant_limitations_arr);
            }

        }
        else {

            if(!empty($request->get('category'))) {
                if($request->get('category') == 'best-sellers') {
                    $where_query['best_sellers'] = 'YES';
                }
                else if($request->get('category') == 'new-for-this-year') {
                    $where_query['new_for_this_year'] = 'YES';
                }
            }

            if($request->has('PLANTTYPE')) {
                foreach ($request->get('PLANTTYPE') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }

            if($request->has('GARDENCATEGORIES')) {
                foreach ($request->get('GARDENCATEGORIES') as $plantype) {
                    $where_query[$plantype] = 'YES';
                }
            }


            if(!empty($request->get('amount'))) {
                $amount_arr = explode(' - ', $request->get('amount'));
                $where_query1['min_price'] = str_replace('$','',$amount_arr[0]);
                $where_query1['max_price'] = str_replace('$','',$amount_arr[1]);
                //$orwhere_query['retail_sale_price_a'] = '<='.str_replace('$','',$amount_arr[1]);
            }
            else {
                $where_query1['min_price'] = 0;
                $where_query1['max_price'] = 1000000000;
            }

            if(!empty($request->get('min_zone')) && empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = 13.5;
            }
            else if(!empty($request->get('max_zone')) && empty($request->get('min_zone'))) {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else if(!empty($request->get('min_zone')) && !empty($request->get('max_zone'))) {
                $where_query1['min_zone'] = $request->get('min_zone');
                $where_query1['max_zone'] = $request->get('max_zone');
            }
            else {
                $where_query1['min_zone'] = 1;
                $where_query1['max_zone'] = 13.5;
            }
            $sunlight_sel_arr = array();
            $water_rainfall_sel_arr = array();
            $soil_quality_sel_arr = array();
            $bloom_season_sel_arr = array();
            $flower_color_sel_arr = array();
            $berry_fruit_color_sel_arr = array();
            $spring_foliage_color_sel_arr = array();
            $summer_foliage_color_sel_arr = array();
            $fall_foliage_color_sel_arr = array();
            $has_evergreen_foliage_sel_arr = array();
            $has_winter_interest_sel_arr = array();
            $scented_flowers_sel_arr = array();
            $drought_tolerance_sel_arr = array();
            $wet_feet_tolerance_sel_arr = array();
            $humidity_tolerance_sel_arr = array();
            $wind_tolerence_sel_arr = array();
            $poor_soil_tolerance_sel_arr = array();
            $growth_rate_sel_arr = array();
            $service_life_sel_arr = array();
            $maintenance_requirements_sel_arr = array();
            $spreading_potential_sel_arr = array();
            $yearly_trimming_tips_sel_arr = array();

            $plant_grouping_size_sel_arr = array();
            $best_side_of_house_sel_arr = array();
            $extreme_planting_locations_sel_arr = array();
            $ornamental_features_sel_arr = array();
            $special_landscape_uses_sel_arr = array();
            $possible_pest_problems_sel_arr = array();
            $plant_limitations_sel_arr = array();

            if($request->has('sunlight')) {
                $sunlight_sel_arr = $request->get('sunlight');
            }
            if($request->has('water_rainfall')) {
                $water_rainfall_sel_arr = $request->get('water_rainfall');
            }
            if($request->has('soil_quality')) {
                $soil_quality_sel_arr = $request->get('soil_quality');
            }
            if($request->has('bloom_season')) {
                $bloom_season_sel_arr = $request->get('bloom_season');
            }
            if($request->has('flower_color')) {
                $flower_color_sel_arr = $request->get('flower_color');
            }
            if($request->has('berry_fruit_color')) {
                $berry_fruit_color_sel_arr = $request->get('berry_fruit_color');
            }
            if($request->has('spring_foliage_color')) {
                $spring_foliage_color_sel_arr = $request->get('spring_foliage_color');
            }
            if($request->has('summer_foliage_color')) {
                $summer_foliage_color_sel_arr = $request->get('summer_foliage_color');
            }
            if($request->has('fall_foliage_color')) {
                $fall_foliage_color_sel_arr = $request->get('fall_foliage_color');
            }
            if($request->has('has_evergreen_foliage')) {
                $has_evergreen_foliage_sel_arr = $request->get('has_evergreen_foliage');
            }



            if($request->has('has_winter_interest')) {
                $has_winter_interest_sel_arr = $request->get('has_winter_interest');
            }
            if($request->has('scented_flowers')) {
                $scented_flowers_sel_arr = $request->get('scented_flowers');
            }
            if($request->has('drought_tolerance')) {
                $drought_tolerance_sel_arr = $request->get('drought_tolerance');
            }
            if($request->has('wet_feet_tolerance')) {
                $wet_feet_tolerance_sel_arr = $request->get('wet_feet_tolerance');
            }
            if($request->has('humidity_tolerance')) {
                $humidity_tolerance_sel_arr = $request->get('humidity_tolerance');
            }
            if($request->has('wind_tolerence')) {
                $wind_tolerence_sel_arr = $request->get('wind_tolerence');
            }
            if($request->has('poor_soil_tolerance')) {
                $poor_soil_tolerance_sel_arr = $request->get('poor_soil_tolerance');
            }
            if($request->has('growth_rate')) {
                $growth_rate_sel_arr = $request->get('growth_rate');
            }

            if($request->has('service_life')) {
                $service_life_sel_arr = $request->get('service_life');
            }
            if($request->has('maintenance_requirements')) {
                $maintenance_requirements_sel_arr = $request->get('maintenance_requirements');
            }
            if($request->has('spreading_potential')) {
                $spreading_potential_sel_arr = $request->get('spreading_potential');
            }
            if($request->has('yearly_trimming_tips')) {
                $yearly_trimming_tips_sel_arr = $request->get('yearly_trimming_tips');
            }


            if($request->has('plant_grouping_size')) {
                $plant_grouping_size_sel_arr = $request->get('plant_grouping_size');
            }
            if($request->has('best_side_of_house')) {
                $best_side_of_house_sel_arr = $request->get('best_side_of_house');
            }
            if($request->has('extreme_planting_locations')) {
                $extreme_planting_locations_sel_arr = $request->get('extreme_planting_locations');
            }
            if($request->has('ornamental_features')) {
                $ornamental_features_sel_arr = $request->get('ornamental_features');
            }
            if($request->has('special_landscape_uses')) {
                $special_landscape_uses_sel_arr = $request->get('special_landscape_uses');
            }
            if($request->has('possible_pest_problems')) {
                $possible_pest_problems_sel_arr = $request->get('possible_pest_problems');
            }
            if($request->has('plant_limitations')) {
                $plant_limitations_sel_arr = $request->get('plant_limitations');
            }




            $sortby = "botanical_name";
            $sort = "asc";

            if(!empty($request->sortby)) {
                if($request->sortby == 'name_asc') {
                    $sortby = "botanical_name";
                    $sort = "asc";
                }
                else if($request->sortby == 'name_desc') {
                    $sortby = "botanical_name";
                    $sort = "desc";
                }
                else if($request->sortby == 'price_desc') {
                    $sortby = "retail_sale_price_a";
                    $sort = "desc";
                }
                else if($request->sortby == 'price_asc') {
                    $sortby = "retail_sale_price_a";
                    $sort = "asc";
                }
            }


            if(!empty($where_query1)) {
                //$where_query1['status'] = 'ACTIVE';
                $product_lists = DB::table('products')
                    ->where($where_query)
                    //->whereBetween('retail_sale_price_a', [$where_query1['min_price'],$where_query1['max_price']])
                    //->orWhere('retail_sale_price_a', '=', null)

                    //->where('max_zone', '<=', $where_query1['max_zone'])
                    ->Where(function ($query) use($request,$where_query1) {
                        if(!empty($request->get('min_zone'))) {
                            $query->where('min_zone', '>=', $where_query1['min_zone']);
                        }
                        if(!empty($request->get('max_zone'))) {
                            $query->where('max_zone', '<=', $where_query1['max_zone']);
                        }
                    })
                    ->Where(function ($query) use($request,$where_query1) {

                        if($request->get('category') == 'other-products') {
                            $query->where('other_product_service_name', '<>',  '');
                            $query->orWhere('other_product_service_name', '<>',  null);
                        }
                        elseif($request->get('category') == 'retired-plants') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                            $query->where('status', '<>',  'Active');
                            $query->orWhere('status', '=',  null);
                        }
                        elseif($request->get('category') == 'all-in-library') {
                            $query->where('other_product_service_name', '=',  '');
                            $query->orWhere('other_product_service_name', '=',  null);
                        }
                        else {
                            $query->where('status', '=',  'Active');
                            $query->where(function($query) {
                                $query->orWhere('retail_sale_price_a', '<>',  '')->orWhere('retail_sale_price_a', '<>',  null)->orWhere('retail_sale_price_b', '<>',  '')->orWhere('retail_sale_price_b', '<>',  null)->orWhere('retail_sale_price_c', '<>',  '')->orWhere('retail_sale_price_c', '<>',  null);
                            });
                        }
                    })
                    ->Where(function ($query) use($sunlight_sel_arr) {
                        for ($i = 0; $i < count($sunlight_sel_arr); $i++){
                            $query->where('sunlight', 'like',  '%' . $sunlight_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($water_rainfall_sel_arr) {
                        for ($i = 0; $i < count($water_rainfall_sel_arr); $i++){
                            $query->where('water_rainfall', 'like',  '%' . $water_rainfall_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($soil_quality_sel_arr) {
                        for ($i = 0; $i < count($soil_quality_sel_arr); $i++){
                            $query->where('soil_quality', 'like',  '%' . $soil_quality_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($bloom_season_sel_arr) {
                        for ($i = 0; $i < count($bloom_season_sel_arr); $i++){
                            $query->where('bloom_season', 'like',  '%' . $bloom_season_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($flower_color_sel_arr) {
                        for ($i = 0; $i < count($flower_color_sel_arr); $i++){
                            $query->where('flower_color', 'like',  '%,' . $flower_color_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($berry_fruit_color_sel_arr) {
                        for ($i = 0; $i < count($berry_fruit_color_sel_arr); $i++){
                            $query->where('berry_fruit_color', 'like',  '%' . $berry_fruit_color_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($spring_foliage_color_sel_arr) {
                        for ($i = 0; $i < count($spring_foliage_color_sel_arr); $i++){
                            $query->where('spring_foliage_color', 'like',  '%' . $spring_foliage_color_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($summer_foliage_color_sel_arr) {
                        for ($i = 0; $i < count($summer_foliage_color_sel_arr); $i++){
                            $query->where('summer_foliage_color', 'like',  '%' . $summer_foliage_color_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($fall_foliage_color_sel_arr) {
                        for ($i = 0; $i < count($fall_foliage_color_sel_arr); $i++){
                            $query->where('fall_foliage_color', 'like',  '%' . $fall_foliage_color_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($has_evergreen_foliage_sel_arr) {
                        for ($i = 0; $i < count($has_evergreen_foliage_sel_arr); $i++){
                            $query->where('has_evergreen_foliage', 'like',  '%' . $has_evergreen_foliage_sel_arr [$i] .'%');
                        }
                    })
                    ->Where(function ($query) use($has_winter_interest_sel_arr) {
                        for ($i = 0; $i < count($has_winter_interest_sel_arr); $i++){
                            $query->where('has_winter_interest', 'like',  '%' . $has_winter_interest_sel_arr [$i] .'%');
                        }
                    })
                    ->Where(function ($query) use($scented_flowers_sel_arr) {
                        for ($i = 0; $i < count($scented_flowers_sel_arr); $i++){
                            $query->where('scented_flowers', 'like',  '%' . $scented_flowers_sel_arr [$i] .'%');
                        }
                    })
                    ->Where(function ($query) use($drought_tolerance_sel_arr) {
                        for ($i = 0; $i < count($drought_tolerance_sel_arr); $i++){
                            $query->where('drought_tolerance', 'like',  '%' . $drought_tolerance_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($wet_feet_tolerance_sel_arr) {
                        for ($i = 0; $i < count($wet_feet_tolerance_sel_arr); $i++){
                            $query->where('wet_feet_tolerance', 'like',  '%' . $wet_feet_tolerance_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($humidity_tolerance_sel_arr) {
                        for ($i = 0; $i < count($humidity_tolerance_sel_arr); $i++){
                            $query->where('humidity_tolerance', 'like',  '%' . $humidity_tolerance_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($wind_tolerence_sel_arr) {
                        for ($i = 0; $i < count($wind_tolerence_sel_arr); $i++){
                            $query->where('wind_tolerence', 'like',  '%' . $wind_tolerence_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($poor_soil_tolerance_sel_arr) {
                        for ($i = 0; $i < count($poor_soil_tolerance_sel_arr); $i++){
                            $query->where('poor_soil_tolerance', 'like',  '%' . $poor_soil_tolerance_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($growth_rate_sel_arr) {
                        for ($i = 0; $i < count($growth_rate_sel_arr); $i++){
                            $query->where('growth_rate', 'like',  '%' . $growth_rate_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($service_life_sel_arr) {
                        //dd(count($service_life_sel_arr));
                        for ($i = 0; $i < count($service_life_sel_arr); $i++){
                            $query->where('service_life', '=',  ','.$service_life_sel_arr [$i] );
                        }
                    })
                    ->Where(function ($query) use($maintenance_requirements_sel_arr) {
                        for ($i = 0; $i < count($maintenance_requirements_sel_arr); $i++){
                            //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                            $query->where('maintenance_requirements', '=',  $maintenance_requirements_sel_arr [$i] );
                        }
                    })
                    ->Where(function ($query) use($spreading_potential_sel_arr) {
                        for ($i = 0; $i < count($spreading_potential_sel_arr); $i++){
                            //$query->where('sunlight', 'like',  '%' . $sunlight_fin_arr [$i] .',%');
                            $query->where('spreading_potential', '=',  $spreading_potential_sel_arr [$i] );
                        }
                    })
                    ->Where(function ($query) use($yearly_trimming_tips_sel_arr) {
                        for ($i = 0; $i < count($yearly_trimming_tips_sel_arr); $i++){
                            //$query->where('sunlight', 'like',  '%' . $yearly_trimming_tips_sel_arr [$i] .',%');
                            $query->where('yearly_trimming_tips', '=',  $yearly_trimming_tips_sel_arr [$i] );
                        }
                    })
                    ->Where(function ($query) use($plant_grouping_size_sel_arr) {
                        for ($i = 0; $i < count($plant_grouping_size_sel_arr); $i++){
                            $query->where('plant_grouping_size', 'like',  '%' . $plant_grouping_size_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($best_side_of_house_sel_arr) {
                        for ($i = 0; $i < count($best_side_of_house_sel_arr); $i++){
                            //$query->where('best_side_of_house', '=',  ' . $best_side_of_house_sel_arr [$i] .');
                            $query->where('best_side_of_house', 'like',  '%' . $best_side_of_house_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($extreme_planting_locations_sel_arr) {
                        for ($i = 0; $i < count($extreme_planting_locations_sel_arr); $i++){
                            //$query->where('extreme_planting_locations', '=',  ' . $extreme_planting_locations_sel_arr [$i] .');
                            $query->where('extreme_planting_locations', 'like',  '%' . $extreme_planting_locations_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($ornamental_features_sel_arr) {
                        for ($i = 0; $i < count($ornamental_features_sel_arr); $i++){
                            //$query->where('ornamental_features', '=',  ' . $ornamental_features_sel_arr [$i] .');
                            $query->where('ornamental_features', 'like',  '%' . $ornamental_features_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($special_landscape_uses_sel_arr) {
                        for ($i = 0; $i < count($special_landscape_uses_sel_arr); $i++){
                            //$query->where('special_landscape_uses', '=',  ' . $special_landscape_uses_sel_arr [$i] .');
                            $query->where('special_landscape_uses', 'like',  '%' . $special_landscape_uses_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($possible_pest_problems_sel_arr) {
                        for ($i = 0; $i < count($possible_pest_problems_sel_arr); $i++){
                            //$query->where('possible_pest_problems', '=',  ' . $possible_pest_problems_sel_arr [$i] .');
                            $query->where('possible_pest_problems', 'like',  '%' . $possible_pest_problems_sel_arr [$i] .',%');
                        }
                    })
                    ->Where(function ($query) use($plant_limitations_sel_arr) {
                        for ($i = 0; $i < count($plant_limitations_sel_arr); $i++){
                            $query->where('plant_limitations', 'like',  '%' . $plant_limitations_sel_arr [$i] .',%');
                        }
                    })->orderBy($sortby,$sort)
                    ->paginate(50);
            }
            else {
                $product_lists = DB::table('products')
                    ->where($where_query)->orderBy($sortby,$sort)
                    ->paginate(50);
            }


            $final_array = array();

            foreach ($product_lists as $product_list) {

                $rand = rand(1,10);
                $product_list->image = $rand.'.jpg';
                $final_array[] = $product_list;
            }

            $total_product_count = DB::table('products')
                //->where('status','ACTIVE')
                ->count();


            $sel_products = DB::table('products')
                ->select('sunlight', 'water_rainfall', 'soil_quality', 'bloom_season', 'flower_color', 'berry_fruit_color', 'spring_foliage_color', 'summer_foliage_color', 'fall_foliage_color', 'has_evergreen_foliage', 'has_winter_interest', 'scented_flowers', 'drought_tolerance', 'wet_feet_tolerance', 'humidity_tolerance', 'wind_tolerence', 'poor_soil_tolerance', 'growth_rate', 'service_life', 'maintenance_requirements', 'spreading_potential', 'yearly_trimming_tips','plant_grouping_size','best_side_of_house','extreme_planting_locations','ornamental_features','special_landscape_uses','possible_pest_problems','plant_limitations')->orderBy('botanical_name', 'ASC')
                ->get();
            if(!empty($sel_products)) {
                $sunlight_arr = array();
                $water_rainfall_arr = array();
                $soil_quality_arr = array();
                $bloom_season_arr = array();
                $flower_color_arr = array();
                $berry_fruit_color_arr = array();
                $spring_foliage_color_arr = array();
                $summer_foliage_color_arr = array();
                $fall_foliage_color_arr = array();
                $has_evergreen_foliage_arr = array();
                $has_winter_interest_arr = array();
                $scented_flowers_arr = array();
                $drought_tolerance_arr = array();
                $wet_feet_tolerance_arr = array();
                $humidity_tolerance_arr = array();
                $wind_tolerence_arr = array();
                $poor_soil_tolerance_arr = array();
                $growth_rate_arr = array();
                $service_life_arr = array();
                $maintenance_requirements_arr = array();
                $spreading_potential_arr = array();
                $yearly_trimming_tips_arr = array();

                $plant_grouping_size_arr = array();
                $best_side_of_house_arr = array();
                $extreme_planting_locations_arr = array();
                $ornamental_features_arr = array();
                $special_landscape_uses_arr = array();
                $possible_pest_problems_arr = array();
                $plant_limitations_arr = array();

                foreach ($sel_products as $sel_product) {
                    if(!empty($sel_product->sunlight)) {
                        $arr = explode(',',rtrim($sel_product->sunlight, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $sunlight_arr)) {
                                    $sunlight_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->water_rainfall)) {
                        $arr = explode(',',rtrim($sel_product->water_rainfall, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $water_rainfall_arr)) {
                                    $water_rainfall_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->soil_quality)) {
                        $arr = explode(',',rtrim($sel_product->soil_quality, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $soil_quality_arr)) {
                                    $soil_quality_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->bloom_season)) {
                        $arr = explode(',',rtrim($sel_product->bloom_season, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $bloom_season_arr)) {
                                    $bloom_season_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->flower_color)) {
                        $arr = explode(',',rtrim($sel_product->flower_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $flower_color_arr)) {
                                    $flower_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->berry_fruit_color)) {
                        $arr = explode(',',rtrim($sel_product->berry_fruit_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $berry_fruit_color_arr)) {
                                    $berry_fruit_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->spring_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->spring_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spring_foliage_color_arr)) {
                                    $spring_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->summer_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->summer_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $summer_foliage_color_arr)) {
                                    $summer_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->fall_foliage_color)) {
                        $arr = explode(',',rtrim($sel_product->fall_foliage_color, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $fall_foliage_color_arr)) {
                                    $fall_foliage_color_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_evergreen_foliage)) {
                        $arr = explode(',',rtrim($sel_product->has_evergreen_foliage, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_evergreen_foliage_arr)) {
                                    $has_evergreen_foliage_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->has_winter_interest)) {
                        $arr = explode(',',rtrim($sel_product->has_winter_interest, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $has_winter_interest_arr)) {
                                    $has_winter_interest_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->scented_flowers)) {
                        $arr = explode(',',rtrim($sel_product->scented_flowers, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $scented_flowers_arr)) {
                                    $scented_flowers_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->drought_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->drought_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $drought_tolerance_arr)) {
                                    $drought_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wet_feet_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->wet_feet_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wet_feet_tolerance_arr)) {
                                    $wet_feet_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->humidity_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->humidity_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $humidity_tolerance_arr)) {
                                    $humidity_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->wind_tolerence)) {
                        $arr = explode(',',rtrim($sel_product->wind_tolerence, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $wind_tolerence_arr)) {
                                    $wind_tolerence_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->poor_soil_tolerance)) {
                        $arr = explode(',',rtrim($sel_product->poor_soil_tolerance, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $poor_soil_tolerance_arr)) {
                                    $poor_soil_tolerance_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->growth_rate)) {
                        $arr = explode(',',rtrim($sel_product->growth_rate, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $growth_rate_arr)) {
                                    $growth_rate_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                    if(!empty($sel_product->service_life)) {
                        $arr = explode(',',rtrim($sel_product->service_life, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $service_life_arr)) {
                                    $service_life_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->maintenance_requirements)) {
                        $arr = explode(',',rtrim($sel_product->maintenance_requirements, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $maintenance_requirements_arr)) {
                                    $maintenance_requirements_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->spreading_potential)) {
                        $arr = explode(',',rtrim($sel_product->spreading_potential, ","));

                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $spreading_potential_arr)) {
                                    $spreading_potential_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->yearly_trimming_tips)) {
                        $arr = explode(',',rtrim($sel_product->yearly_trimming_tips, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $yearly_trimming_tips_arr)) {
                                    $yearly_trimming_tips_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_grouping_size)) {
                        $arr = explode(',',rtrim($sel_product->plant_grouping_size, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_grouping_size_arr)) {
                                    $plant_grouping_size_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->best_side_of_house)) {
                        $arr = explode(',',rtrim($sel_product->best_side_of_house, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $best_side_of_house_arr)) {
                                    $best_side_of_house_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->extreme_planting_locations)) {
                        $arr = explode(',',rtrim($sel_product->extreme_planting_locations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $extreme_planting_locations_arr)) {
                                    $extreme_planting_locations_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->ornamental_features)) {
                        $arr = explode(',',rtrim($sel_product->ornamental_features, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $ornamental_features_arr)) {
                                    $ornamental_features_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->special_landscape_uses)) {
                        $arr = explode(',',rtrim($sel_product->special_landscape_uses, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $special_landscape_uses_arr)) {
                                    $special_landscape_uses_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->possible_pest_problems)) {
                        $arr = explode(',',rtrim($sel_product->possible_pest_problems, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $possible_pest_problems_arr)) {
                                    $possible_pest_problems_arr[] = trim($ar);
                                }
                            }
                        }
                    }

                    if(!empty($sel_product->plant_limitations)) {
                        $arr = explode(',',rtrim($sel_product->plant_limitations, ","));
                        foreach ($arr as $ar) {
                            if(!empty($ar)) {
                                if (!in_array(trim($ar), $plant_limitations_arr)) {
                                    $plant_limitations_arr[] = trim($ar);
                                }
                            }
                        }
                    }
                }

                sort($sunlight_arr);
                sort($water_rainfall_arr);
                sort($soil_quality_arr);
                sort($bloom_season_arr);
                sort($flower_color_arr);
                sort($berry_fruit_color_arr);
                sort($spring_foliage_color_arr);
                sort($summer_foliage_color_arr);
                /*print_r($fall_foliage_color_arr);
                exit;*/
                sort($fall_foliage_color_arr);
                sort($has_evergreen_foliage_arr);
                sort($has_winter_interest_arr);
                sort($scented_flowers_arr);
                sort($drought_tolerance_arr);
                sort($wet_feet_tolerance_arr);
                sort($humidity_tolerance_arr);
                sort($wind_tolerence_arr);
                sort($poor_soil_tolerance_arr);
                sort($growth_rate_arr);
                sort($service_life_arr);
                sort($maintenance_requirements_arr);
                sort($spreading_potential_arr);
                sort($yearly_trimming_tips_arr);

                sort($plant_grouping_size_arr);
                sort($best_side_of_house_arr);
                sort($extreme_planting_locations_arr);
                sort($ornamental_features_arr);
                sort($special_landscape_uses_arr);
                sort($possible_pest_problems_arr);
                sort($plant_limitations_arr);
            }
        }









        return view('product.frontend_product_list', [
            'products' => $final_array,
            'product_paginate' => $product_lists,
            'total_product_count' => $total_product_count,
            'zoneArray' => $zoneArray,

            'sunlight_arr' => $sunlight_arr,
            'water_rainfall_arr' => $water_rainfall_arr,
            'soil_quality_arr' => $soil_quality_arr,
            'bloom_season_arr' => $bloom_season_arr,
            'flower_color_arr' => $flower_color_arr,
            'berry_fruit_color_arr' => $berry_fruit_color_arr,
            'spring_foliage_color_arr' => $spring_foliage_color_arr,
            'summer_foliage_color_arr' => $summer_foliage_color_arr,
            'fall_foliage_color_arr' => $fall_foliage_color_arr,
            'has_evergreen_foliage_arr' => $has_evergreen_foliage_arr,
            'has_winter_interest_arr' => $has_winter_interest_arr,
            'scented_flowers_arr' => $scented_flowers_arr,
            'drought_tolerance_arr' => $drought_tolerance_arr,
            'wet_feet_tolerance_arr' => $wet_feet_tolerance_arr,
            'humidity_tolerance_arr' => $humidity_tolerance_arr,
            'wind_tolerence_arr' => $wind_tolerence_arr,
            'poor_soil_tolerance_arr' => $poor_soil_tolerance_arr,
            'growth_rate_arr' => $growth_rate_arr,
            'service_life_arr' => $service_life_arr,
            'maintenance_requirements_arr' => $maintenance_requirements_arr,
            'spreading_potential_arr' => $spreading_potential_arr,
            'yearly_trimming_tips_arr' => $yearly_trimming_tips_arr,


            'plant_grouping_size_arr' => $plant_grouping_size_arr,
            'best_side_of_house_arr' => $best_side_of_house_arr,
            'extreme_planting_locations_arr' => $extreme_planting_locations_arr,
            'ornamental_features_arr' => $ornamental_features_arr,
            'special_landscape_uses_arr' => $special_landscape_uses_arr,
            'possible_pest_problems_arr' => $possible_pest_problems_arr,
            'plant_limitations_arr' => $plant_limitations_arr,
        ]);
    }

    public function product_details(Product $product, Request $request) {
        //dd($product);

        /*echo app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        exit;*/

        return view('product.frontend_product_details', [
            'product' => $product,
            //'cart_lists' => $cart_lists
        ]);
    }

    public function get_product_price(Request $request) {
        if($request->has('id')) {
            $price = Product::getProductPriceByIDandSize($request->get('id'),$request->get('size'));

            return $price;
        }
    }

    public function adminProducts(Request $request) {
        $where_query= array();
        //dd($request);
        if($request->has('f_botanical_name') && !is_null($request->get('f_botanical_name'))) {
            $where_query['botanical_name'] = $request->get('f_botanical_name');
        }

        if($request->has('f_common_name') && !is_null($request->get('f_common_name'))) {
            $where_query['common_name'] = $request->get('f_common_name');
        }

        if($request->has('f_plant_type') && !is_null($request->get('f_plant_type'))) {
            if($request->get('f_plant_type') == 'Grass Bamboo') {
                $where_query['grass_bamboo'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'Hardy Tropical') {
                $where_query['hardy_tropical'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'Water Plant') {
                $where_query['water_plant'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'House Deck Plant') {
                $where_query['house_deck_plant'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'Cactus / Succulent') {
                $where_query['cactus_succulent'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'Small Tree') {
                $where_query['small_tree'] = 'YES';
            }
            elseif($request->get('f_plant_type') == 'Large Tree') {
                $where_query['large_tree'] = 'YES';
            }
            else {
                $where_query[$request->get('f_plant_type')] = 'YES';
            }
        }

        if($request->has('f_product_id_number') && !is_null($request->get('f_product_id_number'))) {
            $where_query['plant_id_number'] = $request->get('f_product_id_number');
        }

        if($request->has('f_checkbox')) {
            if(in_array('include_on_website',$request->get('f_checkbox'))) {
                $where_query['include_on_website'] = 'YES';
            }
        }

        if($request->has('f_checkbox')) {
            if(in_array('active_only',$request->get('f_checkbox'))) {
                $where_query['status'] = 'ACTIVE';
            }
        }

        if($request->has('f_checkbox')) {
            if(in_array('best_sellers',$request->get('f_checkbox'))) {
                $where_query['best_sellers'] = 'YES';
            }
        }

        if($request->has('f_checkbox')) {
            if(in_array('new_for_this_year',$request->get('f_checkbox'))) {
                $where_query['new_for_this_year'] = 'YES';
            }
        }

        /*if($request->has('f_checkbox')) {
            if(in_array('other_product_services',$request->get('f_checkbox'))) {
                $where_query['other_product_service_name'] = 'YES';
            }
        }*/

        if($request->has('f_checkbox')) {
            if(in_array('tax_free',$request->get('f_checkbox'))) {
                $where_query['tax_free'] = 'YES';
            }
        }

        if(!empty($request->image_count_sort)) {
            if ($request->image_count_sort == 'high_to_low') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->Where(function ($query) use($request,$where_query) {
                        if($request->has('f_checkbox')) {
                            if (in_array('other_product_services', $request->get('f_checkbox'))) {
                                $query->where('other_product_service_name', '<>', '');
                                $query->orWhere('other_product_service_name', '<>', null);
                            }
                        }
                    })
                    ->orderBy('image_count', 'desc')
                    ->paginate(200);
            }
            elseif ($request->image_count_sort == 'low_to_high') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->Where(function ($query) use($request,$where_query) {
                        if($request->has('f_checkbox')) {
                            if (in_array('other_product_services', $request->get('f_checkbox'))) {
                                $query->where('other_product_service_name', '<>', '');
                                $query->orWhere('other_product_service_name', '<>', null);
                            }
                        }
                    })
                    ->orderBy('image_count', 'asc')
                    ->paginate(200);
            }
        }
        else {
            $product_lists = DB::table('products')
                ->where($where_query)
                ->Where(function ($query) use($request,$where_query) {
                    if($request->has('f_checkbox')) {
                        if (in_array('other_product_services', $request->get('f_checkbox'))) {
                            $query->where('other_product_service_name', '<>', '');
                            $query->orWhere('other_product_service_name', '<>', null);
                        }
                    }
                })
                ->orderBy('botanical_name', 'ASC')->paginate(200);
        }



        $botanical_common_lists = DB::table('products')
            ->select('id','botanical_name','common_name')->get();

        $botanical_arr = array();
        $common_arr = array();
        if(!empty($botanical_common_lists)) {
            foreach ($botanical_common_lists as $botanical_common_list) {
                $botanical_arr[] = $botanical_common_list->botanical_name;
                if($botanical_common_list->common_name)
                    $common_arr[] = $botanical_common_list->common_name;
            }
        }

        //dd($product_lists);
        if(!empty($product_lists)) {
            foreach ($product_lists as $product_list) {
                if(!empty($product_list->images)) {
                    if (count(json_decode($product_list->images)) > 0) {
                        $product_list->image_count = count(json_decode($product_list->images));
                    }
                    else {
                        $product_list->image_count = 0;
                    }
                }
                else {
                    $product_list->image_count = 0;
                }
            }
        }

        //dd($product_lists);

        return view('admin.product.allProducts', [
            'product_lists' => $product_lists,
            'botanical_lists' => $botanical_arr,
            'common_lists' => $common_arr
        ]);
    }



    public function adminProductsImage($id) {
        $product_info = Product::where('id', $id)->firstOrFail();

        return view('admin.product.productImage', [
            'product_info' => $product_info
        ]);
    }

    public function adminProductsImageProcessor($id,Request $request) {

        //$property_img_info = Product::find($id);

        if(!empty($request->file('file'))) {
            //$property_img_info = Product::where('id', $id)->firstOrFail();
            $property_img_info = Product::find($id);

            $request->validate([
                'file' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
            ]);

            $path = $request->file('file');

            /*$healthy = array("_", "-", "="," ");
            $yummy   = array("", "", "", "");*/
            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            $filename = str_replace($healthy, $yummy, $path->getClientOriginalName());
            //$filename = uniqid() . '_' .$newphrase;

            $dir = public_path('img/product/thumb/' . $request->id);

            if(!is_dir($dir)) {
                //mkdir($dir, 0755, true);
                File::makeDirectory($dir);
            }
            $dir = public_path('img/product/large/' . $request->id);
            if(!is_dir($dir)) {
                //mkdir($dir, 0755, true);
                File::makeDirectory($dir);
            }

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/product/thumb/' .$request->id.'/'. $filename));

            $lg_image_resize = Image::make($path->getRealPath());
            $lg_image_resize->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $lg_image_resize->save(public_path('img/product/large/' .$request->id.'/'. $filename));

            //$property_img_info = Product::where('id', $id)->find();

            $arr = array();
            $property_img_info = Product::find($id);
            if (!empty($property_img_info->images) && ($property_img_info->images != 'null')) {
                $arr = json_decode($property_img_info->images);
            }
            array_push($arr, $filename);

            $property_img_info->images = json_encode($arr);
            $property_img_info->save();
        }
        else if($request->ac == 'delete') {

            $property_img_info = Product::where('id', $request->id)->firstOrFail();

            $arr = array();
            $arr = json_decode($property_img_info->images);


            if(($key = array_search($request->fn, $arr)) !== false) {
                unset($arr[$key]);
                $foo2 = array_values($arr);
            }

            unlink(public_path('img/product/thumb/' .$request->id.'/'. $request->fn));
            unlink(public_path('img/product/large/' .$request->id.'/'. $request->fn));

            $property_img_info->images = json_encode($foo2);
            $property_img_info->save();

        }
        else if($request->ac == 'sorting') {
            $arr = array();

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");



            if(!empty($request->fn)) {
                $f1 = str_replace('foo[]=','',$request->fn);
                $f2 = str_replace($healthy, $yummy, $f1);
                $arr[] = $f2;
            }





            if(!empty($request->foo)) {
                foreach($request->foo as $fo) {
                    $fo1 = str_replace($healthy, $yummy, $fo);
                    $arr[] = $fo1;
                }
            }

            //dd($arr);

            $property_img_info = Product::find($request->id);
            $property_img_info->images = json_encode($arr);
            $property_img_info->save();
        }
        else {

            $property_img_info = Product::find($request->id);

            $arr = array();
            $arr = json_decode($property_img_info->images);

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            if(!empty($arr)) {
                $result = array();
                foreach($arr as $ar) {
                    //if(filesize("../media/property/".$ar)>1) {
                    $ar = str_replace($healthy, $yummy, $ar);
                    $obj = array();
                    $obj['name'] = $ar;
                    $obj['size'] = filesize(public_path('img/product/thumb/' .$request->id.'/'. $ar));
                    //$obj['src'] = url('img/product/large/' .$request->id.'/'. $ar);

                    $result[] = $obj;
                    //}
                }
            }

            //header('Content-type: text/json');
            //header('Content-type: application/json');
            //return json_encode($result, JSON_FORCE_OBJECT);
            return $result;
        }

    }


    public function adminAddProducts(Request $request) {


        //$this->productValidate();

        $product = new Product();

        $this->store($request, $product);

    }

    public function adminEditProducts(Request $request, Product $product) {
        //dd($product);
        //$productinfo = Product::
        return view('admin.product.editProducts', [
            'product' => $product,
            //'cart_lists' => $cart_lists
        ]);

    }

    public function adminUpdateProducts(Request $request, Product $product) {


        //$this->productValidate($request);

        //dd($request);

        /*$product->plant_id_number = $request->plant_id_number;
        $product->botanical_name = $request->botanical_name;
        $product->common_name = $request->common_name;

        $product->update();*/

        $product = Product::find($request->get('id'));

        $this->store($request,$product);

        return redirect(url('admin/products'));

    }

    public function adminDeleteProducts($id) {
        $product = Product::find($id);
        $product->delete();

        File::deleteDirectory(public_path().'/img/product/large/'.$id);
        File::deleteDirectory(public_path().'/img/product/thumb/'.$id);

        return redirect(url('admin/products'));
    }

    protected function store($request, $product) {
        //dd($request);
        $request->validate([
            'plant_id_number' => 'required'
        ]);

        $product->plant_id_number = $request->plant_id_number;
        $product->botanical_name = $request->botanical_name;
        $product->common_name = $request->common_name;
        $product->other_product_service_name = $request->other_product_service_name;

        $product->is_featured = ($request->is_featured?1:0);
        $product->featured_order = $request->featured_order;

        $product->inventory_count_a = $request->inventory_count_a;
        $product->inventory_count_b = $request->inventory_count_b;
        $product->inventory_count_c = $request->inventory_count_c;

        $product->contractor_price_a = $request->contractor_price_a;
        $product->contractor_price_b = $request->contractor_price_b;
        $product->contractor_price_c = $request->contractor_price_c;

        $product->pot_size_a = $request->pot_size_a;
        $product->pot_size_b = $request->pot_size_b;
        $product->pot_size_c = $request->pot_size_c;
        $product->retail_sale_price_a = $request->retail_sale_price_a;
        $product->retail_sale_price_b = $request->retail_sale_price_b;
        $product->retail_sale_price_c = $request->retail_sale_price_c;

        $product->retail_list_price_a = $request->retail_list_price_a;
        $product->retail_list_price_b = $request->retail_list_price_b;
        $product->retail_list_price_c = $request->retail_list_price_c;

        $product->status = $request->status;
        $product->new_for_this_year = $request->new_for_this_year;
        $product->date_entered = $request->date_entered;

        $product->save();
    }

    protected function productValidate($request) {
        return $request->validate([
            'botanical_name'=>['required']
        ]);
    }


    public function fileImportExport(Request $request)
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:csv,txt'],
        ]);

        \Maatwebsite\Excel\Facades\Excel::import(new ProductsImport, $request->file('file')->store('temp'));
        //return back();
        return Redirect::to("/admin/products")->withSuccess('You have successfully uploaded the new CSV file!');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new ProductsExport, 'products_'.date('m-d-Y').'.csv');
    }

    public function add_image_count() {
        $product_image_lists = Product::get(['id','images']);
        //$product_image_lists = Product::pluck('images','id')->all();
        //dd($product_image_lists);

        if(!empty($product_image_lists)) {
            foreach ($product_image_lists as $product_image_list) {
                if(!empty($product_image_list['images'])) {
                    $arr = json_decode($product_image_list['images']);

                    $product = new Product();
                    $product->exists = true;
                    $product->id = $product_image_list['id'];
                    $product->image_count = count($arr);
                    $product->save();
                }
            }
        }

    }
}
