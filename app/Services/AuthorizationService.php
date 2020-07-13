<?php

namespace App\Services;

class AuthorizationService{
    public function isUserBelongsToEventUuid($id,$event_id){
        $details=BlueJeans::where([['user_id' == $user],
                                    ['event_id' == $event_id]
        ])->get();
    }
}