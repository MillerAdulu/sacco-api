<?php

namespace App\Http\Controllers;

use App\MemberLoan;
use App\Http\Resources\MemberLoanResource;
use App\Http\Resources\MemberLoanCollection;
use Illuminate\Http\Request;

class MemberLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MemberLoanCollection(
            MemberLoanResource::collection(
                MemberLoan::all()
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

        $memberLoan = new MemberLoan;
        $memberLoan->fill($data);
        $memberLoan->save();

        return new MemberLoanResource(
            $memberLoan
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
        return new MemberLoanResource(
            MemberLoan::findOrFail($id)
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

        $memberLoan = MemberLoan::findOrFail($id);
        $memberLoan->fill($data);
        $memberLoan->save();

        return new MemberLoanResource(
            $memberLoan
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
        return MemberLoan::destroy($id);
    }
}
