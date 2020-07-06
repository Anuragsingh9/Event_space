<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EventUserRequest;
use App\Services\EventUserService;
use App\EventUser;
use App\Http\Resources\UserEventResource;
class EventUserController extends Controller{
    public function __construct(){
        $this->service=new EventUserService();
    }
    public function eventNewUser(Request $request)
    {
        $success = true;
        DB::beginTransaction();
        try{

            EventUserService::getInstance();

            $param =[
                'event_id'=>$request->event_id,
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];

           $this->service->AddEventUser($param);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $success = false;
        }

        if($success){
            return "Record Created";
        }
    
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Created']);
        }
         
    }


    public function UpdateEventUserPresenter(Request $request)
    {
        $success = true;
        DB::beginTransaction();
        try{

            EventUserService::getInstance();

            $param =[
                'event_id'=>$request->event_id,
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];
           $this->service->UpdateEventUser($param,$request->user_id);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $success = false;
        }

        if($success){
            return "Record Created";
        }
    
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Created']);
        }
         
    }
    

    public function UpdateEventUserModerator(Request $request)
    {
        $success = true;
        DB::beginTransaction();
        try{

            EventUserService::getInstance();

            $param =[
                'event_id'=>$request->event_id,
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];
           $this->service->UpdateEventModerator($param,$request->user_id);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            $success = false;
        }
        if($success){
            return "Record Created";
        }
        else{
            return response()->json(['status' => false, 'message' => 'Event Not Created']);
        } 
    }

    public function showUserEvents(){
        $showEvent=EventUser::find(2);
        return  UserEventResource::collection($showEvent);
    }


}
