<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanTypeResource extends JsonResource
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
            'loanTypeId' => $this->loan_type_id,
            'loanTypeName' => $this->loan_type_name,
            'createdAt' => (string) $this->created_at,
            'updatedAt' => (string) $this->updated_at
        ];
    }
}
