<?php

namespace App\Http\Controllers;

use App\County;
use App\Http\Resources\CountyCollection;
use App\Http\Resources\CountyResource;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\CountyCollection
     */
    public function index()
    {
        return new CountyCollection(
          CountyResource::collection(
            County::all()
          )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CountyResource(
            County::find($id)
        );
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
}
