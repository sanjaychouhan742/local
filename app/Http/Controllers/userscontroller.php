<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userscontroller extends Controller
{
    //
    function usersview($user){

    	return view('name',['name'=>$user]);
    }
}
