<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InputType;
use App\Models\Property;
use Illuminate\Http\Request;
use Exception;

class PropertiesController extends Controller
{

    /**
     * Display a listing of the properties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $properties = Property::with('inputtype')->paginate(25);

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $InputTypes = InputType::pluck('name','id')->all();
        
        return view('properties.create', compact('InputTypes'));
    }

    /**
     * Store a new property in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Property::create($data);

            return redirect()->route('properties.property.index')
                ->with('success_message', 'Property was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified property.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $property = Property::with('inputtype')->findOrFail($id);

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified property.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $InputTypes = InputType::pluck('name','id')->all();

        return view('properties.edit', compact('property','InputTypes'));
    }

    /**
     * Update the specified property in the storage.
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
            
            $property = Property::findOrFail($id);
            $property->update($data);

            return redirect()->route('properties.property.index')
                ->with('success_message', 'Property was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified property from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $property = Property::findOrFail($id);
            $property->delete();

            return redirect()->route('properties.property.index')
                ->with('success_message', 'Property was successfully deleted.');
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
            'input_type_id' => 'required',
            'description' => 'nullable|string|min:0|max:255',
            'order' => 'required|string|min:1', 
            'filter' => 'required|string|min:1', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
