<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class Business extends Model
  {
    protected $primaryKey = 'business_id';

    protected $fillable = ['member_id', 'business_name', 'business_nature_id', 'approximate_monthly_income'];
    
    public function members () {
      
      return $this->belongsToMany (
        Member::class,
        'member_business',
        'business_id',
        'member_id'
      );
      
    }
    
    public function address () {
      
      return $this->hasOne (
        AddressDetail::class,
        'business_id',
        'business_id'
      );
      
    }
    
    
  }
