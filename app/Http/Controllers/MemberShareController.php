<?php

namespace App\Http\Controllers;

use App\MemberShare;
use Illuminate\Http\Request;
use Kabangi\Mpesa\Init as Mpesa;

use App\Http\Resources\MemberShareCollection;
use App\Http\Resources\MemberShareResource;
use App\Http\Resources\MemberShareTotalResource;

class MemberShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MemberShareCollection(
            MemberShareResource::collection(
                MemberShare::all()
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

        $memberShare = new MemberShare;
        $memberShare->fill($data);
        $memberShare->save();

        return new MemberShareResource(
            $memberShare
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberShare  $memberShare
     * @return \Illuminate\Http\Response
     */
    public function show(MemberShare $memberShare)
    {
        return new MemberShareResource(
            $memberShare
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberShare  $memberShare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberShare $memberShare)
    {
        $memberShare->fill(
            $request->all()
        );

        $memberShare->save();

        return new MemberShareResource(
            $memberShare
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberShare  $memberShare
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShare $memberShare)
    {
        return MemberShare::destroy($memberShare);
    }

    public function memberShares($member) {
        return new MemberShareCollection(
            MemberShareResource::collection(
                MemberShare::where('member_id', $member)->get()
            )
        );
    }

    public function allShareAccounts()
    {
        return new MemberShareCollection(
            MemberShareTotalResource::collection(
            MemberShare::select('member_id', \DB::raw('SUM(deposit_amount) AS total'))->groupBy('member_id')->get()
            )
        );
    }

    public function addMpesaDeposit(Request $request)
    {
        $depositDetails = $request->all();

        $member = Member::findOrFail(
            $depositDetails['BillRefNumber']
        );

        $newShareDeposit = new MemberShare;

        $newShareDeposit->deposit_amount = $depositDetails['TransAmount'];
        $newShareDeposit->payment_method_id = 1;
        $newShareDeposit->comment = $depositDetails['TransID'];
        $newShareDeposit->member_id = $member->member_id;
        $newShareDeposit->save();

        return new MemberShareResource(
            $newShareDeposit
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

        $shareDepositResults = collect($mpesaData["stkCallback"]["CallbackMetadata"]["Item"])->flatten();
        $member = Member::where('phone_number', $shareDepositResults[8])->firstOrFail();

        $stkDeposit = new MemberShare;
        $stkDeposit->member_id = $member->member_id;
        $stkDeposit->payment_method_id = 1;
        $stkDeposit->deposit_amount = $depositResults[1];
        $stkDeposit->comment = $depositResults[3];
        $stkDeposit->save();

        return new MemberShareResource(
            $stkDeposit
        );
    }
}
