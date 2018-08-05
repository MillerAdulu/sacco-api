<?php

namespace App\Http\Resources;

use App\LoanGuarantor;
use App\MemberLoan;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanGuarantorResource extends JsonResource
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
            'loanGuarantorId' => $this->loan_guarantor_id,
            'memberLoan' => new MemberLoanResource(
                MemberLoan::find(
                    $this->member_loan_id
                )
            ),
            'identificationNumber' => $this->identification_number,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'otherName' => $this->other_name,
            'phoneNumber' => $this->phone_number,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
        ];
    }
}
