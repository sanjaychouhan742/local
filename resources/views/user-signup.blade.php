@extends('layouts/app')
@section('content')
 
 <h1>User signup</h1>

 @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif


 <form action="store" method="post">
  @csrf
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" name="name" class="form-control" id="name" placeholder="First Last name">
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="password" placeholder="password">
</div>
@error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
<button type="submit" class="btn btn-primary btn-lg">signup</button>
</div>
</form>
  @endsection