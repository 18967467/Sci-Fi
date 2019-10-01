<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InputType;
use Illuminate\Http\Request;
use Exception;

class InputTypesController extends Controller
{

    /**
     * Display a listing of the input types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $inputTypes = InputType::paginate(25);

        return view('input_types.index', compact('inputTypes'));
    }

    /**
     * Show the form for creating a new input type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('input_types.create');
    }

    /**
     * Store a new input type in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            InputType::create($data);

            return redirect()->route('input_types.input_type.index')
                ->with('success_message', 'Input Type was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified input type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $inputType = InputType::findOrFail($id);

        return view('input_types.show', compact('inputType'));
    }

    /**
     * Show the form for editing the specified input type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $inputType = InputType::findOrFail($id);
        

        return view('input_types.edit', compact('inputType'));
    }

    /**
     * Update the specified input type in the storage.
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
            
            $inputType = InputType::findOrFail($id);
            $inputType->update($data);

            return redirect()->route('input_types.input_type.index')
                ->with('success_message', 'Input Type was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified input type from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $inputType = InputType::findOrFail($id);
            $inputType->delete();

            return redirect()->route('input_types.input_type.index')
                ->with('success_message', 'Input Type was successfully deleted.');
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
                'type' => 'required|string|min:1',
            'name' => 'required|string|min:1|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
