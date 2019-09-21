@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-3">
    	<form action="/action_page.php" id="filterForm">
    	<h2 class="my-4">Filter</h2>
    	<a href="#" onclick="document.getElementById('filterForm').reset();document.getElementById('submit').click();" class="btn btn-block btn-sm btn-danger"><i class="fas fa-eraser"></i> Clear</a><br>
        @foreach($filters as $filter)
        	<label>{{ $filter->name }}</label><br>
            @switch(optional($filter->InputType)->type)            	
                @case(0)
        			<input type="text" name="{{ $filter->name }}" class="form-control" placeholder="{{ $filter->name }}" onKeyUp="document.getElementById('submit').click();">
        			@break
        		@case(1)
        			@foreach($filter->options as $option)
        					<input type="radio" name="{{ $filter->name }}" value="{{ $option->option }}" onclick="document.getElementById('submit').click();">	{{ $option->option }}<br>
        			@endforeach
        			@break
        		@case(2)
        		<?php $i = 0?>
        			@foreach($filter->options as $option)
        					<input type="checkbox" name="{{ $filter->name .'*'. ++$i}}" value="{{ $option->option }}" onclick="document.getElementById('submit').click();">	
        					{{ $option->option }}<br>
        			@endforeach
        			@break
        		@case(3)
        			<select>
        			@foreach($filter->options as $option)
        					 <option value="{{ $option->option }}">{{ $option->option }}</option><br>
        			@endforeach
        			</select>
        			@break
        		@case(10)
        			<input type="text" class="form-control" placeholder="{{ $filter->name }}">
        			@break
        		@default
            @endswitch
        @endforeach 
        <input type="submit" value="Submit" id='submit' hidden>
        </form>
    </div>
    <!-- /.col-lg-3 -->

	<div class="col-lg-9 my-4">     
        <div class="row" id="content">

        </div>       
    </div>
    <!-- /.col-lg-9 -->
</div>
<!-- /.row -->    
@endsection
