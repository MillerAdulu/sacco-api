<?php
  
  namespace App\Http\Controllers;
  
  use Illuminate\Http\Request;
  use App\Nominee;
  use App\Http\Resources\NomineeResource;
  use App\Http\Resources\NomineeCollection;
  
  class NomineeController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new NomineeCollection(
        NomineeResource::collection(
          Nominee::all()
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
      $data = $request->all();
      
      $nominee = new Nominee;
      $nominee->fill($data);
      $nominee->save();
      
      return new NomineeResource(
        $nominee
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
      return new NomineeResource(
        Nominee::findOrFail($id)
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
      $nominee = Nominee::find($id);

      $nominee->fill(
        $request->all()
      );

      $nominee->save();

      return new NomineeResource(
        $nominee
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
      return Nominee::destroy($id);
    }
    
    public function memberNominees($member) {
      return new NomineeCollection(
        NomineeResource::collection(
          Nominee::where('member_id', $member)->get()
        )
      );
    }
  }
