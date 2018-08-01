<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $primaryKey = 'payment_details_id';

    protected $fillable = [
        'payment_method_id', 'payment_method_id', 'business_id',
        'bank_name', 'bank_account_number', 'card_number',
        'provider', 'phone_number', 'member_id'
    ];

    public function payment_method () {

        return $this->hasOne (
            PaymentMethod::class,
            'payment_method_id',
            'payment_method_id'
        );

    }

}
