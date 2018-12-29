<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberShareTotalResource extends JsonResource
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
            'type' => 'MemberShareTotal',
            'member' => new MemberResource(
                MemberShare::where('member_id', $this->member_id)->first()->member),
            'depositTotal' => $this->total
          ];;
    }
}
