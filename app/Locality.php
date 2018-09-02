<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class Locality extends Model
  {
    protected $primaryKey = 'locality_id';
    
    public function constituency () {
      
      return $this->belongsTo (
        Constituency::class,
        'constituency_id'
      );
      
    }
    
  }
