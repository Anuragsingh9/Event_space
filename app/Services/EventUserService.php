<?php
namespace App\Services;
use App\EventUser;

class EventUserService {
    public static function getInstance()
    {
        static $instance = NULL;
        if (NULL === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    public function AddEventUser($param) {
        $user = EventUser::create($param);
        if (!$user){
        throw new Exception();  // to throw the error instead of null so proper message can be shown// to throw exception so that proper msg can be shown

        }
        else{
           return $user;

        }
        return $user;
    }

}
