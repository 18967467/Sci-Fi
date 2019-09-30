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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Comments</h4>
            </div>

            

        </div>
        
        @if(count($comments) == 0)
            <div class="panel-body text-center">
                <h4>No Comments Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Robot</th>
                            <th>User</th>
                            <th>Comment</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->robot->id}}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{$comment->comment}}</td>

                            <td>

                                <form method="POST" action="{{route('comments.comment.destroy', $comment->id)}}">
                               
                                        <button type="submit" class="btn btn-danger">
                                         Delete
                                         
                                         @csrf
                                         @method('DELETE')                                          
                                        </button>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $comments->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection