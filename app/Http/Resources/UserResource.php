<?php
  
  namespace App\Http\Resources;
  
  use Illuminate\Http\Resources\Json\JsonResource;
  use App\Member;

  class UserResource extends JsonResource
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
        'type' => 'User',
        'userId' => $this->id,
        'userName' => $this->name,
        'email' => $this->email,
        'phoneNumber' => $this->phone_number,
        'accessLevel' => $this->access_level,
        'token' => $this->createToken('SEDCApp')->accessToken,
        'member' => Member::find($this->member_id) ? new MemberResource(Member::find($this->member_id)) : null,
        'createdAt' => (string) $this->created_at,
        'updatedAt' => (string) $this->updated_at
      ];
    }
  }
