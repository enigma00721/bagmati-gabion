<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	protected $view_path = "backend.contact.";
    protected $route_path = "contact";

    public function index()
    {
    	$rows = Contact::all();
    	return view($this->view_path.'index',compact('rows'));
    }

    public function show($id)
    {
    	$row = Contact::find($id);
    	return view($this->view_path.'show',compact('row'));
    }

    public function sendMessage(Request $request)
    {
    	// dd($request->all());
       $this->validate(request(), [
           'name'=>'required|string',
           'phone'=>'required|numeric',
           'email'=>'required|email',
           'service'=>'required',
           'message'=>'required',
       ]);

       $contact = new Contact();
       $contact->name = $request->name;
       $contact->email = $request->email;
       $contact->phone = $request->phone;
       $contact->service = $request->service;
       $contact->message = $request->message;
       $contact->save();


       return redirect()->back()->with('success_message','Message Sent Successfully');
    }



    public function destroy($id)
    {
        $row = Contact::find($id);

        if($row){
           
           if($row->delete()){
              return redirect()->route($this->route_path)->with('success_message','Message Deleted Successfully');
           }
        }else{
            return redirect()->route($this->route_path)->with('error_message','Illegal Request');
        }
    }


}
