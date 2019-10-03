@extends('layouts.dashboard')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            @switch($robot->state)
            	@case(0)
            		<div class="alert alert-secondary" role="alert" style="text-align: center;">
                      	Robot ID: {{ $robot->id }}
                    </div>
            		@break
            	@case(1)
            		<div class="alert alert-success" role="alert" style="text-align: center;">
                      	Robot ID: {{ $robot->id }}
                    </div>
                    @break
               	@default
               		@break
          	@endswitch
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('robots.robot.destroy', $robot->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('robots.robot.index') }}" class="btn btn-dark" title="Show All Robot">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Go Back</span>
                    </a>

                    <a href="{{ route('robots.robot.create') }}" class="btn btn-success" title="Create New Robot">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('robots.robot.edit', $robot->id ) }}" class="btn btn-primary" title="Edit Robot">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Robot" onclick="return confirm(&quot;Click Ok to delete Robot.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div><br><br>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($robot->User)->id }}</dd>
            <dt>State</dt>
            <dd>{{ ($robot->state) ? 'Active' : 'Inactive' }}</dd>
            
            @foreach($properties as $property)
            	<dt>{{ $property->name }}</dt>
            	@if(count($robot->robotInfos->where('property_id', $property->id)) > 0)
					<dd>
						{{ $robot->robotInfos->firstWhere('property_id', $property->id)->content }}
					</dd>
				@else
					<dd><i>N/A</i></dd>
				@endif
			@endforeach
            
            <dt>Created At</dt>
            <dd>{{ $robot->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $robot->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection