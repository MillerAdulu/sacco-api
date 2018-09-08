<?php
  
  namespace App\Http\Controllers;
  
  use App\Constituency;
  use App\Http\Resources\ConstituencyCollection;
  use App\Http\Resources\ConstituencyResource;
  use Illuminate\Http\Request;
  
  class ConstituencyController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\ConstituencyCollection
     */
    public function index()
    {
      return new ConstituencyCollection(
        ConstituencyResource::collection(
          Constituency::all()
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
      $constituency = new Constituency;

      $constituency->fill(
        $request->all()
      );

      $constituency->save();

      return new ConstituencyResource(
        $constituency
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
      return new ConstituencyResource(
        Constituency::find($id)
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
      $constituency = Constituency::find($id);

      $constituency->fill(
        $request->all()
      );

      $constituency->save();

      return new ConstituencyResource(
        $constituency
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
      return Constituency::destroy($id);
    }
    
    public function countyConstituencies($county) {
      return new ConstituencyCollection(
        ConstituencyResource::collection(
          Constituency::where('county_id', $county)->get()
        )
      );
    }
  }
