<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaritalStatusResource extends JsonResource
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
            'type' => 'MaritalStatus',
            'maritalStatusId' => $this->marital_status_id,
            'maritalStatus' => $this->marital_status,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
