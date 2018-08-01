<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    protected $primaryKey = 'address_detail_id';
    
    protected $fillable = [
      
        'member_id',
        'business_id',
        'employer_id',
        'county_id',
        'constituency_id',
        'locality_id',
        'postal_address',
        'post_office_id',
        'street',
        'building_name',
        'floor',
        'house_number'
    ];

    public function member () {

        return $this->belongsTo (
            Member::class,
            'member_id'
        );

    }

    public function employer () {

        return $this->belongsTo (
            Employer::class,
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

    public function county() {
        return $this->belongsTo(
            County::class,
            'county_id'
        );
    }

    public function constituency() {
        return $this->belongsTo(
            Constituency::class,
            'constituency_id'
        );
    }

    public function locality() {
        return $this->belongsTo(
            Locality::class,
            'locality_id'
        );
    }

    public function postOffice() {
        return $this->belongsTo(
            PostOffice::class,
            'post_office_id'
        );
    }
}
