<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  use App\PaymentMethod;
  use App\Member;
  use App\Business;
  
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
      return [
        'type' => 'PaymentDetails',
        'paymentDetailsId' => $this->payment_details_id,
        'paymentMethod' => new PaymentMethodResource(
          PaymentMethod::find($this->payment_method_id)
        ),
        'member' => new MemberResource(
          Member::find($this->member_id)
        ),
        'businessId' => new BusinessResource(
          Business::find($this->business_id)
        ),
        
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
