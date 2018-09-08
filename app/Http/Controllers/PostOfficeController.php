<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\PostOfficeCollection;
  use App\Http\Resources\PostOfficeResource;
  use App\PostOffice;
  use Illuminate\Http\Request;
  
  class PostOfficeController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PostOfficeCollection
     */
    public function index()
    {
      return new PostOfficeCollection(
        PostOfficeResource::collection(
          PostOffice::all()
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
      $postOffice = new PostOffice;

      $postOffice->fill(
        $request->all()
      );

      $postOffice->save();

      return new PostOfficeResource(
        $postOffice
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
      return new PostOfficeResource(
        PostOffice::find($id)
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
      $postOffice = PostOffice::find($id);

      $postOffice->fill(
        $request->all()
      );

      $postOffice->save();

      return new PostOfficeResource(
        $postOffice
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
      return PostOffice::destroy($id);
    }
  }
