<?php
  
  namespace App\Http\Controllers;
  
  use App\MemberLoan;
  use App\LoanGuarantor;
  use App\Http\Resources\LoanGuarantorResource;
  use App\Http\Resources\LoanGuarantorCollection;
  use Illuminate\Http\Request;
  
  class LoanGuarantorController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return new LoanGuarantorCollection(
        LoanGuarantorResource::collection(
          LoanGuarantor::all()
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
      
      $loanGuarantor = new LoanGuarantor;
      $loanGuarantor->fill($data);
      $loanGuarantor->save();
      
      return new LoanGuarantorResource(
        $loanGuarantor
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
      return new LoanGuarantorResource(
        LoanGuarantor::findOrFail($id)
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
      $data = $request->all();
      
      $loanGuarantor = LoanGuarantor::findOrFail($id);
      $loanGuarantor->fill($data);
      $loanGuarantor->save();
      
      return new LoanGuarantorResource(
        $loanGuarantor
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
      return LoanGuarantor::destroy($id);
    }
    
    public function loanGuarantors($loan) {
      return new LoanGuarantorCollection(
        LoanGuarantorResource::collection(
          MemberLoan::findOrFail($loan)->guarantors
        )
      );
    }
  }
