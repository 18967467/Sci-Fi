<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class MailsController extends Controller
{

    /**
     * Display a listing of the mails.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $mails = Mail::with('user','user')->paginate(25);

        return view('mails.index', compact('mails'));
    }

    /**
     * Show the form for creating a new mail.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('id','id')->all();
        
        return view('mails.create', compact('Users','Users'));
    }

    /**
     * Store a new mail in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Mail::create($data);

            return redirect()->route('mails.mail.index')
                ->with('success_message', 'Mail was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified mail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $mail = Mail::with('user','user')->findOrFail($id);

        return view('mails.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified mail.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $mail = Mail::findOrFail($id);
        $Users = User::pluck('id','id')->all();

        return view('mails.edit', compact('mail','Users','Users'));
    }

    /**
     * Update the specified mail in the storage.
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
            
            $mail = Mail::findOrFail($id);
            $mail->update($data);

            return redirect()->route('mails.mail.index')
                ->with('success_message', 'Mail was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified mail from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $mail = Mail::findOrFail($id);
            $mail->delete();

            return redirect()->route('mails.mail.index')
                ->with('success_message', 'Mail was successfully deleted.');
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
                'user_id' => 'nullable',
            'title' => 'required|string|min:1|max:255',
            'content' => 'required|string|min:1|max:255',
            'sender_user_id' => 'nullable',
            'state' => 'boolean', 
        ];

        
        $data = $request->validate($rules);


        $data['state'] = $request->has('state');


        return $data;
    }

}
