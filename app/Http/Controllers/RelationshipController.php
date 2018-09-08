<?php
  
  namespace App\Http\Controllers;
  
  use App\Relationship;
  use Illuminate\Http\Request;
  use App\Http\Resources\RelationshipCollection;
  use App\Http\Resources\RelationshipResource;
  
  class RelationshipController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new RelationshipCollection(
        RelationshipResource::collection(
          Relationship::all()
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
      $relationship = new Relationship;
      
      $relationship->fill(
        $request->all()
      );

      $relationship->save();

      return new RelationshipResource(
        $relationship
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
      return new RelationshipResource(
        Relationship::find($id)
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
      $relationship = Relationship::find($id);

      $relationship->fill(
        $request->all()
      );

      $relationship->save();

      return new RelationshipResource(
        $relationship
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
      return Relationship::destroy($id);
    }
  }
