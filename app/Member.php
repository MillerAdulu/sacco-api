<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';

    public function marital_status () {

        return $this->hasOne (
            MaritalStatus::class,
            'marital_status_id',
            'marital_status_id'
        );

    }

    public function address_details () {

        return $this->hasMany (
            AddressDetail::class,
            'member_id',
            'member_id'
        );

    }

    public function businesses () {

        return $this->belongsToMany (
            Business::class,
            'business_member',
            'member_id',
            'business_id'
        );

    }

    public function employment_detail () {

        return $this->hasMany (
            EmploymentDetail::class,
            'member_id',
            'member_id'
        );

    }

}
