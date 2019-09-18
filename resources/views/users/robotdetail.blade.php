@extends('layouts.app')
@section('content')

<div class="container">
	@php
    	$collection = collect();	
    	foreach($robot->robotInfos as $robotInfo) {
    		$collection->push(['property' => $robotInfo->Property->name, 'content' => $robotInfo->content, 'order' => $robotInfo->Property->order]);
    	}
    	$sorted = $collection->sortBy('order')->where('order' , '>', 0);
    	$propertyName = $sorted->where('property', 'Name')->first();
    	$propertyImage = $sorted->where('property', 'Image')->first();
	@endphp
    <!-- Portfolio Item Heading -->
    <h1 class="my-4 text-primary">{{ $propertyName['content'] }}</h1>
    
    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-8">
          <img class="img-fluid" src="{{ $propertyImage['content'] }}" alt="">
        </div>
        <div class="col-md-4" style="background-color:lightblue">
        	@foreach($sorted as $robotInfo)
        		@if($robotInfo['property'] != "Image" && $robotInfo['property'] != "Name")
        			<p class="card-text"><strong>{{ $robotInfo['property'] }}&nbsp</strong>{{ $robotInfo['content'] }}</p>
        		@endif                        		
        	@endforeach
            <p align="center"><button type="button" class="btn btn-success">Save</button></p>
        </div>
  	</div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4 text-primary">Related Robots</h3>

    <div class="row">    
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb02.jpg') }}" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb03.jpg') }}" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb01.jpg') }}" alt="">
              </a>
        </div>        
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
                <img class="card-img-top" width="200" height="150" src="{{ asset('img/robot/rb04.jpg') }}" alt="">
              </a>
        </div>    
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection