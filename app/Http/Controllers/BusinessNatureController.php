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
      $businessNature = new BusinessNature;
      $businessNature->fill(
        $request->all()
      );

      $businessNature->save();

      return new BusinessNatureResource(
        $businessNature
      );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return new BusinessNatureResource(
        BusinessNature::find($id)
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
      $businessNature = BusinessNature::find($id);

      $businessNature->fill(
        $request->all()
      );

      $businessNature->save();

      return new BusinessNatureResource(
        $businessNature
      );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return BusinessNature::destroy($id);
    }
  }
