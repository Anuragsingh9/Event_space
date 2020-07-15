<?php
namespace App\Services;
use App\EventSpace;
use Auth;
use App\Http\Resources\EventSpaceResource;
use App\Http\Controllers\EventSpaceController;
class EventSpaceService {
    public static function getInstance()
    {
        static $instance = NULL;
        if (NULL === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    public function create($param) {
        
        $event = EventSpace::create($param);
        if (!$event){
            throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown

        }
        else{
            return $event;
        }
    }

    public function update($param,$space_uuid) { 
        $updated = EventSpace::where('space_uuid','=',$space_uuid)->update($param);


        if (!$updated){
            throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown
        }
        else{
            return $updated;
        }
    }

    public function  getEventSpaces($event_uuid){

        $showevent=EventSpace::get()->where('event_uuid','=',$event_uuid);
        
        if (!$showevent){
            throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown
        }
        else{
            return $showevent;
        }
    }
}



