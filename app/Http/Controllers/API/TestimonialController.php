<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use File;

class TestimonialController extends Controller
{
    protected $path = "";

    public function __construct()
    {

        $this->path = public_path('/images/testimonial/');

        if(!File::isDirectory($this->path)){
                File::makeDirectory($this->path, 0777, true);
        }
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Testimonial::all();
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
            'image' => 'sometimes',
            'name' => 'required|max:200' ,
            'position' => 'sometimes' ,
            'company' => 'sometimes' ,
            'message' => 'required' 
        ]);

        // image is stored in public folder
        if($request->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(83, 83)->save($this->path.$image_name);

        }

        // new Testimonial created
         Testimonial::create([
            'name' => $request->get('name'),
            'position' => $request->get('position'),
            'company' => $request->get('company'),
            'message' => $request->get('message'),
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
        $testimonial = Testimonial::find($id);

        // validate with laravel in real time
        $request->validate([    
            'image' => 'sometimes',
            'name' => 'required|max:200' ,
            'position' => 'sometimes' ,
            'company' => 'sometimes' ,
            'message' => 'required' ,
        ]);

        // if new image is uploaded saved and old removed
        if($request->image != $testimonial->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];


            \Image::make($request->image)->resize(83, 83)->save($this->path.$image_name);

            //   delete old image
            if($testimonial->image){
                $this->deleteImage($testimonial->image);
            }

        }

        // update testimonial info
        $testimonial->update([
            'name' => $request->get('name'),
            'position' => $request->get('position'),
            'company' => $request->get('company'),
            'message' => $request->get('message'),
            'image' => isset($image_name) ? $image_name : $testimonial->image,
        ]);

        // return $request->all();
        return ["message" => "Updated"];
    }


    public function sortOrder(Request $request)
    {
        // return $request->all();
        Testimonial::truncate();

        foreach($request->all() as $testimonial){
            Testimonial::create([

                'id' => $testimonial['id'] ,
                'order' => $testimonial['order'],
                'image' => $testimonial['image'],
                'name' => $testimonial['name'],
                'position' => $testimonial['position'],
                'company' => $testimonial['company'],
                'message' => $testimonial['message'],

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
        $testimonial = Testimonial::find($id);

        if($testimonial->image){
            $this->deleteImage($testimonial->image);
        }

        $testimonial->delete();

         // return $request->all();
        return ["message" => "Updated"];

    }

    protected function deleteImage($imagename)
    {
        if(file_exists($this->path.$imagename)){
            unlink($this->path . $imagename);
        }
    }
}
