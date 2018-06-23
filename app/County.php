<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $primaryKey = 'county_id';

    public function constituencies () {

        return $this->hasMany (
            Constituency::class,
            'county_id',
            'county_id'
        );

    }
}
