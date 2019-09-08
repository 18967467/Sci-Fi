@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                
     <form method="POST" action="{{route('register')}}">           
	<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Name (Full name)</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="Name (Full name)" class="form-control input-md">
      	</div>
  	</div>


<!-- File Button --> 
<div class="form-group row">
  	<div class="col-md-4">
  		<img width="150" height="200" src="{{ asset('img/bg-avatar.png') }}" alt=""></a>
  	</div>
  	<div class="col-md-6 ">
    	<input id="Upload photo" name="Upload photo" class="input-file" type="file">
  	</div>
</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="dob">Date of birth</label>
       	<div class="col-md-6">        
       		<input id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" class="form-control input-md">
      	</div>
  	</div>




<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Address</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="1b street..." class="form-control input-md">
      	</div>
  	</div>





<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Phone</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="04xx xxx xxx" class="form-control input-md">
      	</div>
  	</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Email</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="email@gmail.com" class="form-control input-md" readonly>
      	</div>
  	</div>







<div class="form-group" align="center">
  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
  <a href="{{ route('changepassword') }}" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Change Password</a>
    
</div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection