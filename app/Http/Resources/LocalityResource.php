<?php
  
  namespace App\Http\Resources;
  
  use App\Constituency;
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class LocalityResource extends JsonResource
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
        'type' => 'Locality',
        'localityId' => $this->locality_id,
        
        'constituency' => new ConstituencyResource(
          Constituency::find($this->constituency_id)
        ),
        'localityName' => $this->locality_name,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
