<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanIssuingStatusResource extends JsonResource
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
            'loanIssuingStatusId' => $this->loan_issuing_status_id,
            'loanIssuingStatus' => $this->loan_issuing_status,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
        ];
    }
}
