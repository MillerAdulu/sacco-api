<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\MemberContribution;

class MemberContributionTotalResource extends JsonResource
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
            'member' => new MemberResource(MemberContribution::where('member_id', $this->member_id)->first()->member),
            'contributionTotal' => $this->total
        ];;
    }
}
