<?php

namespace App\Http\Controllers;

use App\AddressDetail;
use App\Http\Resources\AddressDetailCollection;
use App\Http\Resources\AddressDetailResource;
use App\Http\Requests\StoreAddressDetail;
use App\Http\Requests\UpdateAddressDetail;
use Illuminate\Http\Request;

class AddressDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\AddressDetailCollection
     */
    public function index()
    {
        return new AddressDetailCollection(
          AddressDetailResource::collection(
            AddressDetail::all()
          )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressDetail $request)
    {
        $data = $request->all();
        
        $address = new AddressDetail;
        $address->fill($data);
        $address->save();

        return new AddressDetailResource(
            $address
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
        return new AddressDetailResource(
            AddressDetail::findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressDetail $request, $id)
    {
        $updates = $request->all();

        $address = AddressDetail::findOrFail($id);
        $address->fill($updates);
        $address->save();

        return new AddressDetailResource(
            $address
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
        return AddressDetail::destroy($id);
    }
}
