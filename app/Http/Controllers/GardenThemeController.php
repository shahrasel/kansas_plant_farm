<?php

namespace App\Http\Controllers;

use App\Models\GardenTheme;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class GardenThemeController extends Controller
{
    public function frontGardenIdeas() {
        $garden_theme_lists = GardenTheme::orderBy('id', 'DESC')->get();

        //dd($garden_theme_lists);
        return view('garden_theme.allGardenThemes', [
            'garden_theme_lists' => $garden_theme_lists
        ]);
    }

    public function adminIndex(Request $request) {

        $garden_theme_lists = DB::table('garden_themes')
            ->select('id','title','images','created_at')->orderBy('id', 'DESC')->paginate(20);


        //dd($product_lists);

        return view('admin.garden_theme.allGardenThemes', [
            'garden_theme_lists' => $garden_theme_lists
        ]);
    }

    public function adminGardenThemeImageProcessor($id,Request $request) {

        //$property_img_info = Product::find($id);

        if(!empty($request->file('file'))) {
            $property_img_info = GardenTheme::find($id);

            $request->validate([
                'file' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
            ]);

            $path = $request->file('file');

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            $filename = str_replace($healthy, $yummy, $path->getClientOriginalName());


            $dir = public_path('img/garden_theme/thumb/' . $request->id);

            if(!is_dir($dir)) {
                File::makeDirectory($dir);
            }
            $dir = public_path('img/garden_theme/large/' . $request->id);
            if(!is_dir($dir)) {
                File::makeDirectory($dir);
            }

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/garden_theme/thumb/' .$request->id.'/'. $filename));

            $lg_image_resize = Image::make($path->getRealPath());
            $lg_image_resize->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $lg_image_resize->save(public_path('img/garden_theme/large/' .$request->id.'/'. $filename));



            $arr = array();
            $garden_themes_img_info = GardenTheme::find($id);
            if (!empty($garden_themes_img_info->images) && ($garden_themes_img_info->images != 'null')) {
                $arr = json_decode($garden_themes_img_info->images);
            }
            array_push($arr, $filename);

            $garden_themes_img_info->images = json_encode($arr);
            $garden_themes_img_info->save();
        }
        else if($request->ac == 'delete') {

            $garden_themes_img_info = GardenTheme::where('id', $request->id)->firstOrFail();

            $arr = array();
            $arr = json_decode($garden_themes_img_info->images);


            if(($key = array_search($request->fn, $arr)) !== false) {
                unset($arr[$key]);
                $foo2 = array_values($arr);
            }

            unlink(public_path('img/garden_theme/thumb/' .$request->id.'/'. $request->fn));
            unlink(public_path('img/garden_theme/large/' .$request->id.'/'. $request->fn));

            $garden_themes_img_info->images = json_encode($foo2);
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

            $garden_themes_img_info = GardenTheme::find($request->id);
            $garden_themes_img_info->images = json_encode($arr);
            $garden_themes_img_info->save();
        }
        else {

            $garden_themes_img_info = GardenTheme::find($request->id);

            //dd($garden_themes_img_info);

            $arr = array();
            $arr = json_decode($garden_themes_img_info->images);

            $healthy = array("~", "'", "!","@","#","$","%","^","&","*","(",")","-","_","+","=","{","}","[","]","|","/","\\",":",";",'"',"`","<",">",",","?"," ","=");
            $yummy   = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

            if(!empty($arr)) {
                $result = array();
                foreach($arr as $ar) {
                    //if(filesize("../media/property/".$ar)>1) {
                    $ar = str_replace($healthy, $yummy, $ar);
                    $obj = array();
                    $obj['name'] = $ar;
                    $obj['size'] = filesize(public_path('img/garden_theme/thumb/' .$request->id.'/'. $ar));
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


    public function adminCreate(Request $request) {

        return view('admin.garden_theme.addGardenTheme');

    }

    public function adminEdit(Request $request, GardenTheme $gardenTheme) {
        //dd($product);
        //$productinfo = Product::
        return view('admin.garden_theme.editGardenTheme', [
            'garden_theme' => $gardenTheme,
            //'cart_lists' => $cart_lists
        ]);

    }

    public function adminUpdate(GardenTheme $gardenTheme) {

        //$garden_theme = GardenTheme::find(\request()->get('id'));



        //GardenTheme::find(\request()->get('id'))->update($this->validateGardenTheme());
        //DB::table('garden_themes')->find(\request()->get('id'))->update($this->validateGardenTheme());
        $gardenTheme->update($this->validateGardenTheme());

        return redirect(url('admin/garden-themes'));

    }

    protected function adminStore() {

        //dd($request);
        //$product->plant_id_number = $request->plant_id_number;
        /*$garden_theme->title = $request->title;
        $garden_theme->description = $request->description;

        //$garden_theme->images = $request->images;
        $garden_theme->save();*/

        $inserted_data = GardenTheme::create($this->validateGardenTheme());

        return redirect(url('/admin/garden-themes/'.$inserted_data->id.'/edit'));

    }

    public function destroy(GardenTheme $gardenTheme)
    {
        $gardenTheme->delete();
        return redirect(url('admin/garden-themes'));
    }

    protected function validateGardenTheme() {
        return \request()->validate([
            'title'=>['required'],
            'description'=>[]
        ]);
    }
}
