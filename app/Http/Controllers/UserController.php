<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class UserController extends Controller
{
	protected $users;
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function profile()
    {
        //
        return view('user/profile');
    }
    public function savedlist()
    {
        //
        return view('user/savedlist');
    }
    public function myshared()
    {
        //
        return view('user/myshared');
    }
    
    public function changepassword()
    {
        //
        return view('user/changepassword');
    }
	
	
    public function dashboard()
    {
        return view('admin/index');
    }
	public function home()
	{
	return view('user/home');	
	}
    public function __construct()
    {
         $this->middleware('auth');
    }
	public function index()
	 {
		 $users = User::all();
		return view('user/index',compact('users')); 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
		$user->delete();
		return redirect('/users')->with('success','User had been deleted Successfully');
    }
}
