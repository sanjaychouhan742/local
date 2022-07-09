@extends('layouts/app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
       <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>

   @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}/td>
      <td>{{ $user->password}}</td>
      <td> 

        <a href="{{ url('/edit/'.$user->id) }}" class="btn btn-primary">edit</a>
        <a href="{{ url('//'.$user->id) }}" class="btn btn-primary">delete</a>

        @if($user->status==1)
        <button type="button" class="btn btn-danger" onclick="myfunction('{{ $user->id}}','0',this)">Deactivate</button>
        

        @else

        <button type="button" class="btn btn-primary" onclick="myfunction('{{ $user->id}}','1',this)">Activate</button>

        @endif
      
    </td>
    </tr>

    @endforeach 
   
   </tbody>
 </table>

 @endsection

 

 <script type="text/javascript">
   
 function myfunction(user_id,status_code,el) {
 $.ajax({

            url : "{{ url('/changestatus')}}",

            type: "POST",

            data : 
            {
            "status":status_code,
            "user_id":user_id,
           "_token":"{{csrf_token()}}",

          },

            

            success: function(data){
              if (status_code == 0) {
                $(el).html("Activate");
                 $(el).attr('class', 'btn btn-primary');
              }

             else{
              $(el).html("Deactivate");
              $(el).attr('class', 'btn btn-danger');

             }
               
            },

            error: function(xhr, status, error){

            }
             

        });
   


  document.getElementById("demo").style.color = "red";
 }


 </script>