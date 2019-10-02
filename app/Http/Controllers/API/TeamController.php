<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use File;

class TeamController extends Controller
{

    public function __construct()
    {
        $path = public_path('/images/team/');
        if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Team::all();
        return $rows;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        // validate with laravel in real time
        $request->validate([    
            'name' => 'required|string|max:200' ,
            'position' => 'required|max:200' ,
            'image' => 'required'
        ]);

        // image is stored in public folder
        if($request->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(270, 236)->save(public_path('images/team/').$image_name);

        }

        // new team member created
         Team::create([
            'name' => $request->get('name'),
            'position' => $request->get('position'),
            'image' => $image_name,
        ]);

         return ["message" => "Success"];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::find($id);

        // validate with laravel in real time
        $request->validate([    
            'name' => 'required|string|max:200' ,
            'position' => 'required|max:200' ,
            'image' => 'sometimes'
        ]);

        // if new image is uploaded saved and old removed
        if($request->image != $team->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(270, 236)->save(public_path('images/team/').$image_name);

            //   delete old image
            if($team->image){
                unlink(public_path("images/team/") . $team->image);
            }

        }

        // update team info
        $team->update([
            'name' => $request->get('name'),
            'position' => $request->get('position'),
            'image' => isset($image_name) ? $image_name : $team->image,
        ]);

        // return $request->all();
        return ["message" => "Updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);

        if($team->image){
                unlink(public_path("images/team/") . $team->image);
        }
        
        $team->delete();
        return ["message" => 'Success'];
    }
}
