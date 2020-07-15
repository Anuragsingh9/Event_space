<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('index','EventSpaceController@index');
// Route::get('create','EventSpaceController@create');
// Route::post('store','EventSpaceController@store')->name('store');
// Route::get('show/{id}','EventSpaceController@show');
// Route::get('edit/{id}','EventSpaceController@edit');
// Route::post('update/{id}','EventSpaceController@update');
// Route::get('delete/{id}','EventSpaceController@destroy');

Route::get('create','BluejeansController@create');
Route::get('index','BluejeansController@index');
Route::get('create','BluejeansController@create');
Route::post('store','BluejeansController@store')->name('storee');
Route::get('show/{id}','BluejeansController@show');
Route::get('edit/{id}','BluejeansController@edit');
Route::post('update/{id}','BluejeansController@update');
Route::get('delete/{id}','BluejeansController@destroy');

Route::post('newUser/eventuser','EventUserController@eventNewUser');
Route::get('newUser/index','EventUserController@index');
Route::post('newUser/UpdateEventUser','EventUserController@UpdateEventUserDetails')->name('update');
Route::get('check','EventUserController@check');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Get event space by uuid
// Service: update pass param directly
// Event User Controller
// -> merge to controller
// -> made changeRole method inside one method in controller and service
// -> create validation for that
// -> return event user resource
// -> made getUserEvent method to get name of the user Event

// created isUserBelongsToEvent method