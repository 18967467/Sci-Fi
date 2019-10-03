@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('robots.robot.upload') }}" accept-charset="UTF-8" id="create_robot_form" name="create_robot_form" class="form-horizontal">
            {{ csrf_field() }}
            
<input class="form-control" name="user_id" type="text" id="user_id" value="{{ Auth::user()->id }}" hidden>
<input class="form-control" name="state" type="checkbox" id="state" value="0" hidden>

@foreach($properties as $property)
	<div class="form-group">
		<label for="{{ $property->name }}" class="col-md-2 control-label">{{ $property->name }}</label><br>
		<i>{{ $property->description }}</i>
		<div class="col-md-10">
		@switch($property->InputType->type)
			@case(0)
				<input class="form-control" name="{{ $property->name }}" type="text" id="{{ $property->name }}" value="" minlength="0" maxlength="255">
        		{!! $errors->first('$property->name', '<p class="help-block">:message</p>') !!}
				@break
			@case(1)
				<input type="radio" name="{{ $property->name }}" value="" hidden checked>
				@foreach($property->options as $option)
				<input type="radio" name="{{ $property->name }}" value="{{ $option->option }}">&nbsp&nbsp&nbsp&nbsp{{ $option->option }}</br>
				@endforeach				
				@break
			@case(2)
				<input type="checkbox" name="{{ $property->name }}[]" value="" hidden checked>
				@foreach($property->options as $option)
				<input type="checkbox" name="{{ $property->name }}[]" value="{{ $option->option }}">&nbsp&nbsp&nbsp&nbsp{{ $option->option }}<br>
				@endforeach
				@break
			@case(3)
				<select name="{{ $property->name }}">
				@foreach($property->options as $option)
				<option value="{{ $option->option }}">&nbsp&nbsp&nbsp&nbsp{{ $option->option }}</option>
				@endforeach
				<option value="" hidden></option>
				</select>
				@break
			@case(10)
				<input class="form-control" name="{{ $property->name }}" type="text" id="{{ $property->name }}" value="" minlength="0" maxlength="255">
        		{!! $errors->first('$property->name', '<p class="help-block">:message</p>') !!}
				@break
			@default
				@break
		@endswitch
		</div>
	</div>
@endforeach

<div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input class="btn btn-primary" type="submit" value="Add">
        </div>
    </div>

</form>

@endsection