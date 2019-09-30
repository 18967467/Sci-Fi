<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Robot;
use App\Models\User;
use App\Models\RobotInfo;
use Illuminate\Http\Request;
use DB;
use Exception;

class CommentsController extends Controller
{

    /**
     * Display a listing of the comments.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(5);
        
        DB::table('comments')->join('robot_infos',function($join){
         $join->on("comments.robot_id",'=','robot_infos.robot_id')
         ->where('robot_infos.property_id','=',1);            
        })->get();
        return view('comments.index',compact('comments'))->with('i',(request()->input('page',1)-1)*5);
        
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Robots = Robot::pluck('id','id')->all();
$Users = User::pluck('id','id')->all();
$ParentComments = Comment::pluck('id','id')->all();
        
        return view('comments.create', compact('Robots','Users','ParentComments'));
    }

    /**
     * Store a new comment in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment'=>'required',
        ]);        
        $input=$request->all();
        $input['user_id']=auth()->user()->id;
        Comment::create($input);
       $comments = Comment::with('robot','user','parentcomment')->paginate(25);
        
        return redirect()->back()->with("message","Comment added successfully");    
    
    }

    /**
     * Display the specified comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $comment = Comment::with('robot','user','parentcomment')->findOrFail($id);

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $Robots = Robot::pluck('id','id')->all();
$Users = User::pluck('id','id')->all();
$ParentComments = Comment::pluck('id','id')->all();

        return view('comments.edit', compact('comment','Robots','Users','ParentComments'));
    }

    /**
     * Update the specified comment in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $comment = Comment::findOrFail($id);
            $comment->update($data);

            return redirect()->route('comments.comment.index')
                ->with('success_message', 'Comment was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified comment from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.comment.index')->with('success','Comment deleted successfully');
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'robot_id' => 'required',
            'user_id' => 'nullable',
            'comment_id' => 'nullable',
            'comment' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
