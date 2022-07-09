@extends('layouts.app')
<!-- @foreach ($users as $user)
    <p>This is user {{ $user->name }}</p>
@endforeach -->
@section('content')

<h1>Users Details</h1>
<table border="1" align="" width="100%">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>
	

	 @foreach ($users as $user)
	 <tr>
	<td>{{ $user->id }}</td>
	<td> {{ $user->name }}</td>
	<td> {{ $user->email }}</td>
	<td>
		<a href="{{ url('/my/'.$user->id) }}">Delete</a>/
        <a href="{{ url('/edit_user/'.$user->id) }}">edit</a>
	</td>

	</tr>

	@endforeach 





</table>
@endsection