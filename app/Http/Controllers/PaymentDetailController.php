<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentDetailCollection;
use App\Http\Resources\PaymentDetailResource;
use App\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PaymentDetailCollection
     */
    public function index()
    {
        return new PaymentDetailCollection(
          PaymentDetailResource::collection(
            PaymentDetail::all()
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
        $paymentDetail = new PaymentDetail;
        $paymentDetail->fill($data);
        $paymentDetail->save();

        return new PaymentDetailResource(
            $paymentDetail
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
        return new PaymentDetailResource(
            PaymentDetail::findOrFail($id)
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
        return PaymentDetail::destroy($id);
    }


    public function memberPaymentDetails($member) {
        return new PaymentDetailCollection(
            PaymentDetailResource::collection(
                PaymentDetail::where('member_id', $member)->get()
            )
        );
    }
}
