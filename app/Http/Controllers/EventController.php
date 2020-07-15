<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlueJeans;
use App\EventUser;
use App\Services\EventUserService;
use App\Http\Resources\UserEventResource;
use App\Http\Requests\EventUserRequest;
use App\SpaceUser;
use Auth;
use DB;
use App\Http\Resources\EventResource;
class EventController extends Controller
{
    public function __construct(){
        $this->service=EventUserService::getInstance();
    }

    public function showEvents()
    {
        try{
            $event=BlueJeans::take(10)->get();
            return  EventResource::collection($event)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);
        }
       
    }

    public function getUserEvent($event_uuid){
        try{
            $user_id=Auth::user()->id;
            $showUserEvent=EventUser::where([
                        ['user_id',$user_id],
                        ['event_uuid',$event_uuid]
                    ])->get();
            return  UserEventResource::collection($showUserEvent)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);
        }
    }

    public function eventNewUser(EventUserRequest $request)
    {
        // DB::connection('tenant')->beginTransaction();
        DB::beginTransaction();

        try{


            $param =[
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];

           $this->service->AddEventUser($param);
        //    DB::connection('tenant')->commit();
           DB::commit();

        }catch(\Exception $e){
            // DB::connection('tenant')->rollback();
            DB::rollback();

            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }     
    }


    public function removeUserEvent($user_id,$event_uuid){
        try{

            $showEvent=EventUser::where([['user_id',$user_id],
            ['event_uuid',$event_uuid]]);

            $showEvent->delete();
           
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        } 
    }

// public function showSpaceUser($space_uuid){
//     $user_id= 1;
//         $checkUser=SpaceUser::where([['user_id',$user_id],['space_uuid',$space_uuid]])->first();
//        if(!$checkUser){  
//         return FALSE;     
//        }
//        return TRUE;
// }    


}

