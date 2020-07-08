<?php

namespace App\Http\Controllers;
use App\Http\Requests\EventSpaceRequest;
use App\Http\Resources\EventSpaceResource;
use Illuminate\Http\Request;
use App\EventSpace;
use Ramsey\Uuid\Uuid;
use DB;
use App\Services\EventSpaceService;
class EventSpaceController extends Controller
{
    
    public function __construct()
    {       
           $this->service=new EventSpaceService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvent($event_id)
    {
        try{
            $event=EventSpace::get()->where('event_id','=',$event_id);
            return  EventSpaceResource::collection($event)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 200);
        }
       
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
        DB::connection('tenant')->beginTransaction();
        try{
            EventSpaceService::getInstance();

            $param =[
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
            ];
          $event= $this->service->create($param);
          DB::connection('tenant')->commit();
        }catch(\Exception $e){
            DB::connection('tenant')->rollback();
            $success = false;
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 200);

        }

        if($success){
            return new EventSpaceResource($event);  
            // return EventSpaceResource::collection($event)->additional(['status'=>true]);  
        }
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Created']);
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
        $success = true;
        DB::connection('tenant')->beginTransaction();
        try{
            EventSpaceService::getInstance();
            $param =[
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
            ];
        $update=$this->service->update($param,$id);
        DB::connection('tenant')->commit();
        }catch(\Exception $e){
            DB::connection('tenant')->rollback();
            $success = false;
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 200);

            
        if($success){
            return new EventSpaceResource($update);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Updated']);
            }
        }
       
    }
}


