<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $primaryKey = 'payment_method_id';

    public function payment_detail () {

        return $this->belongsTo (
            PaymentDetail::class,
            'payment_method_id',
            'payment_method_id'
        );

    }

}
