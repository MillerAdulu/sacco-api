<?php
  
  namespace App\Http\Controllers;
  
  use App\Business;
  use App\Http\Resources\BusinessCollection;
  use App\Http\Resources\BusinessResource;
  use Illuminate\Http\Request;
  
  class BusinessController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\BusinessCollection
     */
    public function index()
    {
      return new BusinessCollection(
        BusinessResource::collection(
          Business::all()
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
      $business = new Business;

      $business->fill(
        $request->all()
      );

      $business->save();

      return new BusinessResource(
        $business
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
      return new BusinessResource(
        Business::find($id)
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
      $business = Business::find($id);

      $business->fill(
        $request->all()
      );

      $business->save();

      return new BusinessResource(
        $business
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
      return Business::destroy($id);
    }
  }
