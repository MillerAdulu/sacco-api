<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    protected $primaryKey = 'address_detail_id';

    public function member () {

        return $this->belongsTo (
            Member::class,
            'member_id',
            'member_id'
        );

    }

    public function employer () {

        return $this->belongsTo (
            Employer::class,
            'employer_id',
            'employer_id'
        );

    }

    public function business () {

        return $this->belongsTo (
            Business::class,
            'business_id',
            'business_id'
        );

    }
}
