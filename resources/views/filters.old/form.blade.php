
<div class="form-group {{ $errors->has('property_id') ? 'has-error' : '' }}">
    <label for="property_id" class="col-md-2 control-label">Property</label>
    <div class="col-md-10">
        <select class="form-control" id="property_id" name="property_id" required="true">
        	    <option value="" style="display: none;" {{ old('property_id', optional($filter)->property_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select property</option>
        	@foreach ($Properties as $key => $Property)
			    <option value="{{ $key }}" {{ old('property_id', optional($filter)->property_id) == $key ? 'selected' : '' }}>
			    	{{ $Property }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('property_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('input_type_id') ? 'has-error' : '' }}">
    <label for="input_type_id" class="col-md-2 control-label">Input Type</label>
    <div class="col-md-10">
        <select class="form-control" id="input_type_id" name="input_type_id" required="true">
        	    <option value="" style="display: none;" {{ old('input_type_id', optional($filter)->input_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select input type</option>
        	@foreach ($InputTypes as $key => $InputType)
			    <option value="{{ $key }}" {{ old('input_type_id', optional($filter)->input_type_id) == $key ? 'selected' : '' }}>
			    	{{ $InputType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('input_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
    <label for="order" class="col-md-2 control-label">Order</label>
    <div class="col-md-10">
        <input class="form-control" name="order" type="text" id="order" value="{{ old('order', optional($filter)->order) }}" minlength="1" min="0" required="true" placeholder="Enter order here...">
        {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

