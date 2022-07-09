@extends('layouts/app')
@section('content')

<form action="Update" method="POST">
	@csrf
	
    
    <input type="hidden" class="form-control" id="id" value="{{$users->id}}">
  
	 <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" value="{{$users->name}}">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->email}}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" value="{{$users->password}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>







@endsection