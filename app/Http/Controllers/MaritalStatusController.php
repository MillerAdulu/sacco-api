<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\MaritalStatusCollection;
  use App\Http\Resources\MaritalStatusResource;
  use App\MaritalStatus;
  use Illuminate\Http\Request;
  
  class MaritalStatusController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\MaritalStatusCollection
     */
    public function index()
    {
      return new MaritalStatusCollection(
        MaritalStatusResource::collection(
          MaritalStatus::all()
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
      $maritalStatus = new MaritalStatus;
      $maritalStatus->fill(
        $request->all()
      );
      $maritalStatus->save();

      return new MaritalStatusResource(
        $maritalStatus
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
      return new MaritalStatusResource(
        MaritalStatus::find($id)
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
      $maritalStatus = MaritalStatus::find($id);
      $maritalStatus->fill(
        $request->all()
      );

      $maritalStatus->save();

      return new MaritalStatusResource(
        $maritalStatus
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
      return MaritalStatus::find($id);
    }
  }
