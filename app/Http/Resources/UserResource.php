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
      $member = Member::find($this->member_id) ? new MemberResource(Member::find($this->member_id)) : null;

      return [
        'type' => 'User',
        'userId' => $this->id,
        'userName' => $this->name,
        'email' => $this->email,
        'phoneNumber' => $this->phone_number,
        'accessLevel' => $this->access_level,
        'token' => $this->createToken('LaraPassport')->accessToken,
        'member' => $member
      ];
    }
  }
