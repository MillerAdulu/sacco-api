<?php

namespace App\Http\Resources;

use App\AddressDetail;
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
            'type' => 'AddressDetails',
            'addressDetailId' => $this->address_detail_id,

            'memberId' => $this->member_id,
            'businessId' => $this->business_id,
            'employerId' => $this->employer_id,

            'county' => new CountyResource(AddressDetail::where('county_id', $this->county_id)->first()->county),
            'constituency' => new ConstituencyResource(AddressDetail::where('constituency_id', $this->constituency_id)->first()->constituency),
            'locality' => new LocalityResource(AddressDetail::where('locality_id', $this->locality_id)->first()->locality),
            'postalAddress' => $this->postal_address,
            'postOffice' => new PostOfficeResource(AddressDetail::where('post_office_id', $this->post_office_id)->first()->postOffice),

            'street' => $this->street,
            'buildingName' => $this->building_name,
            'floor' => $this->floor,
            'houseNumber' => $this->house_number,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
