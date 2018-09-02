<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  use App\PaymentMethod;
  
  class PaymentDetailResource extends JsonResource
  {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $payment_methods = PaymentMethod::all();
      $payment_method_name = '';
      
      foreach($payment_methods as $payment_method) {
        if($this->payment_method_id == $payment_method->payment_method_id) {
          $payment_method_name = $payment_method->payment_method_name;
        }
      }
      
      return [
        'type' => 'PaymentDetails',
        'paymentDetailsId' => $this->payment_details_id,
        'paymentMethodId' => $this->payment_method_id,
        'paymentMethodName' => $payment_method_name,
        'memberId' => $this->member_id,
        'businessId' => $this->business_id,
        
        'bankName' => $this->bank_name,
        'bankAccountNumber' => $this->bank_account_number,
        'cardNumber' => $this->card_number,
        
        'serviceProvider' => $this->provider,
        'phoneNumber' => $this->phone_number,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
