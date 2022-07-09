<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App_User;
use App\Models\company;
use Illuminate\Support\Facades\DB;
class Admin_controller extends Controller
{
    //
    function login(){

 return view("login");

    }

    function logincheck(Request $req){

    	$req->validate([
	        'email'=>'required',
	        'password'=>'required',
		],
		[
			// message coustamization section//
			'email.required' => 'Please enter your email address',
			'password.required' => 'Please enter your password',
			// message coustamization section end//
		]);

		   $user = App_User::where([
            'email'=> $req->input('email'),
	        'password' => $req->input('password')
        ])->first();
		 
		 if ($user) {
		 	
		 if ($user->id == 1) {
		 	echo "Admin";
		 }

		 else {

		 	echo "Users";
		 }


		 }

    }

    function showdata(){

    	$users = App_User::where('id','!=', 1)->get();
    	return view('adminview',['users'=>$users]);
    }

   function edit($id){

   	$users = App_User::find($id);
   	return view('editform',['users'=>$users]);
   }
    
     function Update(Request $req){
     	$users = App_User::update([
     		'name' => $req->input('name'),
     		'email' => $req->input('email'),
     		'password' => $req->input('password')


     	]);
     }

    function changestatus(Request $req){

    $users = App_User::find($req->user_id);
    $users->status = $req->status;
    $users->save();
    echo "Success";
     }

     function submit(Request $req){

        

           

       }


function dasboard(Request $req){

        echo "Users";

           

       }

//--------------------------Joins----------------------------------------------//

function tab(){

    return DB::table('app_users')
               ->join('company','app_users.id', '=' ,'company.users_id')
               ->select('app_users.*','company.id as cid','company.name as cname')
               ->where('app_users.id',1)
               ->get();

       }
//-------------------------------End of Joins----------------------------------//

//----------------------------One to One Relation-----------------------------//   
function oneRelation(){
    return App_User::find(1)->company; 
    
}
//-------------------------End of One to One Relation-----------------------------//

//-------------------------belongsto Relation-----------------------------//
function belongsto(){

  $belong = company::find(11);
  // echo "<pre>";
  // print_r($belong);

  return $belong->user; 
}
//------------------------End of belongsto Relation-----------------------------//

//-----------------------Date Picker------------------------------------------//

 function datepicker(){

  return view('datepicker');
 }
//-----------------------End of DAte Picker-----------------------------------//

function calender(){

  return view('googlecalender');
}

}