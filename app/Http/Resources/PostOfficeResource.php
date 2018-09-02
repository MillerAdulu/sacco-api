<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class PostOfficeResource extends JsonResource
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
        'type' => 'PostOffice',
        
        'postOfficeId' => $this->post_office_id,
        
        'postOfficeCode' => $this->post_office_code,
        'postOfficeName' => $this->post_office_name,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
