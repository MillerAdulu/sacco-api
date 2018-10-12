<?php
  
  namespace App\Http\Resources;

  use Illuminate\Http\Resources\Json\JsonResource;  
  use App\AddressDetail;
  use App\County;
  use App\Constituency;
  use App\Locality;
  use App\PostOffice;
  use App\Member;
  
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
        
        'member' => new MemberResource(
          Member::find($this->member_id)
        ),
        'businessId' => $this->business_id,
        'employerId' => $this->employer_id,
        
        'county' => new CountyResource(
          County::find($this->county_id)
        ),
        'constituency' => new ConstituencyResource(
          Constituency::find($this->constituency_id)
        ),
        'locality' => new LocalityResource(
          Locality::find($this->locality_id)
        ),
        'postalAddress' => $this->postal_address,
        'postOffice' => new PostOfficeResource(
          PostOffice::find($this->post_office_id)
        ),
        
        'street' => $this->street,
        'buildingName' => $this->building_name,
        'floor' => $this->floor,
        'houseNumber' => $this->house_number,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
