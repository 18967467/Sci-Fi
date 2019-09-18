<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Http\Request;
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
        $comments = Comment::with('robot','user','parentcomment')->paginate(25);

        return view('comments.index', compact('comments'));
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
        try {
            
            $data = $this->getData($request);
            
            Comment::create($data);

            return redirect()->route('comments.comment.index')
                ->with('success_message', 'Comment was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
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
    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();

            return redirect()->route('comments.comment.index')
                ->with('success_message', 'Comment was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
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
