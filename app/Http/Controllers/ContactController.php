<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    

    public function index()
    {
    	return view('user.contact');
    }



    public function sendWithMailable(ContactRequest $request)
    {
          Mail::to('inquiry@porkmoney.com')->send(new ContactMail($request));
          return back()->with('status','Your message has been received');
    }







   /* public function sendContactMail(Request $request)
    {
    	$this->validate($request,[  
    		'name' => 'required|min:3',
    		'email' =>'required|email',
    		'message' => 'required|min:5'
    		]);
    	$emaildata  = array(
    		'name' => $request->name,
    		'email' => $request->email,
    		'bodyMessage'=> $request->message,
    		);
    	Mail::send('user.contactemails', $emaildata, function($messages) use($emaildata){
    		$messages->from($emaildata['email']);
    		$messages->to('inquiry@porkmoney.com');
    		$messages->subject($emaildata['name']);
    	});
    	return redirect()->back()->with('flash_message', 'Message sent');
    }*/

    
}
