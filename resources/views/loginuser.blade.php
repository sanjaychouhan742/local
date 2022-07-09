@extends('layouts.app')
@section('content')
<h1>User login</h1>
<form action="/userss" method="POST">
	@csrf
	<input type="text" name="name" placeholder="Enter name"><br><br>
	<input type="password" name="password" placeholder="Enter password"><br><br>
	<input type="submit" name="submit">


</form>
@endsection