
$(document).ready(function(){

 function adminviewlist(){

$.ajax({

 type: 'GET',
 url: '/adminview/viewdata',
 success:function(response){

 var response = JOSN.parse(response);
 $('.adminviewListHolder').empty();
 $('.adminviewListHolder').append('<table class="table adminviewList">
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
  </tbody>
  </table>');

   @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>{{ $user->password}}</td>
      <td> 

        @if($user->status==1)
        <button type="button" class="btn btn-danger">deactivate</button>
        

        @else

        <button type="button" class="btn btn-primary">Activate</button>

        @endif
      
    </td>
    </tr>

    @endforeach 
   
   );


 }

});

}

});



