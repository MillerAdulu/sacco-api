<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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

            'paymentDetailsId' => $this->payment_details_id,

            'paymentMethodId' => $this->payment_method_id,
            'memberId' => $this->member_id,
            'businessId' => $this->business_id,

            'bankAccountNumber' => $this->bank_account_number,
            'cardNumber' => $this->card_number,
            'phoneNumber' => $this->phone_number,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
