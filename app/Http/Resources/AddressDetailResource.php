<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressDetailResource extends JsonResource
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

            'addressDetailId' => $this->address_detail_id,

            'memberId' => $this->member_id,
            'businessId' => $this->business_id,
            'employerId' => $this->employer_id,

            'countyId' => $this->county_id,
            'constituencyId' => $this->constituency_id,
            'localityId' => $this->locality_id,
            'postalAddress' => $this->postal_address,
            'postOfficeId' => $this->post_office_id,

            'street' => $this->street,
            'buildingName' => $this->building_name,
            'floor' => $this->floor,
            'houseNumber' => $this->house_number,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
