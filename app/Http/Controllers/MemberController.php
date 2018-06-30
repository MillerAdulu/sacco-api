<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\MemberCollection;
  use App\Http\Resources\MemberResource;
  use App\Member;
  use Illuminate\Http\Request;
  
  class MemberController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\MemberCollection
     */
    public function index()
    {
      return new MemberCollection(
        MemberResource::collection(
          Member::all()
        )
      );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\MemberResource
     */
    public function store(Request $request)
    {
      
      
      $member = new Member();
      
      $member->identification_number = $request['identificationNumber'];
      $member->first_name = $request['firstName'];
      $member->last_name = $request['lastName'];
      $member->other_name = $request['otherName'];
      $member->phone_number = $request['phoneNumber'];
      $member->proposed_monthly_contribution = $request['proposedMonthlyContribution'];
      $member->date_of_birth = $request['dateOfBirth'];
      $member->email = $request['email'];
      
      $member->save();
      
      return new MemberResource(
        $member
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
      //
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
  }
