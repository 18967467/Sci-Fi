<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Exception;

class OptionsController extends Controller
{

    /**
     * Display a listing of the options.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $options = Option::with('property')->paginate(25);

        return view('options.index', compact('options'));
    }

    /**
     * Show the form for creating a new option.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Properties = Property::pluck('name','id')->all();
        
        return view('options.create', compact('Properties'));
    }

    /**
     * Store a new option in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Option::create($data);

            return redirect()->route('options.option.index')
                ->with('success_message', 'Option was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified option.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $option = Option::with('property')->findOrFail($id);

        return view('options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified option.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $option = Option::findOrFail($id);
        $Properties = Property::pluck('name','id')->all();

        return view('options.edit', compact('option','Properties'));
    }

    /**
     * Update the specified option in the storage.
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
            
            $option = Option::findOrFail($id);
            $option->update($data);

            return redirect()->route('options.option.index')
                ->with('success_message', 'Option was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified option from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $option = Option::findOrFail($id);
            $option->delete();

            return redirect()->route('options.option.index')
                ->with('success_message', 'Option was successfully deleted.');
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
                'property_id' => 'required',
            'option' => 'required|string|min:1|max:255',
            'description' => 'nullable|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
