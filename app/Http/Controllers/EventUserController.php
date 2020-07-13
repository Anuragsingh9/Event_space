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
        $this->service=EventUserService::getInstance();
    }
    public function eventNewUser(Request $request)
    {
        DB::connection('tenant')->beginTransaction();
        try{


            $param =[
                'event_id'=>$request->event_id,
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];

           $this->service->AddEventUser($param);
           DB::connection('tenant')->commit();
        }catch(\Exception $e){
            DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }

        
         
    }


    public function UpdateEventUserPresenter(Request $request)
    {
        DB::connection('tenant')->beginTransaction();
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
           DB::connection('tenant')->commit();
        }catch(\Exception $e){
            DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }      
    }
    

    public function UpdateEventUserModerator(Request $request)
    {
        DB::connection('tenant')->beginTransaction();
        try{
            $param =[
                'event_id'=>$request->event_id,
                'user_id'=>$request->user_id,
                'is_presenter'=>$request->is_presenter,
                'is_moderator'=>$request->is_moderator,
                'state' => $request->state,
            ];
           $this->service->UpdateEventModerator($param,$request->user_id);
           DB::connection('tenant')->commit();
        }catch(\Exception $e){
            DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);
        }  
    }

    public function showUserEvents(){
        try{
            $showEvent=EventUser::get();
            return  UserEventResource::collection($showEvent)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);

        }  
    }

    public function check(){
        $user=Auth::user()->id;
        dd($user);
    }
}


