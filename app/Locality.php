<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class Locality extends Model
  {
    protected $primaryKey = 'locality_id';

    protected $fillable = ['constituency_id', 'locality_name'];
    
    public function constituency () {
      
      return $this->belongsTo (
        Constituency::class,
        'constituency_id'
      );
      
    }
    
  }
