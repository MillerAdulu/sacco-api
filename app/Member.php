<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';

    public function marital_status() {

        return $this->hasOne(MaritalStatus::class, 'marital_status_id', 'marital_status_id');

    }

    public function address_details() {

//        return $this->hasMany(AddressDetail::class, '')

    }
}
