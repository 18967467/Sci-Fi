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
<form class="form-horizontal"  method="post" id="comment_form">
                        @csrf
                        <div class="form-group">
                        <label for="comment" class="control-label col-md-4">Comment:</label>
                       <div class="col-md-8">
                            <textarea class="form-control" name="comment" id="comment" data-id="{{$robot->id}}"></textarea>
                            <input type="hidden" id="robot_id" name="robot_id" value="{{ $robot->id }}" />
                           <input type="hidden" id="username" name="username" value="{{ Auth::user()->name }}" />
                                                                                                      
                        </div> 
                        </div>
                        <div class="form-group" align="center">
                        <button class="btn btn-success" type="submit" id="addComment">Add</button>
                        </div>     
                        
                    </form>    
    
   
    
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h3>Comments</h3>
<div class="card" id="display-comment">
@foreach($robot->comments as $comment)
<div  @if($comment->comment_id !=null)style="margin-left:40px;" @endif>
<div class="card-header"><em><strong>{{$comment->user->name}}</strong></em></div>
<div class="card-body comment-container">
<span>{{$comment->comment}}</span>
<a href="" id="reply"></a>
<form class="form-horizontal"  method="post" id="comment_form" action="{{route('reply.add')}}">
 @csrf
 <div class="form-group">
<div class="col-md-8">
<input type="text" name="comment" id="comment" data-id="{{$robot->id}}">
 <input type="hidden" id="robot_id" name="robot_id" value="{{ $robot->id }}" />
 <input type="hidden" id="comment_id" name="comment_id" value="{{$comment->id}}" />
                                                                                                      
 </div> 
 </div>
 <div class="form-group" align="center">
<button class="btn btn-success" type="submit" id="addComment">Reply</button>
</div>     
</form>   
</div>

</div>
@foreach($comment->replies as $reply)
<div  @if($reply->comment_id !=null)style="margin-left:40px;" @endif>
<div class="card-header"><em><strong>{{$reply->user->name}}</strong></em></div>
<div class="card-body comment-container">
<span>{{$reply->comment}}</span>
<a href="" id="reply"></a>
<form class="form-horizontal"  method="post" id="comment_form" action="{{route('reply.add')}}">
 @csrf
 <div class="form-group">
<div class="col-md-8">
<input type="text" name="comment" id="comment" data-id="{{$robot->id}}">
 <input type="hidden" id="robot_id" name="robot_id" value="{{ $robot->id }}" />
 <input type="hidden" id="comment_id" name="comment_id" value="{{$comment->id}}" />
                                                                                                      
 </div> 
 </div>
 <div class="form-group" align="center">
<button class="btn btn-success" type="submit" id="addComment">Reply</button>
</div>     
</form>   
</div>

</div>
@endforeach
@endforeach


</div>
</div>
</div>
</div>
<!-- /.container -->

@endsection