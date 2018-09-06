<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  use App\MemberDeposit;
  
  class MemberDepositTotalResource extends JsonResource
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
        'type' => 'MemberContributionTotal',
        'member' => new MemberResource(MemberDeposit::where('member_id', $this->member_id)->first()->member),
        'contributionTotal' => $this->total
      ];;
    }
  }
