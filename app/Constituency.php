<?php
  
  namespace App;
  
  use Illuminate\Database\Eloquent\Model;
  
  class Constituency extends Model
  {
    protected $primaryKey = 'constituency_id';

    protected $fillable = ['county_id', 'constituency_name'];
    
    public function county () {
      
      return $this->belongsTo (
        County::class,
        'county_id',
        'county_id'
      );
      
    }
    
    public function localities () {
      
      return $this->hasMany (
        Locality::class,
        'constituency_id',
        'constituency_id'
      );
      
    }
  }
