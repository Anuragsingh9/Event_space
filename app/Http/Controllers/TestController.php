<?php

namespace App\Http\Controllers;
use pebibits\validation\Rules\Alphanumeric;
use App\Http\Controllers\Controller;
// use pebibits\validation\Requests\Formvalidate;
use App\Http\Requests\Participants;



use Illuminate\Http\Request;

class TestController extends Controller
{

    public function show(){
        return view('forms');
        // dd("ok");
    }
    public function storee(Participants $request)
    {

        return $request->all();
    }
}
 
// table name: 
// soft delete.
// use in folder traits and file