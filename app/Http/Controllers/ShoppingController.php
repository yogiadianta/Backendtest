<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shopping;
use Validator;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping = Shopping::all();
        return response()->json($shopping);
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
            'name' => 'required'
        ]);

        if($validator->fails()){
            $response = array('responese' =>$validator->message(), 'success'=>false);
            return $response;
        }else{
            $shopping = new Shopping;
            $shopping->name = $request->input('name');
            $shopping->save();

            return response()->json($shopping);
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
        $shopping = Shopping::find($id);
        return response()->json($shopping);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()){
            $response = array('responese' =>$validator->message(), 'success'=>false);
            return $response;
        }else{
            $shopping = Shopping::find($id);
            $shopping->name = $request->input('name');
            $shopping->save();
            return response()->json($shopping);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shopping = Shopping::find($id);
        $shopping->delete();
        $response = array('responese' =>'Item Deleted', 'success'=>true);
        return $response;
    }
}
