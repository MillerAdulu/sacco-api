<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class MemberDeposit extends Model
  {
    protected $primaryKey = 'member_deposit_id';
    
    protected $fillable = [
      'member_id', 'deposit_amount', 'payment_method_id'
    ];
    
    public function member() {
      return $this->belongsTo(
        Member::class,
        'member_id'
      );
    }
    
    public function paymentMethod() {
      return $this->belongsTo(
        PaymentMethod::class,
        'payment_method_id'
      );
    }
  }
