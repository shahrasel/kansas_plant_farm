<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SettingAdditional;
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

        $billboard_image_lists = Billboard::where('status',1)->orderBy('order','asc')->get();

        $settings_info = Setting::first();


        $featured_lists = Product::where('is_featured',1)->select('id','botanical_name','common_name','other_product_service_name','patent_trademark_names','perennial','shrub','vine','grass_bamboo','hardy_tropical','water_plant','annual','house_deck_plant','cactus_succulent','small_tree','large_tree','slug','retail_list_price_a','retail_list_price_b','retail_list_price_c','retail_sale_price_a','retail_sale_price_b','retail_sale_price_c','contractor_price_a','contractor_price_b','contractor_price_c','pot_size_a','pot_size_b','pot_size_c','images')->orderBy('featured_order','ASC')->get();

        return view('home', [
            'featured_lists' => $featured_lists,
            'billboard_image_lists' => $billboard_image_lists,
            'settings_info' => $settings_info
        ]);
    }

    public function aboutUs() {
        $imageLists = Setting::firstOrFail();

        $settings_info = Setting::find(1);
        $settings_additional_info = SettingAdditional::find(1);
        //dd($imageLists);
        return view('aboutus.aboutUs', [
            'imageLists' => $imageLists,
            'settings_info'=>$settings_info,
            'settings_additional_info'=>$settings_additional_info,
        ]);
    }

    public function privacyPolicy() {
        $setting_info = Setting::first();

        return view('contents.privacy_policy', [
            'setting_info' => $setting_info->privacySettings
        ]);
    }

    public function termsConditions() {
        $setting_info = Setting::first();
        //dd($imageLists);
        return view('contents.terms_conditions', [
            'setting_info' => $setting_info->settingAdditional
        ]);
    }

    public function ourGuarantee() {
        $setting_info = Setting::first();
        //dd($imageLists);
        return view('contents.our_guarantee', [
            'setting_info' => $setting_info->settingAdditional
        ]);
    }
}
