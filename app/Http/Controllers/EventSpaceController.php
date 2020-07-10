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
           $this->service=EventSpaceService::getInstance();;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvent($event_id)
    {
        try{
            $event=EventSpace::get()->where('event_uuid','=',$event_id);
            return  EventSpaceResource::collection($event)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);
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
        // DB::connection('tenant')->beginTransaction();
        DB::beginTransaction();

        try{
            $param =[
                'space_name'=>$request->space_name,
                'space_short_name'=>$request->space_short_name,
                'space_mood'=>$request->space_mood,
                'max_capacity' => $request->max_capacity,
                'space_image_url'=>$request->space_image_url,
                'space_icon_url'=>$request->space_icon_url,
                'is_vip_space'=>$request->is_vip_space,
                'opening_hours'=>$request->opening_hours,
                'tags'=>$request->tags,
            ];
          $event= $this->service->create($param);
        //   DB::connection('tenant')->commit();
          DB::commit();

        }catch(\Exception $e){
            // DB::connection('tenant')->rollback();
            DB::rollback();

            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }
            return new EventSpaceResource($event);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventSpaceRequest $request, $space_uuid)
    {
        // DB::connection('tenant')->beginTransaction();
        try{
            $param =[
                'space_name'=>$request->space_name,
                'space_short_name'=>$request->space_short_name,
                'space_mood'=>$request->space_mood,
                'max_capacity' => $request->max_capacity,
                'space_image_url'=>$request->space_image_url,
                'space_icon_url'=>$request->space_icon_url,
                'is_vip_space'=>$request->is_vip_space,
                'opening_hours'=>$request->opening_hours,
                'tags'=>$request->tags,
            ];
        $update=$this->service->update($param,$space_uuid);
        // DB::connection('tenant')->commit();
        }catch(\Exception $e){
            // DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

            
            return new EventSpaceResource($updated);
        }
       
    }
}


