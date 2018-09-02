<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class MemberContribution extends Model
  {
    protected $primaryKey = 'member_contribution_id';
    
    protected $fillable = [
      'member_id', 'contribution_amount', 'payment_method_id'
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
