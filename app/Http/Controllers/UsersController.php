<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Robot;
use App\Models\User;

use App\Models\Comment;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    public function detail()
    {
        $active = "home";
        $comment = DB::table('comments')->latest()->first();
        return view('users.robotdetail', compact('active','comment'));
    }

    public function home()
    {
        $filters = Property::where('filter', '>', 0)->get()->sortBy('filter');
        $robots = Robot::where('state', 1)->get();
        $active = "home";
        return view('users.home', compact('filters', 'robots', 'active'));
    }
    public function shared()
    {
        $filters = Property::where('filter', '>', 0)->get()->sortBy('filter');
        $robots = Robot::where('user_id', Auth::user()->id)->get();
        $active = "shared";
        return view('users.shared', compact('filters', 'robots', 'active'));
    }
    public function saved()
    {
        $filters = Property::where('filter', '>', 0)->get()->sortBy('filter');
        $robotsId = array_column(DB::table('robots')->join('saved_lists', 'robots.id', '=', 'saved_lists.robot_id')
            ->where('saved_lists.user_id', '=', Auth::user()->id)->select('robots.id')->get()->toArray(), 'id');
//         var_dump($robotsId);
//         die();
        $robots = Robot::whereIn('id', $robotsId)->get();
        $active = "saved";
        return view('users.saved', compact('filters', 'robots', 'active'));
    }
    public function upload()
    {
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        $robot = null;
        $active = "upload";
        return view('users.upload', compact('properties', 'robot', 'active'));
    }

    public function robotDetail(int $robotId)
    {
        $robot = Robot::where('id', $robotId)->get()->first();
        $comment = DB::table('comments')->latest()->first();
        $active = "robotDetail";

        return view('users.robotdetail', compact('robot', 'active'));


    }
    public function statistic()
    {
        return view('users.statistic');
    }
    public function statisticData() {
        $yearFrom = $_GET['yearFrom'] ?? null;
        $yearTo = $_GET['yearTo'] ?? null;
        /*
        if(isset($_POST['xaxis'])) {
            $xaxis = $_POST['xaxis'];
        }


         if(isset($_POST['yaxis'])) {
            $yaxis = $_POST['yaxis'];
        }


        if(isset($_POST['yearFrom'])) {
            $yearFrom = $_POST['yearFrom'];
        }

        if(isset($_POST['yearTo'])) {
            $yearTo = $_POST['yearTo'];
        }
        */

        $conn = get_mysqli_conn();

        $sql = "SELECT COUNT(robots.id) AS rcount, options.option
                    FROM robots
                    INNER JOIN robot_infos ON robots.id=robot_infos.id
                    INNER JOIN properties ON robot_infos.property_id=properties.id
                    INNER JOIN options ON properties.id=options.id
                    WHERE properties.name = 'year';
                    GROUP BY options.option
                    ORDER BY COUNT(robots.id) ASC";

        $result = $conn->query($sql);
        //$data = $result->fetch_all();

        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        $conn->close();

        return response()->json($data);


    }
    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['password'] = Hash::make($data['password']);

            User::create($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);


        return view('users.edit', compact('user'));
    }

    public function changepass($id)
    {
        $user = User::findOrFail($id);


        return view('users.changepass', compact('user'));
    }

    /**
     * Update the specified user in the storage.
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

            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
            ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }


    public function updatepass($id, Request $request)
    {
        try {

            $data = $this->getData($request);
            $data['password'] = Hash::make($data['password']);

            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
            ->with('success_message', 'User was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
            ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully deleted.');
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
                'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y',
            'password' => 'required|string|min:1|max:255',
            'phone' => 'nullable|string|min:0|max:255',
            'address' => 'nullable|string|min:0|max:255',
//             'dob' => 'nullable|date_format:j/n/Y g:i A',
            'dob' => 'nullable|date_format:j/n/Y',
            'avatar' => 'nullable|string|min:0|max:255',
//             'avatar' => 'nullable|file|string|min:0|max:255',
            'privilege' => 'required|string|min:1',
            'remember_token' => 'nullable|string|min:0|max:100',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
