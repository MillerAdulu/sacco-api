<?php
  
  namespace App\Http\Resources;
  
  use App\MemberContribution;
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class MemberContributionResource extends JsonResource
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
        'type' => 'MemberContribution',
        'memberContributionId' => $this->member_contribution_id,
        'member' => new MemberResource(MemberContribution::where('member_id', $this->member_id)->first()->member),
        'paymentMethod' => new PaymentMethodResource(MemberContribution::where('payment_method_id', $this->payment_method_id)->first()->paymentMethod),
        'contributionAmount' => $this->contribution_amount,
        'comment' => $this->comment,
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
