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


Route::get('index','EventSpaces@index');
Route::get('create','EventSpaces@create');
Route::post('store','EventSpaces@store')->name('store');
Route::get('show/{id}','EventSpaces@show');
Route::get('edit/{id}','EventSpaces@edit');
Route::post('update/{id}','EventSpaces@update');
Route::get('delete/{id}','EventSpaces@destroy');






