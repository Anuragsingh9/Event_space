<?php

namespace App\Http\Controllers;
use App\Http\Requests\EventSpaceRequest;
use App\Http\Requests\EventSpaceUpdateRequest;
use App\Http\Resources\EventSpaceResource;
use Illuminate\Http\Request;
use App\EventSpace;
use Ramsey\Uuid\Uuid;
use DB;
// use Auth;
use Illuminate\Support\Facades\Auth;
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
    public function showEvent($event_uuid)
    {
        try{
            $event= $this->service->getEventSpaces($event_uuid);
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
          return new EventSpaceResource($event);  

        }catch(\Exception $e){
            // DB::connection('tenant')->rollback();
            DB::rollback();

            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventSpaceUpdateRequest $request, $space_uuid)
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
        return new EventSpaceResource($update);

        }catch(\Exception $e){
            // DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

            
        }
       
    }
}


