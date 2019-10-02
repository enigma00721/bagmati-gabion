<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use App\Service;
use App\Slider;
use App\Gallery;
use App\Team;
use App\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class FrontController extends Controller
{
	public function clear()
	{
		Artisan::call('route:clear');
		Artisan::call('config:clear');
		Artisan::call('route:cache');
		return "clear";
	}

	public function index()
	{
		$services = Service::all();
    	$company_info = CompanyInfo::select('telephone','location','mail','mobile','projects','partners','clients','fb_link')->first();
    	$sliders = Slider::all();
    	$galleries = Gallery::all();
    	$teams = Team::all();
    	$testimonials = Testimonial::all();
    	// dd($teams);
		return view('frontend/index',compact('company_info','services','sliders','galleries','teams','testimonials'));
	}
	
	public function contactus()
	{
    	$company_info = CompanyInfo::select('telephone','location','mail','mobile')->first();
    	$services = Service::select('title')->get();
    	// dd($services);
		return view('frontend/contactus',compact('company_info','services'));
	}

	public function aboutus()
	{
    	$company_info = CompanyInfo::select('telephone','location','mail','aboutus','message','mobile')->first();
		return view('frontend/aboutus',compact('company_info'));
	}

	public function downloadBrochure()
	{
		// dd('gogod');
		//PDF file is stored under project/public/brochure/brochure.pdf
		$file= public_path(). "/brochure/brochure.pdf";
		return response()->download($file, 'BagmatiGabion_Brochure.pdf');
	}
   

}

