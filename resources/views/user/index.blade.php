@extends('layouts.dashboard')

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
<td>Delete</td>

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
<td>
<form action="{{route('users.destroy',$user->id)}}" method="post">
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
<div>
@endsection('content')