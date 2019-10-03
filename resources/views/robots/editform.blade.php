
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($robot)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('user_id', optional($robot)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    <label for="state" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="state_1">
            	<input id="state_1" class="" name="state" type="checkbox" value="1" {{ old('state', optional($robot)->state) == '1' ? 'checked' : '' }}>
                &nbsp&nbsp&nbsp&nbspActive
            </label>
        </div>

        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@foreach($properties as $property)
	<div class="form-group">
		<label for="user_id" class="col-md-2 control-label">{{ $property->name }}</label>
		<div class="col-md-10">
		@switch($property->InputType->type)
			@case(0)
				<input class="form-control" name="{{ $property->name }}" type="text" id="{{ $property->name }}" value="{{ old('$property->name', optional($robot->RobotInfos->firstWhere('property_id', $property->id))->content) }}" minlength="0" maxlength="255" placeholder="{{$property->description}}">
        		{!! $errors->first('$property->name', '<p class="help-block">:message</p>') !!}
				@break
			@case(1)
				<input type="radio" name="{{ $property->name }}" value="" hidden checked>
				@foreach($property->options as $option)
				<input type="radio" name="{{ $property->name }}" value="{{ $option->option }}" {{ optional($robot->robotInfos->firstWhere('property_id', $property->id))->content == $option->option ? 'checked' : '' }}>&nbsp&nbsp&nbsp&nbsp{{ $option->option }}</br>
				@endforeach				
				@break
			@case(2)
				@foreach($property->options as $option)
				<input type="checkbox" name="{{ $property->name }}[]" value="{{ $option->option }}" {{ strpos(optional($robot->robotInfos->firstWhere('property_id', $property->id))->content, $option->option) === false ? '' : 'checked' }}>&nbsp&nbsp&nbsp&nbsp{{ $option->option }}<br>
				@endforeach
				@break
			@case(3)
				<select name="{{ $property->name }}">
				@foreach($property->options as $option)
				<option value="{{ $option->option }}" {{ optional($robot->robotInfos->firstWhere('property_id', $property->id))->content == $option->option ? 'selected' : '' }}>&nbsp&nbsp&nbsp&nbsp{{ $option->option }}</option>
				@endforeach
				<option value="" hidden></option>
				</select>
				@break
			@case(10)
				<input class="form-control" name="{{ $property->name }}" type="text" id="{{ $property->name }}" value="{{ old('$property->name', optional($robot->RobotInfos->firstWhere('property_id', $property->id))->content) }}" minlength="0" maxlength="255" placeholder="{{$property->description}}">
        		{!! $errors->first('$property->name', '<p class="help-block">:message</p>') !!}
				@break
			@default
				@break
		@endswitch
		</div>
	</div>
@endforeach