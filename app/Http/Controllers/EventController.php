<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlueJeans;
use App\Http\Resources\EventResource;
class EventController extends Controller
{
    public function showEvents()
    {
        try{
            $event=BlueJeans::take(10)->get();
            return  EventResource::collection($event)->additional(['status'=>true]);
        }catch(\Exception $e){
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 500);
        }
       
    }
}
