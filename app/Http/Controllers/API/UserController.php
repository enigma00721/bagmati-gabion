<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function AuthRouteAPI(Request $request){
   	 return $request->user();
 	}

    public function index()
    {
        return User::latest()->paginate(10);
        // return User::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return ['message' => 'Reached here'];
        // return $request->all();

        // validate with laravel in real time
        $request->validate([    
            'name' => 'required|string|max:200' ,
            'email' => 'required|email|max:200|unique:users' ,
            'password' => 'required|min:4',
        ]);

        // create new user and return
        return User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // validate 
        $request->validate([    
            'name' => 'required|string|max:200' ,
            'email' => 'required|email|max:200|unique:users,email,'.$user->id ,
            'password' => 'sometimes|min:4',
        ]);

        // update row/user
        // $user->update($request->all());
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return $user;

        // return $request->all();
        // return ["message" => "User updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $user = User::find($id);
            $user->delete();
            return ["message" => "User Deleted"];


    }
}
