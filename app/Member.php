<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';

    protected $fillable = [
        'identification_number',
        'first_name',
        'last_name',
        'other_name',
        'date_of_birth',
        'phone_number',
        'email',
        'password',
        'kra_pin',
        'kra_certificate',
        'gender',
        'passport_photo',
        'marital_status_id',
        'proposed_monthly_contribution'
    ];

    public function marital_status () {

        return $this->hasOne (
            MaritalStatus::class,
            'marital_status_id'
        );

    }

    public function address_details () {

        return $this->hasMany (
            AddressDetail::class,
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
            'member_id'
        );

    }

    public function member_contributions() {

        return $this->hasMany(
            MemberContribution::class,
            'member_id'
        );
    }

    public function loans() {
        return $this->hasMany(
            MemberLoan::class,
            'member_id'
        );
    }

}
