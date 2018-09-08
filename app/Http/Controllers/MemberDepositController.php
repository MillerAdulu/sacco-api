<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberDepositCollection;
use App\Http\Resources\MemberDepositResource;
use App\Http\Resources\MemberDepositTotalResource;
use App\Member;
use App\MemberDeposit;
use Illuminate\Http\Request;
use Kabangi\Mpesa\Init as Mpesa;

class MemberDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MemberDepositCollection(
            MemberDepositResource::collection(
                MemberDeposit::latest()->get()
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

        $memberDeposit = new MemberDeposit;

        $memberDeposit->fill($data);
        $memberDeposit->save();

        return new MemberDepositResource(
            $memberDeposit
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
        return new MemberDepositResource(
            MemberDeposit::find($id)
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
        $memberDeposit = MemberDeposit::find($id);

        $memberDeposit->fill(
            $request->all()
        );

        $memberDeposit->save();

        return new MemberDepositResource(
            $memberDeposit
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
        return MemberDeposit::destroy($id);
    }

    public function memberDeposits($member)
    {
        return new MemberDepositCollection(
            MemberDepositResource::collection(
                MemberDeposit::where('member_id', $member)->get()
            )
        );
    }

    public function allAccounts()
    {
        return new MemberDepositCollection(
            MemberDepositTotalResource::collection(
                MemberDeposit::select('member_id', \DB::raw('SUM(deposit_amount) AS total'))->groupBy('member_id')->get()
            )
        );
    }

    public function addMpesaDeposit(Request $request)
    {
        $depositDetails = $request->all();

        $member = Member::findOrFail(
            $depositDetails['BillRefNumber']
        );

        $newDeposit = new MemberDeposit;

        $newDeposit->deposit_amount = $depositDetails['TransAmount'];
        $newDeposit->payment_method_id = 1;
        $newDeposit->comment = $depositDetails['TransID'];
        $newDeposit->member_id = $member->member_id;
        $newDeposit->save();

        return new MemberDepositResource(
            $newDeposit
        );
    }

    public function lipaNaMpesa(Request $request)
    {
        $paymentInfo = $request->all();
        
        $mpesa = new Mpesa();

        try {

            $response = $mpesa->STKPush([
                'amount' => $paymentInfo['deposit_amount'],
                'transactionDesc' => 'Testing',
                'phoneNumber' => $paymentInfo['phone_number'],
                'accountReference' => $paymentInfo['member_id'],
            ]);

            return json_encode($response);

        } catch (Exception $e) {

            return json_encode($e->getMessage());
            
        }
    }

    public function stkMpesaDeposit(Request $request)
    {
        $mpesaData = $request->Body;
        if(!$mpesaData["stkCallback"]["ResultCode"] == 0) {
            return;
        }

        $depositResults = collect($mpesaData["stkCallback"]["CallbackMetadata"]["Item"])->flatten();
        $member = Member::where('phone_number', $depositResults[8])->firstOrFail();

        $stkDeposit = new MemberDeposit;
        $stkDeposit->member_id = $member->member_id;
        $stkDeposit->payment_method_id = 1;
        $stkDeposit->deposit_amount = $depositResults[1];
        $stkDeposit->comment = $depositResults[3];
        $stkDeposit->save();

        return new MemberDepositResource(
            $stkDeposit
        );
    }
}
