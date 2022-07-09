@extends('layouts.app')
@section('content')
<h1>User signup</h1>
<form action="add_user" method="POST">
	@csrf
	<input type="text" name="name" placeholder="Enter name" />
	<br>
	<input type="text" name="email" placeholder="Enter email" />
	<br>
	<input type="password" name="password" placeholder="Enter password" />
    <br>
    <button type="submit">Login</button>
</form>
@endsection