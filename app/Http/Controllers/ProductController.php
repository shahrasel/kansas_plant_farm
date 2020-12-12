<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products(Request $request) {

        //dd($request->all());



        $perennial_cat_count = DB::table('products')
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
            ->count();


        //$product_lists = Product:: paginate(50);
        $where_query= array();
        $where_query['status'] = 'ACTIVE';

        if(!empty($request->get('category'))) {
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
        }

        if(!empty($request->get('amount'))) {
            $amount_arr = explode(' - ', $request->get('amount'));
            $where_query1['min_price'] = str_replace('$','',$amount_arr[0]);
            $where_query1['max_price'] = str_replace('$','',$amount_arr[1]);
            //$orwhere_query['retail_sale_price_a'] = '<='.str_replace('$','',$amount_arr[1]);
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
                    ->whereBetween('retail_sale_price_a', [$where_query1['min_price'], $where_query1['max_price']])
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

        return view('product.frontend_product_list', [
            'products' => $final_array,
            'product_paginate' => $product_lists,
            'total_product_count' => $total_product_count,
            'perennial_cat_count' => $perennial_cat_count,
            'shrub_cat_count' => $shrub_cat_count,
            'vine_cat_count' => $vine_cat_count,
            'grass_bamboo_cat_count' => $grass_bamboo_cat_count,
            'hardy_tropical_cat_count' => $hardy_tropical_cat_count,
            'water_plant_cat_count' => $water_plant_cat_count,
            'annual_cat_count' => $annual_cat_count,
            'house_deck_plant_cat_count' => $house_deck_plant_cat_count,
            'cactus_succulent_cat_count' => $cactus_succulent_cat_count,
            'small_tree_cat_count' => $small_tree_cat_count,
            'large_tree_cat_count' => $large_tree_cat_count
        ]);
    }

    public function product_details(Product $id) {
        //dd($id);
        return view('product.frontend_product_details', [
            'product' => $id
        ]);
    }
}
