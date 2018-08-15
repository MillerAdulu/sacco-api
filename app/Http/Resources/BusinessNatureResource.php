<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessNatureResource extends JsonResource
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
            'type' => 'BusinessNature',
            'businessNatureId' => $this->business_nature_id,
            'natureOfBusiness' => $this->nature_of_business,

            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at

        ];
    }
}
