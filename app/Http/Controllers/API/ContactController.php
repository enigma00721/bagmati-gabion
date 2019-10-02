<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Category;
use Illuminate\Support\Facades\Gate;



class ContactController extends Controller
{
    
	public function index()
	{	
		$contacts = Contact::all();
		return $contacts;
	}

	public function destroy($id)
	{
			$row = Contact::find($id);
			$row->delete();
			return ["message" => 'Success'];
	}

}
