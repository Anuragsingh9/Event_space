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
// Route::post('newUser/eventuser','EventUserController@eventNewUser');
Route::post('newUser/UpdateEventUserPresenter','EventUserController@UpdateEventUserPresenter');
Route::post('newUser/UpdateEventModerator','EventUserController@changeRole');
Route::get('newUser/showUserEvent','EventUserController@showUserEvents');
// Route::get('newUser/removeUserEvent/{user_id}/{event_id}','EventUserController@removeUserEvent');

// Route::post('eventStore','EventSpaceController@store');
// Route::post('eventStore/create/{id}','EventSpaceController@store');

// Route::group(['middleware' => ['user']], function () {
    Route::post('eventStore/update/{id}','EventSpaceController@update');
    Route::get('eventStore/show/{event_uuid}','EventSpaceController@showEvent');
    Route::post('eventStore','EventSpaceController@store')->middleware(['auth:api']);

// });


Route::post('addorupdate','CocktailEventController@updateRegistrationFormDetail');

Route::get('showEvent','EventController@showEvents');
Route::get('showUserEvents/{event_uuid}','EventController@getUserEvent');

Route::get('showSpaceUser/{space_uuid}','EventController@showSpaceUser');
Route::post('newUser/eventuser','EventController@eventNewUser');
Route::get('newUser/removeUserEvent/{user_id}/{event_id}','EventController@removeUserEvent');
