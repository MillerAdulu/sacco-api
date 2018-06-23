<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $primaryKey = 'employer_id';

    public function address_details () {

        return $this->hasMany (
            AddressDetail::class,
            'employer_id',
            'employer_id'
        );

    }

    public function employment_details () {

        return $this->hasMany (
            EmploymentDetail::class,
            'employer_id',
            'employer_id'
        );

    }

}
