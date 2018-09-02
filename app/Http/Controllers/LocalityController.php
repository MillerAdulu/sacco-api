<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\LocalityCollection;
  use App\Http\Resources\LocalityResource;
  use App\Locality;
  use Illuminate\Http\Request;
  
  class LocalityController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\LocalityCollection
     */
    public function index()
    {
      return new LocalityCollection(
        LocalityResource::collection(
          Locality::all()
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
      return new LocalityResource(
        Locality::findOrFail($id)
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
    
    public function constituencyLocalities($constituency) {
      return new LocalityCollection(
        LocalityResource::collection(
          Locality::where('constituency_id', $constituency)->get()
        )
      );
    }
  }
