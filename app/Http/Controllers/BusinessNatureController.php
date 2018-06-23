<?php

namespace App\Http\Controllers;

use App\BusinessNature;
use App\Http\Resources\BusinessNatureCollection;
use App\Http\Resources\BusinessNatureResource;
use Illuminate\Http\Request;

class BusinessNatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\BusinessNatureCollection
     */
    public function index()
    {
        return new BusinessNatureCollection(
          BusinessNatureResource::collection(
            BusinessNature::all()
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
}
