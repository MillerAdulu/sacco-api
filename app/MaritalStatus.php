<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class MaritalStatus extends Model
  {
    protected $primaryKey = 'marital_status_id';

    protected $fillable = ['marital_status'];
    
    public function member() {
      
      return $this->belongsToMany (
        Member::class,
        'marital_status_id',
        'marital_status_id'
      );
      
    }
  }
