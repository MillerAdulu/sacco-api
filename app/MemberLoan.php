<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class MemberLoan extends Model
  {
    protected $primaryKey = 'member_loan_id';
    
    public function member() {
      return $this->belongsTo(
        Member::class,
        'member_id'
      );
    }
    
    public function repaymentStatus() {
      return $this->belongsTo(
        LoanRepaymentStatus::class,
        'loan_repayment_status_id'
      );
    }
    
    public function issuingStatus() {
      return $this->belongsTo(
        LoanIssuingStatus::class,
        'loan_issuing_status_id'
      );
    }
    
    public function loanType() {
      return $this->belongsTo(
        LoanType::class,
        'loan_type_id'
      );
    }
    
    public function guarantors() {
      return $this->hasMany(
        LoanGuarantor::class,
        'loan_guarantor_id'
      );
    }
  }
