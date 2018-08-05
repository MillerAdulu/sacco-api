<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanGuarantor extends Model
{
    protected $primaryKey = 'loan_guarantor_id';

    public function memberLoan() {
        return $this->belongsTo(
            MemberLoan::class,
            'member_loan_id'
        );
    }
}
