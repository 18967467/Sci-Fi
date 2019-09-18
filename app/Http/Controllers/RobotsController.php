<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use App\Models\Property;
use Illuminate\Support\Arr;
use App\Models\RobotInfo;

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
