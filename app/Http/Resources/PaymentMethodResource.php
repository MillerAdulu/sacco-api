<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'type' => 'PaymentMethod',
            
            'paymentMethodId' => $this->payment_method_id,

            'paymentMethod' => $this->payment_method_name,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->created_at

        ];
    }
}
