<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\PaymentMethodCollection;
  use App\Http\Resources\PaymentMethodResource;
  use App\PaymentMethod;
  use Illuminate\Http\Request;
  
  class PaymentMethodController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PaymentMethodCollection
     */
    public function index()
    {
      return new PaymentMethodCollection(
        PaymentMethodResource::collection(
          PaymentMethod::all()
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
      $paymentMethod = new PaymentMethod;
      $paymentMethod->fill(
        $request->all()
      );
      $paymentMethod->save();

      return new PaymentMethodResource(
        $paymentMethod
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
      return new PaymentMethodResource(
        PaymentMethod::find($id)
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
      $paymentMethod = PaymentMethod::find($id);

      $paymentMethod->fill(
        $request->all()
      );

      $paymentMethod->save();

      return new PaymentMethodResource(
        $paymentMethod
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
      return PaymentMethod::destroy($id);
    }
  }
