<?php

namespace App\Http\Middleware;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Closure;
use App\BlueJeans;

class UserBelongsToEvent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    //     $user=Auth::check();

    //     $user_id=Auth::user();
    //     dd( $user);

    //     $success= BlueJeans::findOrFail($user_id);
    //     if($success){
    //         return $next($request);

    //     }else{
    //         return "No Record Found";
    //     }
    }
}
