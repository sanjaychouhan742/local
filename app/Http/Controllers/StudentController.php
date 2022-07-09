<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\student;
use App\Models\student_mark;
use PDF;

class StudentController extends Controller
{
    //
    // function addmore(){

    // 	return view('student');
    // }

    function insert_students_marks(Request $req){
    $subject = $req->input('subject');
    $marks = $req->input('marks');
    $name= $req->input('name');
    foreach ($subject as $key => $value) {
    	student_mark::create([
    		'rollnumber'=>$name,
    		'marks'=>$marks[$key],
    
    
]);
    }

    }

  

    function stu_view(){
        $stu = student::select('id','name')->get();
    	return view('student',['stu'=>$stu]);
    	 }

 public function generatePDF()
    {
        $data = [
           'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')

        ];
          
        $pdf = PDF::loadView('mypdf', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }

    function userlogin(Request $req){
        
       $data = $req->input('name');
       $req->session()->put('name',$data);
       return redirect('profile');

 }

}
