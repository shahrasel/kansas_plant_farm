<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Excel;

class ProductController extends Controller
{
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
        //dd($request->all());
        /*$perennial_cat_count = DB::table('products')
            ->where('perennial', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $shrub_cat_count = DB::table('products')
            ->where('shrub', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $vine_cat_count = DB::table('products')
            ->where('vine', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $grass_bamboo_cat_count = DB::table('products')
            ->where('grass_bamboo', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $hardy_tropical_cat_count = DB::table('products')
            ->where('hardy_tropical', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $water_plant_cat_count = DB::table('products')
            ->where('water_plant', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $annual_cat_count = DB::table('products')
            ->where('annual', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $house_deck_plant_cat_count = DB::table('products')
            ->where('house_deck_plant', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $cactus_succulent_cat_count = DB::table('products')
            ->where('cactus_succulent', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $small_tree_cat_count = DB::table('products')
            ->where('small_tree', 'YES')
            ->where('status', 'ACTIVE')
            ->count();

        $large_tree_cat_count = DB::table('products')
            ->where('large_tree', 'YES')
            ->where('status', 'ACTIVE')
            ->count();*/



        $where_query= array();
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

        /*if($request->has('CULTURALCONDITIONS')) {
            foreach ($request->get('CULTURALCONDITIONS') as $plantype) {
                $where_query[$plantype] = 'YES';
            }
        }

        if($request->has('FLOWERSFOLIAGE')) {
            foreach ($request->get('FLOWERSFOLIAGE') as $plantype) {
                $where_query[$plantype] = 'YES';
            }
        }*/

        //$product_lists = Product:: paginate(50);

        $where_query['status'] = 'ACTIVE';



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

