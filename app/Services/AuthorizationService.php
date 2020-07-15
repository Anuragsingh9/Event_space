<?php

namespace App\Services;
use Auth;
use App\SpaceUser;
class AuthorizationService{
    public function isUserBelongsToEvent($space_uuid) {
        $user_id=Auth::user()->id;
        $checkUser=SpaceUser::where([['user_id',$user_id],['space_uuid',$space_uuid]])->first();
        if(!$checkUser){  
         return FALSE;     
        }
        return TRUE;
            
    }
}


