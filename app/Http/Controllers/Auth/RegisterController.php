<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
      protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
	 
	public function register(Request $request){
	$this->validator($request->all())->validate();
	
    event(new Registered($user=$this->create($request->all())));
	if(!$user->privilege==100){
    return redirect($this->redirectTo)->with('message','Registered successfully, please login....!');
    }
	else{
     return view('\home');
   	}	
    		
	}
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'dob'=>['regex:/^([0][1-9]|[1-2][0-9]|(3)[0-1])(\/)(((0)[1-9])|((1)[0-2]))(\/)\d{4}$/i'],
        ]);
    }
     
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'privilege' => $data['privilege'],
        ]);
    }
	
	public function index()
	 {
		 $users = User::all();
		return view('user.index',compact('users')); 
     }
	}
	
