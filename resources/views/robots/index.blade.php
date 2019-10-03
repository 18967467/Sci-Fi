@extends('layouts.dashboard')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
        
    @if(count($robots) == 0)
        <div class="panel-body text-center">
            <h4>No Robots Available.</h4>
        </div>
    @endif
    
    <!-- DataTables -->
	<div class="card shadow mb-4">
    	<div class="card-header py-3"> 
    		<table>
                <thead>
                    <tr>
                        <th>
                        	<div class="alert alert-success" role="alert" style="text-align: center;">
                                  Active
                            </div>
                        </th>
                        <th>
                        	<div class="alert alert-secondary" role="alert" style="text-align: center;">
                                  Inactive
                            </div>
                        </th>
                    </tr>
                </thead>
           	</table>	
           	<div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('robots.robot.create') }}" class="btn btn-success" title="Create New User">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New Robot</span>
                </a>
        	</div>
        </div>
        <div class="card-body">
          	<div class="table-responsive">
            	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              		<thead>
                		<tr>
                            <th>Uploader</th>
    						@foreach($properties as $property)
    							<th>{{ $property->name }}</th>    						
    						@endforeach
                            <th></th>
              			</tr>
                  	</thead>
                    <tfoot>
                        <tr>
                            <th>Uploader</th>
    						@foreach($properties as $property)
    							<th>{{ $property->name }}</th>    						
    						@endforeach
                            <th></th>
                      	</tr>
                   	</tfoot>
                    <tbody>
                    @foreach($robots as $robot)
                        <tr>
                            <td>
                            @switch($robot->state)
                            	@case(0)
                            		<div class="alert alert-secondary" role="alert" style="text-align: center;">
                                      	<a href="{{ route('users.user.show', optional($robot->User)->id == null ? '0' : optional($robot->User)->id) }}" class="alert-link">{{ optional($robot->User)->email }}</a>
                                    </div>
                            		@break
                            	@default
                            		<div class="alert alert-success" role="alert" style="text-align: center;">
                                      	<a href="{{ route('users.user.show', optional($robot->User)->id == null ? '0' : optional($robot->User)->id) }}" class="alert-link">{{ optional($robot->User)->email }}</a>
                                    </div>
                            	 	@break
                            @endswitch                            
                            </td>

							@foreach($properties as $property)
								@if(count($robot->robotInfos->where('property_id', $property->id)) > 0)
									<td>
										{{ $robot->robotInfos->firstWhere('property_id', $property->id)->content }}
									</td>
								@else
									<td></td>
								@endif
    						@endforeach

                            <td>
                                <form method="POST" action="{!! route('robots.robot.destroy', $robot->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
    
                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('robots.robot.show', $robot->id ) }}" class="btn btn-info" title="Show Property">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Detail</span>
                                        </a>
                                        <a href="{{ route('robots.robot.edit', $robot->id ) }}" class="btn btn-primary" title="Edit Property">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>    
                                        <button type="submit" class="btn btn-danger" title="Delete Property" onclick="return confirm(&quot;Click Ok to delete Property.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>    
                                </form>                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
          		</table>
          	</div>
    	</div>
  	</div>
    
@endsection