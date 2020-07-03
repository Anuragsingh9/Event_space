<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EventUserRequest;
use App\Services\EventUserService;

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
                'user_id'=>Auth::user()->id,
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
}
