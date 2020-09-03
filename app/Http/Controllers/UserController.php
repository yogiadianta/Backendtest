<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
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
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $user = new User;
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->postcode = $request->input('postcode');
            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->save();
            return response()->json($user);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function signup(){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages(), 'success' =>false);
            return $response;
        }else{
            $user = new User;
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->postcode = $request->input('postcode');
            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->save();
            return response()->json($user);
        }
    }

    public function signin(Request $request){
        $email = $request->input('email');
        $user = User::where('email', $email)->firstOrFail();
        return response()->json($user);
    }
}
