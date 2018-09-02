<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class EmployerResource extends JsonResource
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
        'type' => 'Employer',
        'employerId' => $this->employer_id,
        
        'employerName' => $this->employer_name,
        'businessNatureId' => $this->business_nature_id,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
