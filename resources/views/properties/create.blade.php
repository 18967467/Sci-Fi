@extends('layouts.dashboard')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
            	<div class="alert alert-success" role="alert" style="text-align: center;">
                      Create New Property
                </div>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('properties.property.index') }}" class="btn btn-dark" title="Show All Property">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Go Back</span>
                </a>
            </div>

        </div><br><br>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('properties.property.store') }}" accept-charset="UTF-8" id="create_property_form" name="create_property_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('properties.form', [
                                        'property' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


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
<form method="post" action="{{route('properties.store')}}">
<div class="form-group">
<input type="hidden" value="{{csrf_token()}}" name="_token" />
<label for="name">Name of Property</label>
<input type="text" class="form-control" name="name"/>
</div>
<div class="form-group">
<label for="input_type_id">Input Type</label>
<select class="form-control" name="input_type_id" id="input_type_id">
<option value="1" selected>Text</option>
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
<label for="Order">Order</label>
<input type="text" class="form-control" name="order"/>
</div>
<button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
</div>
@endsection('content')
