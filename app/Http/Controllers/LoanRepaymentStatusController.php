<?php

namespace App\Http\Controllers;

use App\LoanRepaymentStatus;
use App\Http\Resources\LoanRepaymentStatusResource;
use App\Http\Resources\LoanRepaymentStatusCollection;

use Illuminate\Http\Request;

class LoanRepaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LoanRepaymentStatusCollection(
            LoanRepaymentStatusResource::collection(
                LoanRepaymentStatus::all()
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

        $loanRepaymentStatus = new LoanRepaymentStatus;
        $loanRepaymentStatus->fill($data);
        $loanRepaymentStatus->save();

        return new LoanRepaymentStatusResource(
            $loanRepaymentStatus
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
        return new LoanRepaymentStatusResource(
            LoanRepaymentStatus::findOrFail($id)
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

        $loanRepaymentStatus = LoanRepaymentStatus::findOrFail($id);
        $loanRepaymentStatus->fill($data);
        $loanRepaymentStatus->save();

        return new LoanRepaymentStatusResource(
            $loanRepaymentStatus
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
        return LoanPaymentStatus::destroy($id);
    }
}
