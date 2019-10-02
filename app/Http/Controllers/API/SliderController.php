<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use File;

class SliderController extends Controller
{

    public function __construct()
    {
        $path = public_path('/images/slider/');
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
        $rows = Slider::all();
        return $rows;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'required',
            'caption' => 'required|max:200' ,
            'text' => 'required|string|max:200' 
        ]);

        // image is stored in public folder
        if($request->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(1920, 753)->save(public_path('images/slider/').$image_name);

        }

        // new slider created
         Slider::create([
            'caption' => $request->get('caption'),
            'text' => $request->get('text'),
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
        $slider = Slider::find($id);

        // validate with laravel in real time
        $request->validate([    
            'caption' => 'required|string|max:200' ,
            'text' => 'required|max:200' ,
            'image' => 'sometimes'
        ]);

        // if new image is uploaded saved and old removed
        if($request->image != $slider->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(1920, 753)->save(public_path('images/slider/').$image_name);

            //   delete old image
            if($slider->image){
                unlink(public_path("images/slider/") . $slider->image);
            }

        }

        // update slider info
        $slider->update([
            'caption' => $request->get('caption'),
            'text' => $request->get('text'),
            'image' => isset($image_name) ? $image_name : $slider->image,
        ]);

        // return $request->all();
        return ["message" => "Updated"];
    }


    public function sortOrder(Request $request)
    {
        // return $request->all();
        Slider::truncate();

        foreach($request->all() as $slider){
            Slider::create([

                'id' => $slider['id'] ,
                'order' => $slider['order'],
                'image' => $slider['image'],
                'text' => $slider['text'],
                'caption' => $slider['caption'],
                'status' => $slider['status'],

            ]);
        }

        return ["message" => "Success"];
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if($slider->image){
                unlink(public_path("images/slider/") . $slider->image);
        }
        $slider->delete();

         // return $request->all();
        return ["message" => "Updated"];

    }
}
