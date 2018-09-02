<?php
  
  namespace App\Http\Controllers;
  
  use App\MemberContribution;
  use App\Member;
  use App\Http\Resources\MemberContributionResource;
  use App\Http\Resources\MemberContributionCollection;
  use Illuminate\Http\Request;
  use App\Http\Resources\MemberContributionTotalResource;
  
  class MemberContributionController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new MemberContributionCollection(
        MemberContributionResource::collection(
          MemberContribution::latest()->get()
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
      
      $memberContribution = new MemberContribution;
      
      $memberContribution->fill($data);
      $memberContribution->save();
      
      return new MemberContributionResource(
        $memberContribution
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
      return new MemberContributionResource(
        MemberContribution::find($id)
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
    
    public function memberContributions($member) {
      return new MemberContributionCollection(
        MemberContributionResource::collection(
          MemberContribution::where('member_id', $member)->get()
        )
      );
    }
    
    public function allAccounts() {
      return new MemberContributionCollection(
        MemberContributionTotalResource::collection(
          MemberContribution::select('member_id', \DB::raw('SUM(contribution_amount) AS total'))->groupBy('member_id')->get()
        )
      );
    }
    
    public function addMpesaContribution(Request $request) {
      $contributionDetails = $request->all();
      
      $member = Member::findOrFail(
        $contributionDetails['BillRefNumber']
      );
      
      $newContribution = new MemberContribution;
      
      $newContribution->contribution_amount = $contributionDetails['TransAmount'];
      $newContribution->payment_method_id = 1;
      $newContribution->comment = $contributionDetails['TransID'];
      $newContribution->member_id = $member->member_id;
      $newContribution->save();
      
      return new MemberContributionResource(
        $newContribution
      );
    }
  }
