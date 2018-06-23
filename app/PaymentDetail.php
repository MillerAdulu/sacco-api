<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $primaryKey = 'payment_details_id';

    public function payment_method () {

        return $this->hasOne (
            PaymentMethod::class,
            'payment_method_id',
            'payment_method_id'
        );

    }

}
