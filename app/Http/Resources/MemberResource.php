<?php

namespace App\Http\Resources;

use App\MaritalStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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

            'memberId' => $this->member_id,

            'identificationNumber' => $this->identification_number,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'otherName' => $this->other_name,

            'dateOfBirth' => $this->date_of_birth,
            'phoneNumber' => $this->phone_number,
            'email' => $this->email,

            'kraPin' => $this->kra_pin,
            'kraCertificate' => $this->kra_certificate,

            'gender' => $this->gender,
            'passportPhoto' => $this->passport_photo,
            'maritalStatus' => new MaritalStatusResource(MaritalStatus::find(
                $this->marital_status_id
            )),

            'proposedMonthlyContribution' => $this->proposed_monthly_contribution,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
