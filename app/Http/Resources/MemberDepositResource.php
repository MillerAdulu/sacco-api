<?php
  
  namespace App\Http\Resources;
  
  use App\MemberDeposit;
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class MemberDepositResource extends JsonResource
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
        'type' => 'MemberDeposit',
        'memberDepositId' => $this->member_deposit_id,
        'member' => new MemberResource(MemberDeposit::where('member_id', $this->member_id)->first()->member),
        'paymentMethod' => new PaymentMethodResource(MemberDeposit::where('payment_method_id', $this->payment_method_id)->first()->paymentMethod),
        'depositAmount' => $this->deposit_amount,
        'comment' => $this->comment,
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
