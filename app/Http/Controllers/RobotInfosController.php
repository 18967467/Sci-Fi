<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Robot;
use App\Models\RobotInfo;
use Illuminate\Http\Request;
use Exception;

class RobotInfosController extends Controller
{

    /**
     * Display a listing of the robot infos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $robotInfos = RobotInfo::with('robot','property')->paginate(25);

        return view('robot_infos.index', compact('robotInfos'));
    }

    /**
     * Show the form for creating a new robot info.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Robots = Robot::pluck('state','id')->all();
$Properties = Property::pluck('name','id')->all();
        
        return view('robot_infos.create', compact('Robots','Properties'));
    }

    /**
     * Store a new robot info in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            RobotInfo::create($data);

            return redirect()->route('robot_infos.robot_info.index')
                ->with('success_message', 'Robot Info was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified robot info.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $robotInfo = RobotInfo::with('robot','property')->findOrFail($id);

        return view('robot_infos.show', compact('robotInfo'));
    }

    /**
     * Show the form for editing the specified robot info.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $robotInfo = RobotInfo::findOrFail($id);
        $Robots = Robot::pluck('state','id')->all();
$Properties = Property::pluck('name','id')->all();

        return view('robot_infos.edit', compact('robotInfo','Robots','Properties'));
    }

    /**
     * Update the specified robot info in the storage.
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
            
            $robotInfo = RobotInfo::findOrFail($id);
            $robotInfo->update($data);

            return redirect()->route('robot_infos.robot_info.index')
                ->with('success_message', 'Robot Info was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified robot info from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $robotInfo = RobotInfo::findOrFail($id);
            $robotInfo->delete();

            return redirect()->route('robot_infos.robot_info.index')
                ->with('success_message', 'Robot Info was successfully deleted.');
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
            'property_id' => 'required',
            'content' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
