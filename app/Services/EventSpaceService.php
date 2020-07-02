<?php
namespace App\Services;
use App\EventSpace;

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
        return $event;
    }

    public function update($param,$id) { 
        $event = EventSpace::where('id','=',$id)->first()->update($param);
        if (!$event){
        throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown

        }
        else{
           return $event;

        }
        return $event;
    }
}
