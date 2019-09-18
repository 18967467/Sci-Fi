@extends('layouts.dashboard')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Filter' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('filters.filter.destroy', $filter->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('filters.filter.index') }}" class="btn btn-primary" title="Show All Filter">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('filters.filter.create') }}" class="btn btn-success" title="Create New Filter">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('filters.filter.edit', $filter->id ) }}" class="btn btn-primary" title="Edit Filter">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Filter" onclick="return confirm(&quot;Click Ok to delete Filter.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Property</dt>
            <dd>{{ optional($filter->Property)->id }}</dd>
            <dt>Input Type</dt>
            <dd>{{ optional($filter->InputType)->id }}</dd>
            <dt>Order</dt>
            <dd>{{ $filter->order }}</dd>
            <dt>Created At</dt>
            <dd>{{ $filter->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $filter->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection