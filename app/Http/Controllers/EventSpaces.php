<?php

namespace App\Http\Controllers;
use App\Http\Requests\EventSpace;
use Illuminate\Http\Request;
use App\Event;
use Ramsey\Uuid\Uuid;
class EventSpaces extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=Event::get();
        return $event;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventSpace $request)
    {
        $event = Event::create([
            'space_uuid'=>Uuid::uuid4(),
            'space_name'=>$request->space_name,
            'space_short_name'=>$request->space_short_name,
            'space_mood'=>$request->space_mood,
            'max_capacity' => $request->max_capacity,
            'space_image_url'=>$request->space_image_url,
            'space_icon_url'=>$request->space_icon_url,
            'is_vip_space'=>$request->is_vip_space,
            'opening_hours'=>$request->opening_hours,
            'event_id'=>$request->event_id,
            'tags'=>$request->tags,
        ]);
        return $event;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $event = Event::where('id','=', $request->id)->first();
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $event = Event::where('id','=', $request->id)->first();
        return view('update',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventSpace $request, $id)
    {
        $event =  Event::where('id','=',$id)->first();
        $event->update([
            'space_uuid'=>Uuid::uuid4(),
            'space_name'=>$request->space_name,
            'space_short_name'=>$request->space_short_name,
            'space_mood'=>$request->space_mood,
            'max_capacity' => $request->max_capacity,
            'space_image_url'=>$request->space_image_url,
            'space_icon_url'=>$request->space_icon_url,
            'is_vip_space'=>$request->is_vip_space,
            'opening_hours'=>$request->opening_hours,
            'event_id'=>$request->event_id,
            'tags'=>$request->tags,
        ]);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::where('id','=',$id)->first();
                 $event->delete();
                return $event;
    }
}
