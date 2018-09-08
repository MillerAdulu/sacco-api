<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\JobTitleCollection;
  use App\Http\Resources\JobTitleResource;
  use App\JobTitle;
  use Illuminate\Http\Request;
  
  class JobTitleController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\JobTitleCollection
     */
    public function index()
    {
      return new JobTitleCollection(
        JobTitleResource::collection(
          JobTitle::all()
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
      $jobTitle = new JobTitle;
      $jobTitle->fill(
        $request->all()
      );
      $jobTitle->save();

      return new JobTitleResource(
        $jobTitle
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
      return new JobTitleResource(
        JobTitle::find($id)
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
      $jobTitle = JobTitle::find($id);

      $jobTitle->fill(
        $request->all()
      );

      $jobTitle->save();

      return new JobTitleResource(
        $jobTitle
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
      return JobTitle::destroy($id);
    }
  }
