<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App_User;
class UserController extends Controller
{
    // Models Crud Method

    function signup()
    {
    	return view("user-signup");
    	}

    function store(Request $req){
		$req->validate([
	        'name'=>'required|min:4|max:25',
	        'email'=>'required|unique:app_users',
	        'password'=>'required',
		],
		[
			// message coustamization section//
			'name.required' => 'Please enter your name',
			'email.required' => 'Please enter your email address',
			'email.unique' => 'Please enter other email address',
			'password.required' => 'Please enter your password',
			'name.min' => 'Please enter 4 characters name ',
			'name.max' =>  'Not enter over 25  characters name ',
			// message coustamization section end//
		]);

    	$user = App_User::create([
		   	'name' => $req->input('name'),
	        'email'=> $req->input('email'),
	        'password' => $req->input('password')
	   ]);
    	if ($user) {
    			return back()->with('success','Item created successfully!');
    	}
    	else{
    			return back()->with('error','error in form!');
    	}

    	}
    

}

