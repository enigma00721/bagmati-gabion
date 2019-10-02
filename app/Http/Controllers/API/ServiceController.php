<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use File;

class ServiceController extends Controller
{
    protected $path1 = "";
    protected $path2 = "";

    public function __construct()
    {

        $this->path1 = public_path('/images/service/');
        $this->path2 = public_path('/images/service/small/');

        if(!File::isDirectory($this->path1)){
                File::makeDirectory($this->path1, 0777, true);
        }

        // smaller service images
        if (!file_exists($this->path2)) {
           mkdir($this->path2, $mode = 0777, true);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Service::all();
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
            'title' => 'required|max:200' ,
            'text' => 'required' 
        ]);

        $slug = str_slug($request->get('title'));

        $request->request->add([
            'slug' => $slug
        ]);

        // return $request->all();
        // image is stored in public folder
        if($request->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            $image_name2 = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];

            \Image::make($request->image)->resize(770, 426)->save(public_path('images/service/').$image_name);

            \Image::make($request->image)->resize(370, 230)->save(public_path('images/service/small/').$image_name2);

        }

        // new Service created
         Service::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'slug' => $request->get('slug'),
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
        $service = Service::find($id);

        // validate with laravel in real time
        $request->validate([    
            'title' => 'required|string|max:200' ,
            'text' => 'required' ,
            'image' => 'sometimes'
        ]);

        $slug = str_slug($request->get('title'));

        $request->request->add([
            'slug' => $slug
        ]);

        // if new image is uploaded saved and old removed
        if($request->image != $service->image){

            $image_name = time() . '.' . explode('/' , explode(':', substr($request->image, 0 , strpos($request->image, ';')))[1])[1];


            \Image::make($request->image)->resize(770, 426)->save($this->path1.$image_name);

            \Image::make($request->image)->resize(370, 230)->save($this->path2.$image_name);

            //   delete old image
            if($service->image){
                $this->deleteImage($service->image);
            }

        }

        // update service info
        $service->update([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'slug' => $request->get('slug'),
            'image' => isset($image_name) ? $image_name : $service->image,
        ]);

        // return $request->all();
        return ["message" => "Updated"];
    }


    public function sortOrder(Request $request)
    {
        // return $request->all();
        Service::truncate();

        foreach($request->all() as $service){
            Service::create([

                'id' => $service['id'] ,
                'order' => $service['order'],
                'image' => $service['image'],
                'title' => $service['title'],
                'text' => $service['text'],
                'status' => $service['status'],

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
        $service = Service::find($id);

        if($service->image){
            $this->deleteImage($service->image);
        }

        $service->delete();

         // return $request->all();
        return ["message" => "Updated"];

    }

    protected function deleteImage($imagename)
    {
        if(file_exists($this->path1.$imagename)){
            unlink($this->path1 . $imagename);
        }
        if(file_exists($this->path2.$imagename)){
            unlink($this->path2 . $imagename);
        }
    }
}
