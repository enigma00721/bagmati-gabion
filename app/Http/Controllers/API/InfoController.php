<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CompanyInfo;

class InfoController extends Controller
{
	// public function __construct()
	// {
	//     $path = public_path('/images/gallery/');
	//     if(!File::isDirectory($path)){
	//             File::makeDirectory($path, 0777, true);
	//     }
	// }

    public function getData()
    {
        $row = CompanyInfo::first();
        if($row){
            return $row;
        }else{
            return "No Infomation is stored";
        }
    }

    public function logoUpload(Request $request)
    {
        // return $request->all();

    	$request->validate([    
    	    'logo' => 'required'
    	]);


    	// image is stored in public folder
    	if($request->logo){

    	    // $image_name = time() . '.' . explode('/' , explode(':', substr($request->logo, 0 , strpos($request->logo, ';')))[1])[1];
    	    $image_name = 'logo.png';

    	    // delete old logo file
    	    // if($gallery->image){

    	    	unlink(public_path("images/logo/") . $image_name);
    	    // }

    	    \Image::make($request->logo)->resize(16,16)
    	        ->save(public_path('images/logo/').$image_name);

    	}
    }

    public function saveAboutCompanyInfo(Request $request)
    {
        // return $request->get("aboutus");
        $row = CompanyInfo::first();

        if($request->get("aboutus")){
            if($row){
                $row->update([
                    'aboutus' => $request->get("aboutus")
                ]);
            }else{
                CompanyInfo::create([
                    'aboutus' => $request->get("aboutus")
                ]);
            }
        }
        if($request->message){

        }
        return ["message" => "Updated"];
    } 

    public function saveAboutCompanyMessage(Request $request)
    {
        // return $request->get("message");
        $row = CompanyInfo::first();

        if($request->get("message")){
            if($row){
                $row->update([
                    'message' => $request->get("message")
                ]);
            }else{
                CompanyInfo::create([
                    'message' => $request->get("message")
                ]);
            }
        }
        
        return ["message" => "Updated"];
    }   

    public function saveCompanyBasicInfo(Request $request)
    {
        // return $request->all();

        // return $request->get("message");
        $row = CompanyInfo::first();

        if($row)
        {
            $row->update([
                'telephone' => $request->get("telephone"),
                'mobile' => $request->get("mobile"),
                'location' => $request->get("location"),
                'mail' => $request->get("mail")
            ]);
        }else{
            CompanyInfo::create([
                'telephone' => $request->get("telephone"),
                'mobile' => $request->get("mobile"),
                'location' => $request->get("location"),
                'mail' => $request->get("mail")
            ]);
        }
        return ["message" => "Updated"];
    }


    public function saveCompanySocialInfo(Request $request)
    {
        // return $request->all();
        $row = CompanyInfo::first();

        if($row)
        {
            $row->update([
                'fb_link' => $request->get("fb_link"),
                'tw_link' => $request->get("tw_link"),
            ]);
        }else{
            CompanyInfo::create([
                'fb_link' => $request->get("fb_link"),
                'tw_link' => $request->get("tw_link"),
            ]);
        }
        return ["message" => "Updated"];

    }

    public function saveCompanyProjectInfo(Request $request)
    {
        $row = CompanyInfo::first();

        if($row)
        {
            $row->update([
                'projects' => $request->get("projects"),
                'clients' => $request->get("clients"),
                'partners' => $request->get("partners"),
            ]);
        }else{
            CompanyInfo::create([
                'projects' => $request->get("projects"),
                'partners' => $request->get("partners"),
            ]);
        }
        return ["message" => "Updated"];
    }


}
