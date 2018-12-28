<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  use App\Relationship;
  use App\Member;
  
  class NomineeResource extends JsonResource
  {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $nominee_relationship = '';
      
      foreach(Relationship::all() as $relationship) {
        if($relationship->relationship_id == $this->relationship_id){
          $nominee_relationship = $relationship->relationship_name;
        }
      }
      
      return [
        'type' => 'Nominee',
        'nomineeId' => $this->nominee_id,
        'identificationNumber' => $this->identification_number,
        'firstName' => $this->first_name,
        'lastName' => $this->last_name,
        'otherName' => $this->other_name,
        'member' => Member::findOrFail($this->member_id),
        'relationship' => $nominee_relationship,
        'phoneNumber' => $this->phone_number,
        'email' => $this->email,
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
