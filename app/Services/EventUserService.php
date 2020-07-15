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

     public function UpdateEventUser($param,$user_id) {
            $event = EventUser::where('user_id','=',$user_id)->first();
            if($event['is_presenter'] == 1){
                $newDetail=$event['is_presenter'] = 0;
                $event->update(['is_presenter' => $newDetail]);
            }
            elseif($event['is_presenter'] == 0){

                $newDetail=$event['is_presenter'] = 1;
                $event->update(['is_presenter' => $newDetail]);
        }
            if($event['is_moderator'] == 2){
                            $newDetail=$event['is_moderator'] = 0;
                            $event->update(['is_moderator' => $newDetail]);
                    }
            elseif($event['is_moderator'] == 0){
                    $newDetail=$event['is_moderator'] = 2;
                    $event->update(['is_moderator' => $newDetail]);
        }
        return $event;
    }

//     public function UpdateEventModerator($param,$user_id) {
//              $user = EventUser::where('user_id','=',$user_id)->first();
//         if($user['is_moderator'] == 2){
//                 $newDetail=$user['is_moderator'] = 0;
//                 $user->update(['is_moderator' => $newDetail]);
//         }
//         elseif($user['is_moderator'] == 0){
//                 $newDetail=$user['is_moderator'] = 2;
//                 $user->update(['is_moderator' => $newDetail]);
//     }
// }

}

