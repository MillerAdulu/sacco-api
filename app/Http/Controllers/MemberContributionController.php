<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberContributionCollection;
use App\Http\Resources\MemberDepositResource;
use App\Http\Resources\MemberDepositTotalResource;
use App\Member;
use App\MemberDeposit;
use Illuminate\Http\Request;
use Kabangi\Mpesa\Init as Mpesa;

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

        $memberContribution = new MemberDeposit;

        $memberContribution->fill($data);
        $memberContribution->save();

        return new MemberDepositResource(
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

    public function memberContributions($member)
    {
        return new MemberContributionCollection(
            MemberDepositResource::collection(
                MemberDeposit::where('member_id', $member)->get()
            )
        );
    }

    public function allAccounts()
    {
        return new MemberContributionCollection(
            MemberDepositTotalResource::collection(
                MemberDeposit::select('member_id', \DB::raw('SUM(contribution_amount) AS total'))->groupBy('member_id')->get()
            )
        );
    }

    public function addMpesaContribution(Request $request)
    {
        $contributionDetails = $request->all();

        $member = Member::findOrFail(
            $contributionDetails['BillRefNumber']
        );

        $newContribution = new MemberDeposit;

        $newContribution->contribution_amount = $contributionDetails['TransAmount'];
        $newContribution->payment_method_id = 1;
        $newContribution->comment = $contributionDetails['TransID'];
        $newContribution->member_id = $member->member_id;
        $newContribution->save();

        return new MemberDepositResource(
            $newContribution
        );
    }

    public function lipaNaMpesa(Request $request)
    {
        $paymentInfo = $request->all();
        
        $mpesa = new Mpesa();

        try {

            $response = $mpesa->STKPush([
                'amount' => $paymentInfo['contribution_amount'],
                'transactionDesc' => 'Testing',
                'phoneNumber' => $paymentInfo['phone_number'],
                'accountReference' => $paymentInfo['member_id'],
            ]);

            return json_encode($response);

        } catch (Exception $e) {

            return json_encode($e->getMessage());
            
        }
    }

    public function stkMpesaContribution(Request $request)
    {
        $mpesaData = $request->Body;
        if(!$mpesaData["stkCallback"]["ResultCode"] == 0) {
            return;
        }

        $contributionResults = collect($mpesaData["stkCallback"]["CallbackMetadata"]["Item"])->flatten();
        $member = Member::where('phone_number', $contributionResults[8])->firstOrFail();

        $stkContribution = new MemberDeposit;
        $stkContribution->member_id = $member->member_id;
        $stkContribution->payment_method_id = 1;
        $stkContribution->contribution_amount = $contributionResults[1];
        $stkContribution->comment = $contributionResults[3];
        $stkContribution->save();

        return new MemberDepositResource(
            $stkContribution
        );
    }
}
