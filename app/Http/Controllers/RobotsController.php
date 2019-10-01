<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Comment;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use App\Models\Property;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\RobotInfo;
use Symfony\Component\Debug\Tests\Fixtures\ToStringThrower;

class RobotsController extends Controller
{

    /**
     * Display a listing of the robots.
     *
     * @return Illuminate\View\View
     */
   
    public function index()
    {
        $robots = Robot::with('user')->paginate(25);
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');

        return view('robots.index', compact('robots', 'properties'));
    }

    /**
     * Show the form for creating a new robot.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('name','id')->all();
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        
        return view('robots.create', compact('Users', 'properties'));
    }
    
    public function filter(Request $request)
    {
        if($request->ajax())
        {
            $robotIds = DB::table('robots')->select('id')->get()->pluck('id')->toArray();
            $joinDb = DB::table('robots')   ->join('robot_infos', 'robots.id', '=', 'robot_infos.robot_id')
                                            ->join('properties', 'robot_infos.property_id', '=', 'properties.id');
//                                             ->select('robots.id as id', 'properties.name as property', 'robot_infos.content as content');  
            $inputs = "";             
            foreach ($request->all() as $key => $value) {
                if($value != null) {                    
                    $key = explode("*", $key)[0];
                    $query1 = clone $joinDb;
                    $robotIds = $query1 ->select('robots.id')
                                        ->whereIn('robots.id', $robotIds)
                                        ->where('properties.name', 'LIKE', $key)
                                        ->where('robot_infos.content', 'LIKE', '%'.$value.'%')
                                        ->groupBy('id')
                                        ->get()->pluck('id')->toArray();
                } 
                    $inputs .= $key . " --- " . $value;
            }            
            $robots = Robot::whereIn('id', $robotIds)->where('state', 1)->paginate(12);            
            $output = "";
            if($robots->count() == 0) {
                $output = "<h2>There are 0 result !!!</h2>";
            } else {
                $output = "<div class='col-lg-12'><h2>There are " . $robots->count() . " results !!!</h2><br></div>";
                foreach($robots as $robot) 
                {
                    $output .= "<div class='col-lg-4 col-md-6 mb-4'>".
                    "<div class='card h-100'>".
                    "<div class='card-body'>";
                    
                    $collection = collect();
                    foreach($robot->robotInfos as $robotInfo) 
                    {
                        $collection->push(['property' => $robotInfo->Property->name, 'content' => $robotInfo->content, 'order' => $robotInfo->Property->order]);
                    }
                    $sorted = $collection->sortBy('order')->where('order' , '>', 0);
                   
                    foreach($sorted as $robotInfo)
                    {
                        if($robotInfo['property'] == "Image")
                        {
                            $output .= "<a href='" . route('robotDetail', $robot->id) . "'>".
                            "<img alt='' src='" .$robotInfo['content'] . "' style='max-width:100%; max-height:100%;'>".
                                "</a>";
                        }
                        elseif($robotInfo['property'] == "Name")
                        {
                            $output .= "<h5 class='card-title'>".
                            "<a href='" .route('robotDetail', $robot->id). "'>" .$robotInfo['content'] . "</a>".
                            "</h5>";
                        }
                        else {
                            $output = $output . "<p class='card-text'><strong>" .$robotInfo['property']. " </strong>" .$robotInfo['content'] . "</p>";
                        }
                    }
                    $output .= "</div>".
                                    "<div class='card-footer'>".
                                    "<small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>".
                                    "</div>".
                                    "</div>".
                                    "</div>";
                }
                $output .= $robots->links();
            }
            return Response($output);
        }
    }
    
    public function getComment(Request $request){
        if($request->ajax()){
         $comments = DB::table('comments')
         ->join('users','users.id','=','comments.user_id')
         ->select('comments.id as commentid','comments.*','users.id as userid','users.*')
         ->where('robot_id','=',$request->id)
         ->get();            
        }
        return view('robotdetail',compact('comments'));
        
        
    }
    
    public function makeComment(Request $request){
        if($request->ajax()){
            $user=Auth::user();
            $comment=new Comment;
            
            $comment->user_id=$user->id;
            $comment->robot_id=$request->robot_id;
            $comment->comment=$request->comment;
            
            $comment->save();
            
            return response($comment);
            
        }
    }
    
    

    /**
     * Store a new robot in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        try {
            
            $data = $this->getData($request);
            
            Robot::create($data);
            $robot = Robot::all()->last();
            
            $data = Arr::add($data, 'robot_id', $robot->id);
            $data = Arr::add($data, 'property_id', '');
            $data = Arr::add($data, 'content', '');
            //$data['checkbox'] = 'c2';
            $robotInfo;
            foreach ($properties as $property) {                
                if($property->InputType->type == 2) {
                    $data[$property->name] = implode('   ', $data[$property->name]);
                    $str1 = trim($data[$property->name]);
                    $data[$property->name] = str_replace('   ', ', ', $str1);
                }
                
                $data['property_id'] = $property->id;
                $data['content'] = $data[$property->name];
                $temp = $robot->robotInfos->firstWhere('property_id', $property->id);
                if($temp != null) {
                    $robotInfo = RobotInfo::findOrFail($temp->id);
                    $robotInfo->update($data);
                } else {
                    RobotInfo::create($data);
                }
            }

            return redirect()->route('robots.robot.index')
                ->with('success_message', 'Robot was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
            ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }
    
    public function upload(Request $request)
    {
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        try {
            
            $data = $this->getData($request);
            
            Robot::create($data);
            $robot = Robot::all()->last();
            
            $data = Arr::add($data, 'robot_id', $robot->id);
            $data = Arr::add($data, 'property_id', '');
            $data = Arr::add($data, 'content', '');
            //$data['checkbox'] = 'c2';
            $robotInfo;
            foreach ($properties as $property) {
                
                if($property->InputType->type == 2) {
                    $data[$property->name] = implode('   ', $data[$property->name]);
                    $str1 = trim($data[$property->name]);
                    $data[$property->name] = str_replace('   ', ', ', $str1);
                }
                
                $data['property_id'] = $property->id;
                $data['content'] = $data[$property->name];
                $temp = $robot->robotInfos->firstWhere('property_id', $property->id);
                if($temp != null) {
                    $robotInfo = RobotInfo::findOrFail($temp->id);
                    $robotInfo->update($data);
                } else {
                    RobotInfo::create($data);
                }
            }
            
            return redirect()->route('home')
            ->with('success_message', 'Robot was successfully added.');
        } catch (Exception $exception) {
            
            return back()->withInput()
            ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified robot.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $robot = Robot::with('user')->findOrFail($id);
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');

        return view('robots.show', compact('robot', 'properties'));
    }

    /**
     * Show the form for editing the specified robot.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $robot = Robot::findOrFail($id);
        $Users = User::pluck('name','id')->all();
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');

        return view('robots.edit', compact('robot','Users', 'properties'));
    }

    /**
     * Update the specified robot in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        try {
            
            $data = $this->getData($request);
            
            $robot = Robot::findOrFail($id);
            $robot->update($data);
            
            $data = Arr::add($data, 'robot_id', $robot->id);
            $data = Arr::add($data, 'property_id', '');
            $data = Arr::add($data, 'content', '');
            $robotInfo;
            foreach ($properties as $property) {
                if($property->InputType->type == 2) {
                    $data[$property->name] = implode(', ', $data[$property->name]);
                }
                $data['property_id'] = $property->id;
                $data['content'] = $data[$property->name];
                $temp = $robot->robotInfos->firstWhere('property_id', $property->id);
                if($temp != null) {
                    $robotInfo = RobotInfo::findOrFail($temp->id);
                    $robotInfo->update($data);
                } else {
                    RobotInfo::create($data);
                }
            }

            return redirect()->route('robots.robot.index')
            ->with('success_message', 'Robot was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }        
    }

    /**
     * Remove the specified robot from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $robot = Robot::findOrFail($id);
            $robot->delete();

            return redirect()->route('robots.robot.index')
                ->with('success_message', 'Robot was successfully deleted.');
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
        $properties = Property::where('order', '!=', '0')->get()->sortBy('order');
        $rules = [
                'user_id' => 'nullable',
            'state' => 'boolean', 
        ];
        foreach ($properties as $property) {
            $rules = Arr::add($rules, $property->name, 'nullable');
        }

        
        $data = $request->validate($rules);


        $data['state'] = $request->has('state');


        return $data;
    }

}
