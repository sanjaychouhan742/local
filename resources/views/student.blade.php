@extends('layouts/app')
@section('content')
<form name="Add_Name" id="Add_Name" method="POST" action="">

<select type="text" class="form-select" aria-label="Default select example"           name="name" id="name">
  
  	 @foreach ($stu as $student)
	<option value="{{$student->id}}"> 
	{{ $student->name }}

	</option>

	@endforeach 

  
 
</select>

<div class="row">
  <div class="col">
  	<select name="subject[]" class="form-select" aria-label="Default select example">
  <option selected>Subjects</option>
  <option value="1">English </option>
  <option value="2">Mathematics</option>
  <option value="3">Physics</option>
  <option value="4">Chemistry</option>
  <option value="5">Biology</option>
  <option value="6">History</option>
</select>
     
  </div>
  <div class="col">
    <input type="text" name="marks[]" class="form-control" placeholder="Marks" aria-label="marks">
  </div>
  <div class="col">
  	<a class="btn btn-primary" href="#" role="button" id="add">Add</a>

  	</div>
</div>
<div id="dynamic_field">
	</div>
	<div>
		<input class="btn btn-primary" name="submit" id="submit" type="button" value="Submit">
	</div>
</form>
 

<script type="text/javascript">
	 $(document).ready(function(){
	 	var i =1;
 $('#add').click(function(){
 
 i++;
 $('#dynamic_field').append('<div id="row'+i+'" class="row"><div class="col"><select class="form-select" name="subject[]" aria-label="Default select example"><option selected>Subject</option><option value="1">English</option><option value="2">Mathematics</option><option value="3">Physics</option><option value="4">Chemistry</option><option value="5">Biology</option><option value="6">History</option></select></div><div class="col"><input type="text" class="form-control" placeholder="Marks" name="marks[]" aria-label="Last name"></div><div class="col"><a class="btn btn-primary btn_remove" name= "remove" id="'+i+'" href="#" role="button" id="add">Remove</a></div></div>');

 });
$(document).on('click','.btn_remove', function(){
	

 var button_id = $(this).attr("id");
 $('#row'+button_id+'').remove();
 });

 $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:"{{url('/insert_students_marks')}}",  
                method:"POST",  
                data:$('#Add_Name').serialize(),
                type:'json',
               success:function(data){

               }
               }); 
     });
   });
 </script>
 @endsection