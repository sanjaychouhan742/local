<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroll;
use App\Http\Controllers\userscontroller;
use App\Http\Controllers\mycontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
/*
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

// Route::get('/user/{name}', function ($name) {
//    return view('hellow',["user"=>$name]);
// });
// Route::get("users/{user}",[userscontroller::class,'usersview']);

// Route::get("user/{id}",[usercontroll::class,'show']);

// CRUD Class Start
 Route::get("my_users",[mycontroller::class,'index']);
//   Route::get("my/{name}/{email}/{password}",[mycontroller::class,'add_user']);
//   Route::get("my/{id}/{name}/{email}/{password}",[mycontroller::class,'edit_user']);
  // Route::get("my/{id}",[mycontroller::class,'delete_user']);
// // CRUD End


// Dynamically CRUD Operation
Route::post("add_user",[mycontroller::class,'add_user']);
//Route::view("login",'get');
  Route::get("my/{id}",[mycontroller::class,'delete_user']);
   Route::get("edit_user/{id}",[mycontroller::class,'edit_user']);
   Route::post("update_user",[mycontroller::class, 'update_user']);
   // Dynamically CRUD Closed//

 //Route::get("showdata",[mycontroller::class, 'showdata']);
  Route::get("loadview",[mycontroller::class, 'loadview']);
//-------------------------------------------------------------------------//
// By Models 
// User Section of app_users//
Route::get("register",[UserController::class,'signup']);
Route::post("store",[UserController::class,'store']);
//----------------------------------------------------------------------------//
// Admin Section of app_users
Route::get("login",[Admin_controller::class,'login']);
Route::post("logincheck",[Admin_Controller::class,'logincheck']);
Route::get("showdata",[Admin_Controller::class,'showdata']);
Route::get("edit/{id}",[Admin_Controller::class,'edit']);
Route::post("Update",[Admin_Controller::class,'Update']);
Route::post("changestatus",[Admin_Controller::class,'changestatus']);


// End of Admin Section of app_users//
//---------------------------------------------------------------------------//
// File Upload Section//
Route::view('upload','upload');
Route::post("upload",[UploadController::class,'index']);
// File Upload in Database//
Route::get("image",[UploadController::class,'image_view']);
Route::post("image-add",[UploadController::class,'image_store']);


//Student Table Section {Add more function applied}//
Route::get("student",[StudentController::class,'addmore']);
Route::get("stu_view",[StudentController::class,'stu_view']);
Route::post("insert_students_marks",[StudentController::class,'insert_students_marks']);

//-----Library Downloads--------------//
Route::get('generate-pdf', [StudentController::class, 'generatePDF']);

//-------Session----------//

Route::view('loginuser','loginuser');
Route::view('profile','profile');
Route::get('/logout', function(){
if (session()->has('name')) {
	session()->pull('name',null);
}
return redirect('loginuser');
});

Route::get('/loginuser', function(){
if (session()->has('name')){
	return redirect('profile');

}

return view('loginuser');
});
Route::post("userss",[StudentController::class,'userlogin']);


//------------products Table Section(Multi step form)-----------------------//

Route::get("products",[ProductController::class,'products'])->name('products');

Route::get("create_step_one",[ProductController::class,'create_step_one'])->name('create_step_one');
Route::post("create_step_one",[ProductController::class,'create_step_one_post'])->name('create_step_one_post');

Route::get("create_step_two",[ProductController::class,'create_step_two'])->name('create_step_two');
Route::post("create_step_two",[ProductController::class,'create_step_two_post'])->name('create_step_two_post');

Route::get("create_step_three",[ProductController::class,'create_step_three'])->name('create_step_three');
Route::post("create_step_three",[ProductController::class,'create_step_three_post'])->name('create_step_three_post');
Route::post("modalupdate",[ProductController::class,'modalupdate']);
Route::post("deleteProduct",[ProductController::class,'deleteProduct']);

//---------------------Datatable{Library}---------------------------------//
Route::get("product_datatable",[ProductController::class,'product_datatable']);

//-------------------route middleware-----------------------------------//

Route::view('noeccess','noeccess');
Route::view('home','home')->middleware('routes');
Route::view('nouser','nouser');



  //--------------Group Middleware With Login Function--------------------//
 Route::view('loginmamber','loginmamber');

Route::group(['middleware'=>['login']], function(){

Route::post("submit",[Admin_Controller::class,'submit']);
Route::get("dasboard",[Admin_Controller::class,'dasboard']);
});

//-------------------------join---------------------------------------//
Route::get("joins",[Admin_Controller::class,'tab']);

//--------------------One to One relation-----------------------------------//
Route::get("oneRelation",[Admin_Controller::class,'oneRelation']);
//-------------------End of One to One relation-----------------------------------//

//-------------------Belongsto--------------------------------------//
Route::get("belongsto",[Admin_Controller::class,'belongsto']);
//-------------------End of Belongsto--------------------------------------//

//---------------------DatePicker-------------------------------------//

Route::get("datepicker",[Admin_Controller::class,'datepicker']);

//-------------------End Of Datepicker------------------------------------//

//--------------------Google Calender----------------------------//

Route::get("calender",[Admin_Controller::class,'calender']);

//--------------------end of google calender------------------------------//