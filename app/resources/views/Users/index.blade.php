@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
<thead>
<tr>
<td>ID</td>
<td>Name</td>
<td>Email</td>
<td>Phone</td>
<td>Address</td>
<td>Date of Birth</td>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{$user->id}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->phone}}</td>
<td>{{$user->address}}</td>
<td>{{$user->dob}}</td>
<td>Edit</td>
<td>Delete</td>
</tr>
@endforeach
</tbody>
</table>
<div>
@endsection(''content)