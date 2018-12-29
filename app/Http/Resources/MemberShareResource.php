<?php

namespace App\Http\Resources;

use App\PaymentMethod;
use App\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberShareResource extends JsonResource
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
            'type' => 'MemberShare',
            'memberShareDepositId' => $this->member_share_deposit_id,
            'member' => new MemberResource(
              Member::find($this->member_id)
            ),
            'paymentMethod' => new PaymentMethodResource(
              PaymentMethod::find($this->payment_method_id)
            ),
            'depositAmount' => $this->deposit_amount,
            'comment' => $this->comment,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
          ];
    }
}
