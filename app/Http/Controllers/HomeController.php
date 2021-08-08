<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //$this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$role = Role::create(['name' => 'writer']);
        //$permission = Permission::create(['name' => 'write post']);
        /*$role = Role::findById(1);
        $permission = Permission::findById(1);


        $role->givePermissionTo($permission);*/

        $billboard_image_lists = Billboard::orderBy('id','desc')->get() ;


        $featured_lists = Product::where('is_featured',1)->select('id','botanical_name','common_name','other_product_service_name','patent_trademark_names','perennial','shrub','vine','grass_bamboo','hardy_tropical','water_plant','annual','house_deck_plant','cactus_succulent','small_tree','large_tree','slug','retail_list_price_a','retail_list_price_b','retail_list_price_c','retail_sale_price_a','retail_sale_price_b','retail_sale_price_c','contractor_price_a','contractor_price_b','contractor_price_c','images')->orderBy('featured_order','ASC')->get();

        return view('home', [
            'featured_lists' => $featured_lists,
            'billboard_image_lists' => $billboard_image_lists
        ]);
    }
}
