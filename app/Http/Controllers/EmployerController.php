<?php
  
  namespace App\Http\Controllers;
  
  use App\Employer;
  use App\Http\Resources\EmployerCollection;
  use App\Http\Resources\EmployerResource;
  use Illuminate\Http\Request;
  
  class EmployerController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\EmployerCollection
     */
    public function index()
    {
      return new EmployerCollection(
        EmployerResource::collection(
          Employer::all()
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
      $employer = new Employer;

      $employer->fill(
        $request->all()
      );

      $employer->save();

      return new EmployerResource(
        $employer
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
      return new EmployerResource(
        Employer::find($id)
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
      $employer = Employer::find($id);

      $employer->fill(
        $request->all()
      );

      $employer->save();

      return new EmployerResource(
        $employer
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
      return Employer::destroy($id);
    }
  }
