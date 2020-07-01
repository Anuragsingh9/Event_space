<?php

namespace App\Http\Controllers;
use App\Http\Requests\EventSpaceRequest;
use Illuminate\Http\Request;
use App\EventSpace;
use Ramsey\Uuid\Uuid;
use DB;
class EventSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=EventSpace::get();
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
    public function store(EventSpaceRequest $request)
    {
        $success = true;
        DB::beginTransaction();
        try{
            $event = EventSpace::create([
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
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $success = false;
        }

        if($success){
            return $event;
        }
    
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Created']);
        }
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        try{
            $event = EventSpace::where('id','=', $request->id)->first();
            return $event;
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'No Event Found']);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        try{
            $event = EventSpace::where('id','=', $request->id)->first();
            return view('update',compact('event'));
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'No Event Found']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventSpaceRequest $request, $id)
    {
        try{
            $event =  EventSpace::where('id','=',$id)->first();
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
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'Event Not Updated']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $event = EventSpace::where('id','=',$id)->first();
            $event->delete();
           return $event;
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => 'Event Not Deleted']);
        }
       
    }
}

