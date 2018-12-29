<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberShare extends Model
{
    protected $primaryKey = 'member_share_deposit_id';

    protected $fillable = ['member_id', 'payment_method_id', 'deposit_amount', 'comment'];
}
