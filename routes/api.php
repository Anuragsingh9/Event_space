<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('update/registrationform', 'CocktailEventController@updateRegistrationFormDetail');
Route::post('newUser/eventuser','EventUserController@eventNewUser');
Route::post('newUser/UpdateEventUserPresenter','EventUserController@UpdateEventUserPresenter');
Route::post('newUser/UpdateEventModerator','EventUserController@UpdateEventUserModerator');
Route::get('newUser/showUserEvent','EventUserController@showUserEvents');

// Route::post('eventStore','EventSpaceController@store');
// Route::post('eventStore/create/{id}','EventSpaceController@store');
Route::post('eventStore','EventSpaceController@store');


Route::post('eventStore/update/{id}','EventSpaceController@update');
Route::get('eventStore/show/{event_id}','EventSpaceController@showEvent');

Route::post('addorupdate','CocktailEventController@updateRegistrationFormDetail');