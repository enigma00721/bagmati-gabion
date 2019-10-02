<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\CompanyInfo;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
	

    public function show($slug)
    {
    	// dd($slug);
    	$row = Service::where('slug','=',$slug)->first();
    	$rows = Service::select('title','slug')->get();
    	$company_info = CompanyInfo::select('telephone','location','mail','mobile')->first();
    	// dd($company_info);
      // dd($row);
    	return view('frontend.service',compact('row','rows','company_info'));
    }

}

