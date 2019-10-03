@extends('layouts.dashboard')

@section('content')
<div class="container">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div><br />
@endif
<div class="row">
<form method="post" action="{{url('properties.store')}}">
<div class="form-group">
<input type="hidden" value="{{csrf_token()}}" name="_token" />
<label for="name">Name of Property</label>
<input type="text" class="form-control" name="name"/>
</div>
<div class="form-group">
<select class="form-control" name="type" id="type">
<option value="1">Text</option>
<option value="2">Checkbox</option>
<option value="3">Radio</option>
<option value="4">Date</option>
<option value="5">File</option>
</select>
</div>
<div class="form-group">
<label for="description">Description</label>
<textarea cols="5" rows="5" class="form-control" name="description"></textarea>
</div>
<button type="submit" class="btn btn-primary"></button>
</form>
</div>
</div>
@section('content')