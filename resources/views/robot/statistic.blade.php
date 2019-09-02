@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload robot') }}</div>

                <div class="card-body">
                
                
	<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Name</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>


<!-- File Button --> 
<div class="form-group row">
  	<div class="col-md-4">
  		<img width="150" height="200" src="{{ asset('img/robot/rb02.jpg') }}" alt=""></a>
  	</div>
  	<div class="col-md-6 ">
    	<input id="Upload photo" name="Upload photo" class="input-file" type="file">
  	</div>
</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Source</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Year</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>



<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Author</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Description</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>
  	
  	<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Purpose</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Motivation</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>

<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Size</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>
  	<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Shape</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>


<!-- Text input-->
<div class="form-group row">
  		<label class="col-md-4 control-label" for="Name (Full name)">Awards</label>
       	<div class="col-md-6">        
       		<input id="Name (Full name)" name="Name (Full name)" type="text" placeholder="" class="form-control input-md">
      	</div>
  	</div>








<div class="form-group" align="center">
  <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
    
</div>

            </div>
        </div>
    </div>
</div>

@endsection