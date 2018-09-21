<?php
  
  namespace App\Http\Resources;
  
  use App\County;
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class ConstituencyResource extends JsonResource
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
        'type' => 'Constituency',
        'constituencyId' => $this->constituency_id,
        
        'county' => new CountyResource(
          County::find($this->county_id)
        ),
        'constituencyName' => $this->constituency_name,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
