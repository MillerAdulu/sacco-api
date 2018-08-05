<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanRepaymentStatusResource extends JsonResource
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
            'loanRepaymentStatusId' => $this->loan_repayment_status_id,
            'loanRepaymentStatus' => $this->loan_repayment_status,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
        ];
    }
}
