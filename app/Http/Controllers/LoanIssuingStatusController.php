<?php

namespace App\Http\Controllers;

use App\LoanIssuingStatus;
use App\Http\Resources\LoanIssuingStatusCollection;
use App\Http\Resources\LoanIssuingStatusResource;
use Illuminate\Http\Request;

class LoanIssuingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LoanIssuingStatusCollection(
            LoanIssuingStatusResource::collection(
                LoanIssuingStatus::all()
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

        $loanIssuingStatus = new LoanIssuingStatus;
        $loanIssuingStatus->fill($data);
        $loanIssuingStatus->save();

        return new LoanIssuingStatusResource(
            $loanIssuingStatus
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
        return new LoanIssuingStatusResource(
            LoanIssuingStatus::findOrFail($id)
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

        $loanIssuingStatus = LoanIssuingStatus::findOrFail($id);
        $loanIssuingStatus->fill($data);
        $loanIssuingStatus->save();

        return new LoanIssuingStatusResource(
            $loanIssuingStatus
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
        return LoanIssuingStatus::destroy($id);
    }
}
