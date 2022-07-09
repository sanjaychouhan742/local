@extends('layouts.app')
@section('content')
<h1>Update Users</h1>
<form action="/update_user" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$user->id}}">
	<input type="text" name="name" value="{{$user->name}}"><br><br>
    <input type="text" name="email"  value="{{$user->email}}"><br><br>
    <input type="password" name="password"  value="{{$user->password}}"><br><br>
    <button type="submit">Update</button>
</form>
@endsection