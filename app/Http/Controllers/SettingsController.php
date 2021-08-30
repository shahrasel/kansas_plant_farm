<?php

namespace App\Http\Controllers;

use App\Models\GardenTheme;
use App\Models\PrivacySettings;
use App\Models\Setting;
use App\Models\SettingAdditional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings_info = Setting::find($id);
        $settings_additional_info = $settings_info->settingAdditional;
        $settings_privacy_info = $settings_info->privacySettings;
        //dd($settings_additional_info);
        return view('admin.settings.editSettings',[
            'settings_info'=>$settings_info,
            'settings_additional_info'=>$settings_additional_info,
            'settings_privacy_info'=>$settings_privacy_info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $settings = Setting::find($id);

        $request->validate([
            'pricing_sheet_link' => 'mimes:pdf',
            'order_form_link' => 'mimes:pdf',
            'nursery_link' => 'mimes:jpg,png,jpeg'
        ]);


        if(!empty($request->file('pricing_sheet_link'))) {
            $name = time().'_'.$request->file('pricing_sheet_link')->getClientOriginalName();
            $filePath = $request->file('pricing_sheet_link')->storeAs('public/uploads/',$name);

            $settings->pricing_sheet_link = $name;
        }

        if(!empty($request->file('order_form_link'))) {
            $name = time().'_'.$request->file('order_form_link')->getClientOriginalName();
            $filePath = $request->file('order_form_link')->storeAs('public/uploads/',$name);

            $settings->order_form_link = $name;
        }

        if(!empty($request->file('nursery_link'))) {
            $name = time().'_'.$request->file('nursery_link')->getClientOriginalName();
            $filePath = $request->file('nursery_link')->storeAs('public/uploads/',$name);

            $settings->nursery_link = $name;
        }


        //dd($request);





        $settings->home_description = $request->home_description;

        $settings->home_description_video = $request->home_description_video;
        $settings->privacy_policy = $request->privacy_policy;
        $settings->terms_conditions = $request->terms_conditions;
        $settings->our_gurantee = $request->our_gurantee;

        $settings->spring_plant_link = $request->spring_plant_link;
        $settings->summer_plant_link = $request->summer_plant_link;
        $settings->fall_plant_link = $request->fall_plant_link;
        $settings->winter_plant_link = $request->winter_plant_link;

        $settings->red_plant_link = $request->red_plant_link;
        $settings->orange_plant_link = $request->orange_plant_link;
        $settings->yellow_plant_link = $request->yellow_plant_link;
        $settings->green_plant_link = $request->green_plant_link;

        $settings->blue_plant_link = $request->blue_plant_link;
        $settings->lavendar_plant_link = $request->lavendar_plant_link;
        $settings->purple_plant_link = $request->purple_plant_link;
        $settings->pink_plant_link = $request->pink_plant_link;

        $settings->magenta_plant_link = $request->magenta_plant_link;
        $settings->white_plant_link = $request->white_plant_link;

        $settings->facebook_link = $request->facebook_link;
        $settings->twitter_link = $request->twitter_link;
        $settings->instagram_link = $request->instagram_link;
        $settings->youtube_link = $request->youtube_link;

        $settings->address = $request->address;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->nursery_hours = $request->nursery_hours;

        $settings->save();

        $setting_additional_info = SettingAdditional::find($settings->id);
        $setting_additional_info->privacy_policy = $request->privacy_policy;
        $setting_additional_info->terms_conditions = $request->terms_conditions;
        $setting_additional_info->our_gurantee = $request->our_gurantee;

        $setting_additional_info->save();



        $setting_privacy_info = PrivacySettings::find($settings->id);
        $setting_privacy_info->privacy_policy = $request->privacy_policy;

        $setting_privacy_info->save();


        return redirect(url('admin/settings/1/edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminAboutusImageProcessor($id,Request $request) {

        if(!empty($request->file('file'))) {
            $property_img_info = Setting::find($id);

            $request->validate([
                'file' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
            ]);

            $path = $request->file('file');

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            $filename = str_replace($healthy, $yummy, $path->getClientOriginalName());


            $dir = public_path('img/aboutus/thumb/' . $request->id);

            if(!is_dir($dir)) {
                File::makeDirectory($dir);
            }
            $dir = public_path('img/aboutus/large/' . $request->id);
            if(!is_dir($dir)) {
                File::makeDirectory($dir);
            }

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/aboutus/thumb/' .$request->id.'/'. $filename));

            $lg_image_resize = Image::make($path->getRealPath());
            $lg_image_resize->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $lg_image_resize->save(public_path('img/aboutus/large/' .$request->id.'/'. $filename));



            $arr = array();
            $garden_themes_img_info = Setting::find($id);
            if (!empty($garden_themes_img_info->about_us_images) && ($garden_themes_img_info->about_us_images != 'null')) {
                $arr = json_decode($garden_themes_img_info->about_us_images);
            }
            array_push($arr, $filename);

            $garden_themes_img_info->about_us_images = json_encode($arr);
            $garden_themes_img_info->save();
        }
        else if($request->ac == 'delete') {

            $garden_themes_img_info = Setting::where('id', $request->id)->firstOrFail();

            $arr = array();
            $arr = json_decode($garden_themes_img_info->about_us_images);


            if(($key = array_search($request->fn, $arr)) !== false) {
                unset($arr[$key]);
                $foo2 = array_values($arr);
            }

            unlink(public_path('img/aboutus/thumb/' .$request->id.'/'. $request->fn));
            unlink(public_path('img/aboutus/large/' .$request->id.'/'. $request->fn));

            $garden_themes_img_info->about_us_images = json_encode($foo2);
            $garden_themes_img_info->save();

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

            $garden_themes_img_info = Setting::find($request->id);
            $garden_themes_img_info->about_us_images = json_encode($arr);
            $garden_themes_img_info->save();
        }
        else {

            $garden_themes_img_info = Setting::find($request->id);

            //dd($garden_themes_img_info);

            $arr = array();
            $arr = json_decode($garden_themes_img_info->about_us_images);

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            if(!empty($arr)) {
                $result = array();
                foreach($arr as $ar) {
                    //if(filesize("../media/property/".$ar)>1) {
                    $ar = str_replace($healthy, $yummy, $ar);
                    $obj = array();
                    $obj['name'] = $ar;
                    $obj['size'] = filesize(public_path('img/aboutus/thumb/' .$request->id.'/'. $ar));
                    //$obj['src'] = url('img/product/large/' .$request->id.'/'. $ar);

                    $result[] = $obj;
                    //}
                }
            }
            //dd($result);

            //header('Content-type: text/json');
            //header('Content-type: application/json');
            //return json_encode($result, JSON_FORCE_OBJECT);
            return $result;
        }

    }
}
