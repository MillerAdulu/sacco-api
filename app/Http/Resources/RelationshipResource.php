<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RelationshipResource extends JsonResource
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
            'type' => 'Relationship',
            'relationshipId' => $this->relationship_id,
            'relationshipName' => $this->relationship_name,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
        ];
    }
}
