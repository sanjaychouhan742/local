<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\my_user;
class mycontroller extends Controller
{
    //
    function index(){

    	$users = DB::select("select * from my_users");
    	return view('name',['users'=>$users]);
    }

    // function add_user($name,$email,$password){

    // 	DB::insert("insert into my_users(name,email,password) values('".$name."','".$email."','".$password."')");
    // 	echo "insert successfully.";
    // }

    // function edit_user($id,$name,$email,$password){

    // 	DB::update("update my_users set name= '".$name."',email = '".$email."', password = '".$password."' where id = '".$id."'");
    //     echo "Update successfully.";

    // }

    // function delete_user($id){

    // 	 DB::delete("delete from my_users where id = '".$id."'");
    // 	 echo "Delete is successfully";
    // }

   function add_user(Request $req){
       DB::table('my_users')->insert([

        'name' => $req->input('name'),
        'email'=> $req->input('email'),
        'password' => $req->input('password'),
       ]);
   }

   function delete_user($id){

  DB::table('my_users')->where('id', '=', $id)->delete();

   }

   function edit_user($id){
   	$user = DB::table('my_users')->where('id', '=', $id)->first();

return view('edit',['user'=>$user]);
}

 function update_user(Request $req){

 	DB::table('my_users')->where('id',$req->input('id'))->update([

        'name' => $req->input('name'),
        'email'=> $req->input('email'),
        'password' => $req->input('password'),
       ]);
 }

 function showdata(){

 	return my_user::all();
 }

 function loadview(){

 	return view("layouts/app");
 }

}


