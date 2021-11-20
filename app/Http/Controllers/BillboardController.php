<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BillboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billboards = Billboard::orderby('id','Desc')->paginate(20);
        //dd($events);
        return view('admin.billboard.allBillboards', [
            'billboards' => $billboards
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.billboard.addBillboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if(!empty($request->file('image'))) {
            $path = $request->file('image');

            $filename = $path->getClientOriginalName();

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(1400, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/billboard/' . $filename));
        }

        $billboard = new Billboard();
        $billboard->heading = $request->heading;
        $billboard->subheading = $request->subheading;
        $billboard->button_text = $request->button_text;
        $billboard->button_url = $request->button_url;


        if(!empty($filename)) {
            $billboard->image = $filename;
        }

        $billboard->save();

        return redirect(url('admin/billboards'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Billboard $billboard)
    {
        return view('admin.billboard.showBillboard',[
            'billboard_info'=>$billboard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Billboard $billboard)
    {
        return view('admin.billboard.editBillboard',[
            'billboard'=>$billboard
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
        $billboard = Billboard::find($id);
        //dd($event);

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if(!empty($request->file('image'))) {
            $path = $request->file('image');

            $filename = $path->getClientOriginalName();

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(1400, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/billboard/' . $filename));
        }


        $billboard->heading = $request->heading;
        $billboard->subheading = $request->subheading;
        $billboard->button_text = $request->button_text;
        $billboard->button_url = $request->button_url;

        if(!empty($filename)) {
            $billboard->image = $filename;
        }

        $billboard->save();

        return redirect(url('admin/billboards'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        //$billboard->delete();
        $billboard=Billboard::find($id);
        $billboard->delete();

        return redirect(url('admin/billboards'));
    }
}
