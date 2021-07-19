<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderby('id','Desc')->paginate(20);
        //dd($events);
        return view('admin.event.allEvents', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.addEvent');
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
            'name' => ['required'],
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if(!empty($request->file('image'))) {
            $path = $request->file('image');

            $filename = $path->getClientOriginalName();

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/event/' . $filename));
        }

        $event = new Event();
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->price = $request->price;
        $event->description = $request->description;

        if(!empty($filename)) {
            $event->image = $filename;
        }

        $event->save();

        return redirect(url('admin/events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event.showEvent',[
            'event_info'=>$event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.editEvent',[
            'event'=>$event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        //echo $request->id;
        $event = Event::find($id);
        //dd($event);

        $request->validate([
            'name' => ['required'],
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:20480',
        ]);

        if(!empty($request->file('image'))) {
            $path = $request->file('image');

            $filename = $path->getClientOriginalName();

            $thumb_image_resize = Image::make($path->getRealPath());

            $thumb_image_resize->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $thumb_image_resize->save(public_path('img/event/' . $filename));
        }


        //$event = new Event();
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->price = $request->price;
        $event->description = $request->description;

        if(!empty($filename)) {
            $event->image = $filename;
        }

        $event->save();

        return redirect(url('admin/events'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventController $event)
    {
        //
    }
}
