@foreach($robot->comments as $comment)
<div  @if($comment->comment_id !=null)style="margin-left:40px;" @endif>
<div class="card-header"><em><strong>{{$comment->user->name}}</strong></em></div>
<div class="card-body comment-container">
<span>{{$comment->comment}}</span>
<a href="" id="reply"></a>
<form class="form-horizontal"  method="post" id="comment_form">
 @csrf
 <div class="form-group">
<label for="comment" class="control-label col-md-4">Reply:</label>
<div class="col-md-8">
<input type="text" name="comment" id="comment" data-id="{{$robot->id}}">
 <input type="hidden" id="robot_id" name="robot_id" value="{{ $robot->id }}" />
 <input type="hidden" id="username" name="username" value="{{ Auth::user()->name }}" />
                                                                                                      
 </div> 
 </div>
 <div class="form-group" align="center">
<button class="btn btn-success" type="submit" id="addComment">Add</button>
</div>     
</form>   

</div>
@include('partials._comment_replies',['comments'=>$comment->replies])
</div>
@endforeach