        if(!empty($request->sortby)) {
            if($request->sortby == 'name_asc') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->orderBy('common_name', 'asc')
                    ->paginate(50);
            }
            else if($request->sortby == 'name_desc') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->orderBy('common_name', 'desc')
                    ->paginate(50);
            }
            else if($request->sortby == 'price_desc') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->orderBy('retail_sale_price_a', 'desc')
                    ->paginate(50);
            }
            else if($request->sortby == 'price_asc') {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->orderBy('retail_sale_price_a', 'asc')
                    ->paginate(50);
            }
        }
        else {
            if(!empty($where_query1)) {
                $where_query1['status'] = 'ACTIVE';
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->whereBetween('retail_sale_price_a', [$where_query1['min_price'],$where_query1['max_price']])
                    //->where('status', '<>', 1)
                    ->where('min_zone', '>=', $where_query1['min_zone'])
                    ->where('max_zone', '<=', $where_query1['max_zone'])
                    ->paginate(50);
            }
            else {
                $product_lists = DB::table('products')
                    ->where($where_query)
                    ->paginate(50);
            }
        }

        $final_array = array();

        foreach ($product_lists as $product_list) {

            $rand = rand(1,10);
            $product_list->image = $rand.'.jpg';
            $final_array[] = $product_list;
        }

        $total_product_count = DB::table('products')
            ->where('status','ACTIVE')
            ->count();

        /*if(!empty($request->get('category'))) {
            if($request->get('category') == 'perennial') {
                $where_query['perennial'] = 'YES';
            }
            else if($request->get('category') == 'shrub') {
                $where_query['shrub'] = 'YES';
            }
            else if($request->get('category') == 'vine') {
                $where_query['vine'] = 'YES';
            }
            else if($request->get('category') == 'grass_bamboo') {
                $where_query['grass_bamboo'] = 'YES';
            }
            else if($request->get('category') == 'hardy_tropical') {
                $where_query['hardy_tropical'] = 'YES';
            }
            else if($request->get('category') == 'water_plant') {
                $where_query['water_plant'] = 'YES';
            }
            else if($request->get('category') == 'annual') {
                $where_query['annual'] = 'YES';
            }
            else if($request->get('category') == 'house_deck_plant') {
                $where_query['house_deck_plant'] = 'YES';
            }
            else if($request->get('category') == 'cactus_succulent') {
                $where_query['cactus_succulent'] = 'YES';
            }
            else if($request->get('category') == 'small_tree') {
                $where_query['small_tree'] = 'YES';
            }
            else if($request->get('category') == 'large_tree') {
                $where_query['large_tree'] = 'YES';
            }
        }*/
        $sel_products = DB::table('products')
            ->select('sunlight', 'water_rainfall', 'soil_quality', 'bloom_season', 'flower_color', 'berry_fruit_color', 'spring_foliage_color', 'summer_foliage_color', 'fall_foliage_color', 'has_evergreen_foliage', 'has_winter_interest', 'scented_flowers', 'drought_tolerance', 'wet_feet_tolerance', 'humidity_tolerance', 'wind_tolerence', 'poor_soil_tolerance', 'growth_rate', 'service_life', 'maintenance_requirements', 'spreading_potential', 'yearly_trimming_tips')
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

            foreach ($sel_products as $sel_product) {
                if(!empty($sel_product->sunlight)) {
                    $arr = explode(',',rtrim($sel_product->sunlight, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $sunlight_arr)) {
                                $sunlight_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->water_rainfall)) {
                    $arr = explode(',',rtrim($sel_product->water_rainfall, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $water_rainfall_arr)) {
                                $water_rainfall_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->soil_quality)) {
                    $arr = explode(',',rtrim($sel_product->soil_quality, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $soil_quality_arr)) {
                                $soil_quality_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->bloom_season)) {
                    $arr = explode(',',rtrim($sel_product->bloom_season, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $bloom_season_arr)) {
                                $bloom_season_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->flower_color)) {
                    $arr = explode(',',rtrim($sel_product->flower_color, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $flower_color_arr)) {
                                $flower_color_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->berry_fruit_color)) {
                    $arr = explode(',',rtrim($sel_product->berry_fruit_color, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $berry_fruit_color_arr)) {
                                $berry_fruit_color_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->spring_foliage_color)) {
                    $arr = explode(',',rtrim($sel_product->spring_foliage_color, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $spring_foliage_color_arr)) {
                                $spring_foliage_color_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->summer_foliage_color)) {
                    $arr = explode(',',rtrim($sel_product->summer_foliage_color, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $summer_foliage_color_arr)) {
                                $summer_foliage_color_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->fall_foliage_color)) {
                    $arr = explode(',',rtrim($sel_product->fall_foliage_color, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $fall_foliage_color_arr)) {
                                $fall_foliage_color_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->has_evergreen_foliage)) {
                    $arr = explode(',',rtrim($sel_product->has_evergreen_foliage, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $has_evergreen_foliage_arr)) {
                                $has_evergreen_foliage_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->has_winter_interest)) {
                    $arr = explode(',',rtrim($sel_product->has_winter_interest, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $has_winter_interest_arr)) {
                                $has_winter_interest_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->scented_flowers)) {
                    $arr = explode(',',rtrim($sel_product->scented_flowers, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $scented_flowers_arr)) {
                                $scented_flowers_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->drought_tolerance)) {
                    $arr = explode(',',rtrim($sel_product->drought_tolerance, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $drought_tolerance_arr)) {
                                $drought_tolerance_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->wet_feet_tolerance)) {
                    $arr = explode(',',rtrim($sel_product->wet_feet_tolerance, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $wet_feet_tolerance_arr)) {
                                $wet_feet_tolerance_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->humidity_tolerance)) {
                    $arr = explode(',',rtrim($sel_product->humidity_tolerance, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $humidity_tolerance_arr)) {
                                $humidity_tolerance_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->wind_tolerence)) {
                    $arr = explode(',',rtrim($sel_product->wind_tolerence, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $wind_tolerence_arr)) {
                                $wind_tolerence_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->poor_soil_tolerance)) {
                    $arr = explode(',',rtrim($sel_product->poor_soil_tolerance, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $poor_soil_tolerance_arr)) {
                                $poor_soil_tolerance_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->growth_rate)) {
                    $arr = explode(',',rtrim($sel_product->growth_rate, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $growth_rate_arr)) {
                                $growth_rate_arr[] = $ar;
                            }
                        }
                    }
                }
                if(!empty($sel_product->service_life)) {
                    $arr = explode(',',rtrim($sel_product->service_life, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $service_life_arr)) {
                                $service_life_arr[] = $ar;
                            }
                        }
                    }
                }

                if(!empty($sel_product->maintenance_requirements)) {
                    $arr = explode(',',rtrim($sel_product->maintenance_requirements, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $maintenance_requirements_arr)) {
                                $maintenance_requirements_arr[] = $ar;
                            }
                        }
                    }
                }

                if(!empty($sel_product->spreading_potential)) {
                    $arr = explode(',',rtrim($sel_product->spreading_potential, ","));

                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $spreading_potential_arr)) {
                                $spreading_potential_arr[] = $ar;
                            }
                        }
                    }
                }

                if(!empty($sel_product->yearly_trimming_tips)) {
                    $arr = explode(',',rtrim($sel_product->yearly_trimming_tips, ","));
                    foreach ($arr as $ar) {
                        if(!empty($ar)) {
                            if (!in_array($ar, $yearly_trimming_tips_arr)) {
                                $yearly_trimming_tips_arr[] = $ar;
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

            /*'perennial_cat_count' => $perennial_cat_count,
            'shrub_cat_count' => $shrub_cat_count,
            'vine_cat_count' => $vine_cat_count,
            'grass_bamboo_cat_count' => $grass_bamboo_cat_count,
            'hardy_tropical_cat_count' => $hardy_tropical_cat_count,
            'water_plant_cat_count' => $water_plant_cat_count,
            'annual_cat_count' => $annual_cat_count,
            'house_deck_plant_cat_count' => $house_deck_plant_cat_count,
            'cactus_succulent_cat_count' => $cactus_succulent_cat_count,
            'small_tree_cat_count' => $small_tree_cat_count,
            'large_tree_cat_count' => $large_tree_cat_count*/
        ]);
    }

    public function product_details(Product $id, Request $request) {


        return view('product.frontend_product_details', [
            'product' => $id,
            //'cart_lists' => $cart_lists
        ]);
    }

    public function adminProducts() {
        $where_query= array();

        $product_lists = DB::table('products')
            ->where($where_query)
            ->orderBy('id', 'asc')->paginate(50);

        return view('admin.product.allProducts', [
            'product_lists' => $product_lists
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

            $healthy = array("_", "-", "=");
            $yummy   = array("", "", "");

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
            if(!empty($request->fn)) {
                $arr[] = str_replace('foo[]=','',$request->fn);
            }

            if(!empty($request->foo)) {
                foreach($request->foo as $fo) {
                    $arr[] = $fo;
                }
            }

            $property_img_info = Product::find($request->id);
            $property_img_info->images = json_encode($arr);
            $property_img_info->save();
        }
        else {

            $property_img_info = Product::find($request->id);

            $arr = array();
            $arr = json_decode($property_img_info->images);

            if(!empty($arr)) {
                $result = array();
                foreach($arr as $ar) {
                    //if(filesize("../media/property/".$ar)>1) {
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
        return back();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new ProductsExport, 'products_'.date('m-d-Y').'.csv');
    }
}
