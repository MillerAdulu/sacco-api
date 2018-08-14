<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTFactory;
use JWTAuth;

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
            'userId' => $this->id,
            'userName' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phone_number,
            'accessLevel' => $this->access_level,
            'token' => JWTAuth::fromUser($this)
        ];
    }
}
