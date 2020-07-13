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
    // dd($param);
        $updated = EventSpace::where('space_uuid','=',$space_uuid)->update(['space_name'=>$param['space_name'],
        'space_short_name'=>$param['space_short_name'],'space_mood'=>$param['space_mood'],'max_capacity'=>$param['max_capacity'],
        'is_vip_space'=>$param['is_vip_space'],'opening_hours'=>$param['opening_hours'],
        'tags'=>$param['tags'],'space_image_url'=>$param['space_image_url'],'space_icon_url'=>$param['space_icon_url']]);

        if (!$updated){
            throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown
        }
        else{
            return $updated;
        }
    }

    public function  getEventSpaces($event_id){

        $showevent=EventSpace::get()->where('event_uuid','=',$event_id);
        
        if (!$showevent){
            throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown
        }
        else{
            return $showevent;
        }
    }
}



