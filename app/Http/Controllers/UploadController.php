<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\image;

class UploadController extends Controller
{
    //
    function index(Request $req){

    	//return $req->file('file')->store('img');

    	
            foreach($req->file('file') as $file)
            {
                //$name = time().'.'.$file->extension();
                ///$file->move(public_path().'/files/', $name);  
              //  $data[] = $name; 
              $image_path = $file->store('img');
             

            }
    }

    function image_view(){
    	return view("images/image_view");
    }

    function image_store(Request $req){

    	$image = new image;

    	if ($req->hasfile('file')) {
    		$file = $req->file('file');
    		$extension = $file->extension();
    		$filename = time()."_".rand().'.'.$extension;
    		$file->move('uploads/image/',$filename);
    		$image->image = $filename;
    	}
    	$image->save();
    }
}
