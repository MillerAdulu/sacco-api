<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  
  class BusinessResource extends JsonResource
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
        'type' => 'Business',
        'businessId' => $this->business_id,
        'memberId' => $this->member_id,
        
        'businessName' => $this->business_name,
        'businessNatureId' => $this->business_nature_id,
        'approximateMonthlyIncome' => $this->approximate_monthly_income,
        
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      
      ];
    }
  }
