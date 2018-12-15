<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class LoanGuarantor extends Model
  {
    protected $primaryKey = 'loan_guarantor_id';

    protected $fillable = ['member_loan_id', 'identification_number', 'first_name', 'last_name', 'other_name', 'phone_number', 'email'];
    
    public function memberLoan() {
      return $this->belongsTo(
        MemberLoan::class,
        'member_loan_id'
      );
    }
  }
